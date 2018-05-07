<?php

namespace Fousky\Component\iDoklad\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Fousky\Component\iDoklad\LOV\iDokladAbstractEnum;
use Fousky\Component\iDoklad\LOV\iDokladEnumInterface;
use Fousky\Component\iDoklad\Util\AnnotationLoader;
use Fousky\Component\iDoklad\Util\ResponseUtil;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
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

                    if (\is_array($value)) {
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
                } elseif (\in_array($key, $dateMap, true) &&
                          $val = new \DateTime($model->{$key}, new \DateTimeZone('UTC'))
                ) {
                    $model->{$key} = $val;
                }
            }
        }

        return $model;
    }

    /**
     * @param array $options
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    public function toArray(array $options = []): array
    {
        $result = [];
        $reflection = new \ReflectionClass($this);

        foreach ($reflection->getProperties() as $property) {
            $name = $property->getName();
            $getter = 'get'.ucfirst($property->getName());
            $value = $this->{$getter}();

            $result[$name] = $this->recursiveToArray($value, $options);
        }

        return $this->toArrayProcessOptions($options, $result);
    }

    /**
     * @param mixed $value
     * @param array $options
     *
     * @return array|string
     */
    public function recursiveToArray($value, array $options)
    {
        // convert \DateTime to string date representation.
        if ($value instanceof \DateTime) {
            // DateTime string without TimeZone definition - time zone recalculation causes unexpected problems.
            return $value->format('Y-m-d\TH:i:s');
        }

        if (\is_array($value) || $value instanceof Collection) {
            $subArray = [];

            foreach ($value as $k => $v) {
                $subArray[$k] = $this->recursiveToArray($v, $options);
            }

            return $subArray;
        }

        if ($value instanceof iDokladModelInterface || method_exists($value, 'toArray')) {
            return $value->toArray($options);
        }

        if ($value instanceof iDokladEnumInterface || method_exists($value, 'createJson')) {
            return $value->createJson();
        }

        if (\is_object($value) && method_exists($value, '__toString')) {
            return (string) $value;
        }

        return $value;
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
                if (is_array($value)) {
                    $data[$key] = $this->toArrayProcessOptions($options, $value);
                }
            }
        }

        return $data;
    }

    /**
     * @return ConstraintViolationListInterface
     *
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     * @throws \ReflectionException
     */
    public function validate(): ConstraintViolationListInterface
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

        if (0 === stripos($name, 'get')) {
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
