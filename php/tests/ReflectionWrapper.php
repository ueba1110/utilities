<?php

declare(strict_types=1);

namespace Tests;

use ReflectionClass;

final class ReflectionWrapper
{
    /**
     * test対象クラスのインスタンス.
     *
     * @var mixed
     */
    private $instance;

    /**
     * test対象クラスのリフレクション.
     *
     * @var ReflectionClass
     */
    private ReflectionClass $reflection;

    /**
     * __construct.
     *
     * @param mixed $instance
     */
    public function __construct($instance)
    {
        $this->instance   = $instance;
        $this->reflection = new ReflectionClass($instance);
    }

    /**
     * __set.
     *
     * @param string $name
     * @param mixed  $value
     */
    public function __set(string $name, $value): void
    {
        $property = $this->reflection->getProperty($name);
        $property->setAccessible(true);
        $property->setValue($this->instance, $value);
    }

    /**
     * __get.
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        $property = $this->reflection->getProperty($name);
        $property->setAccessible(true);

        return $property->getValue($this->instance);
    }

    /**
     * __call.
     *
     * @param string $name
     * @param array  $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        $method = $this->reflection->getMethod($name);
        $method->setAccessible(true);

        return $method->invokeArgs($this->instance, $arguments);
    }
}
