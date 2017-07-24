<?php

namespace Fousky\Component\iDoklad\Model;

use Fousky\Component\iDoklad\Util\ResponseUtil;
use Psr\Http\Message\ResponseInterface;

/**
 * @author Lukáš Brzák <lukas.brzak@aquadigital.cz>
 */
abstract class iDokladAbstractModel implements iDokladModelInterface
{
    /**
     * @param ResponseInterface $response
     *
     * @return iDokladModelInterface
     * @throws \RuntimeException
     */
    public static function createFromResponse(ResponseInterface $response): iDokladModelInterface
    {
        return static::createFromStd(
            ResponseUtil::handle($response)
        );
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

        return $model;
    }

    /**
     * @param array $options
     *
     * @return array
     *
     * @throws \ReflectionException
     * @throws \InvalidArgumentException
     */
    public function toArray(array $options = []): array
    {
        $result = [];
        $reflection = new \ReflectionClass(new static());

        foreach ($reflection->getProperties() as $property) {
            $name = $property->getName();
            $getter = 'get' . ucfirst($property->getName());
            $value = $this->{$getter}();

            if (is_object($value) && method_exists($value, 'toArray')) {
                $value = $value->toArray();
            } else if (is_object($value) && method_exists($value, 'createJson')) {
                $value = $value->createJson();
            }

            $result[$name] = $value;
        }

        return $result;
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     * @throws \InvalidArgumentException
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
