<?php

declare(strict_types=1);

namespace PHost\Utils;

use Exception;

/**
 * Container for dependency injection
 *
 * @package PHost\Utils
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.1
 */
final class ContainerDI
{
    /**
     * Class dependencies
     *
     * @var array
     */
    private array $dependencies = [];

    /**
     * Push class into the container
     *
     * @param string $class
     * @param callable $resolver
     * @return void
     */
    public function add(string $class, callable $resolver): void
    {
        $this->dependencies[$class] = $resolver;
    }

    /**
     * Retrieve a dependency from the container.
     *
     * @param string $class
     * @return mixed
     * @throws Exception
     */
    public function get(string $class): mixed
    {
        if (!array_key_exists($class, $this->dependencies)) {
            throw new Exception("Dependency {$class} not found.");
        }

        $handler = $this->dependencies[$class];

        return $handler($this);
    }
}
