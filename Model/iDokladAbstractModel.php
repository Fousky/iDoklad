<?php

namespace Fousky\Component\iDoklad\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Fousky\Component\iDoklad\LOV\iDokladAbstractEnum;
use Fousky\Component\iDoklad\Util\AnnotationLoader;
use Fousky\Component\iDoklad\Util\ResponseUtil;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Validator\Validation;

/**
 * @author Lukáš Brzák <brzak@fousky.cz>
 */
abstract class iDokladAbstractModel implements iDokladModelInterface
{
    // remove nulls in toArray() calling.
    const TOARRAY_REMOVE_NULLS = 'rnulls';

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
                } elseif (array_key_exists($key, $enumMap)) {
                    /** @var iDokladAbstractEnum $enumClass */
                    $enumClass = $enumMap[$key];
                    $model->{$key} = new $enumClass((int) $value);
                } elseif (in_array($key, $dateMap, true) && false !== $val = new \DateTime($model->{$key}, new \DateTimeZone('UTC'))) {
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
        $reflection = new \ReflectionClass(__CLASS__);

        foreach ($reflection->getProperties() as $property) {
            $name = $property->getName();
            $getter = 'get'.ucfirst($property->getName());
            $value = $this->{$getter}();

            // convert \DateTime to string date representation.
            if ($value instanceof \DateTime) {
                $value = $value->format(\DateTime::ATOM);
            } elseif (is_object($value)) {
                if (method_exists($value, 'toArray')) {
                    $value = $value->toArray($options);
                } elseif (method_exists($value, 'createJson')) {
                    $value = $value->createJson();
                } elseif (method_exists($value, '__toString')) {
                    $value = (string) $value;
                }
            }

            $result[$name] = $value;
        }

        return $this->toArrayProcessOptions($options, $result);
    }

    /**
     * @param array $options
     * @param array $data
     *
     * @return array
     */
    protected function toArrayProcessOptions(array $options, array $data): array
    {
        // remove null keys.
        if (array_key_exists(self::TOARRAY_REMOVE_NULLS, $options)) {
            foreach ($data as $key => $value) {
                if (null === $value) {
                    unset($data[$key]);
                }
            }
        }

        return $data;
    }

    /**
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     * @throws \ReflectionException
     *
     * @return \Symfony\Component\Validator\ConstraintViolationListInterface|\Symfony\Component\Validator\ConstraintViolationList
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

    /**
     * @param array $properties
     *
     * @throws \InvalidArgumentException
     */
    protected function processProperties(array $properties)
    {
        foreach ($properties as $property => $value) {
            if (!property_exists($this, $property)) {
                throw new \InvalidArgumentException(sprintf(
                    'Property %s of class %s does not exists.',
                    $property,
                    get_class($this)
                ));
            }

            $this->{$property} = $value;
        }
    }
}
