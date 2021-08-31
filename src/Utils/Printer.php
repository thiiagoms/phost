<?php

namespace Src\Utils;

/**
 * Printer functions
 * 
 * @package Src\Utils
 */
class Printer
{
    /**
     * Printer messsage on display
     * 
     * @param string $message
     * @return void
     */
    private static function output(string $message): void
    {
        echo $message;
    }

    /**
     * Add new line on display
     * 
     * @return void
     */
    private static function newLine(): void
    {
        self::output(PHP_EOL);
    }

    /**
     * Mount display
     * 
     * @param string $message
     * @return void
     */
    protected static function display(string $message): void
    {
        self::output($message);
        self::newLine();
    }
}
