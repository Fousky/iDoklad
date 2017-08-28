<?php

namespace Fousky\Component\iDoklad\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\LOV\iDokladAbstractEnum;
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
     * Need convert some property to iDokladAbstractModel instance?
     *
     * @return array
     */
    public static function getModelMap(): array
    {
        return [];
    }

    /**
     * Need convert some property to Enum object?
     *
     * @return array
     */
    public static function getEnumMap(): array
    {
        return [];
    }

    /**
     * Need convert some DateTime public properties of this model?
     *
     * @return array
     */
    public static function getDateMap(): array
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

        $modelMap = static::getModelMap();
        $enumMap = static::getEnumMap();
        $dateMap = static::getDateMap();

        foreach ((array) $data as $key => $value) {
            if (property_exists($model, $key)) {
                $model->{$key} = $value;

                if (array_key_exists($key, $modelMap)) {
                    /** @var iDokladAbstractModel $modelClass */
                    $modelClass = $modelMap[$key];

                    if ($value instanceof \stdClass) {
                        $model->{$key} = $modelClass::createFromStd($value);
                    }

                    if (is_array($value)) {
                        $collection = new ArrayCollection();
                        foreach ($value as $valueItem) {
                            $collection->add($modelClass::createFromStd($valueItem));
                        }
                        $model->{$key} = $collection;
                    }

                } else if (array_key_exists($key, $enumMap)) {
                    /** @var iDokladAbstractEnum $enumClass */
                    $enumClass = $enumMap[$key];
                    $model->{$key} = new $enumClass((int) $value);
                } else if (in_array($key, $dateMap, true) && false !== $val = new \DateTime($model->{$key}, new \DateTimeZone('UTC'))) {
                    $model->{$key} = $val;
                }
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
     * @return \Symfony\Component\Validator\ConstraintViolationListInterface|\Symfony\Component\Validator\ConstraintViolationList
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     * @throws \ReflectionException
     */
    public function validate()
    {
        AnnotationLoader::init();

        return Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator()
            ->validate($this);
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
