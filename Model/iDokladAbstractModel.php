<?php

namespace Fousky\Component\iDoklad\Model;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Fousky\Component\iDoklad\Util\AnnotationLoader;
use Fousky\Component\iDoklad\Util\ResponseUtil;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
abstract class iDokladAbstractModel implements iDokladModelInterface
{
    /**
     * @param ResponseInterface $response
     *
     * @throws \RuntimeException
     *
     * @return iDokladModelInterface
     */
    public static function createFromResponse(ResponseInterface $response): iDokladModelInterface
    {
        return static::createFromStd(
            ResponseUtil::handle($response)
        );
    }

    /**
     * Need convert some DateTime public properties of this model?
     *
     * @return array
     */
    public static function getDateTimeProperties(): array
    {
        return [];
    }

    /**
     * @param \stdClass $data
     *
     * @return iDokladModelInterface
     */
    public static function createFromStd(\stdClass $data): iDokladModelInterface
    {
        $model = new static();

        foreach ((array) $data as $key => $value) {
            if (property_exists($model, $key)) {
                $model->{$key} = $value;
            }
        }

        // convert DateTime properties from string to \DateTime object.
        foreach (static::getDateTimeProperties() as $property) {
            if (false !== $value = new \DateTime($model->{$property}, new \DateTimeZone('UTC'))) {
                $model->{$property} = $value;
            }
        }

        return $model;
    }

    /**
     * @param array $options
     *
     * @throws \ReflectionException
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    public function toArray(array $options = []): array
    {
        $result = [];
        $reflection = new \ReflectionClass(new static());

        foreach ($reflection->getProperties() as $property) {
            $name = $property->getName();
            $getter = 'get'.ucfirst($property->getName());
            $value = $this->{$getter}();

            // convert \DateTime to string date representation.
            if ($value instanceof \DateTime) {
                $value = $value->format(\DateTime::ATOM);
            } elseif (is_object($value)) {
                if (method_exists($value, 'toArray')) {
                    $value = $value->toArray();
                } elseif (method_exists($value, 'createJson')) {
                    $value = $value->createJson();
                } elseif (method_exists($value, '__toString')) {
                    $value = (string) $value;
                }
            }

            $result[$name] = $value;
        }

        return $result;
    }

    /**
     * @return \Symfony\Component\Validator\ConstraintViolationInterface[]
     */
    public function getErrors()
    {
        AnnotationLoader::init();

        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator()
        ;

        /** @var ConstraintViolationList $list */
        $list = $validator->validate($this);

        return $list->getIterator();
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @throws \InvalidArgumentException
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            return call_user_func_array([$this, $name], $arguments);
        }

        if (stripos($name, 'get') === 0) {
            $property = ucfirst(substr($name, 3));

            if (property_exists($this, $property)) {
                return $this->{$property};
            }
        }

        throw new \InvalidArgumentException(sprintf(
            'Method %s of class %s does not exists.',
            $name,
            get_class($this)
        ));
    }
}
