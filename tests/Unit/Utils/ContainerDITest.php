<?php

declare(strict_types=1);

namespace Unit\Utils;

use Exception;
use PHost\Utils\ContainerDI;
use PHPUnit\Framework\TestCase;

class MockDependency
{
}

class ContainerDITest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAddAndGetDependency(): void
    {
        $container = new ContainerDI();

        $container->add('MockDependency', fn (ContainerDI $mock) => new MockDependency());

        $dependency = $container->get('MockDependency');

        $this->assertInstanceOf(MockDependency::class, $dependency);
    }

    public function testGetDependencyNotFound(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Dependency NotFoundDependency not found.");

        $container = new ContainerDI();
        $container->get('NotFoundDependency');
    }
}