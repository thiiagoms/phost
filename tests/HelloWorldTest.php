<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Test example
 *
 * @package Tests\Unit
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
class HelloWorldTest extends TestCase
{

    /**
     * Test example to return true
     *
     * @return void
     */
    public function test_example_to_tests_test(): void
    {
        $this->assertTrue(true, 'Hello World Test');
    }
}