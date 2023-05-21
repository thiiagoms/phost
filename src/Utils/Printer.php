<?php

declare(strict_types=1);

namespace PHost\Utils;

use PHost\Enums\Color;

/**
 * PHost Printer
 *
 * @package PHost\Utils
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.0
 */
abstract class Printer
{
    /**
     * Outputs a message without any formatting.
     *
     * @param string $message The message to be outputted.
     */
    private static function out(string $message): void
    {
        echo $message;
    }

    /**
     * Outputs a new line.
     */
    private static function newLine(): void
    {
        self::out(PHP_EOL);
    }

    /**
     * Displays a message with a new line before and after it.
     *
     * @param string $message The message to be displayed.
     */
    private static function display(string $message): void
    {
        self::newLine();
        self::out($message);
        self::newLine();
    }

    /**
     * Displays an information message.
     *
     * @param string $message The information message to be displayed.
     */
    public static function info(string $message): void
    {
        self::display($message);
    }

    /**
     * Displays a success message.
     *
     * @param string $message The success message to be displayed.
     */
    public static function success(string $message): void
    {
        self::display(Color::GREEN->get() . $message . "\e[0m");
    }

    /**
     * Displays a warning message.
     *
     * @param string $message The warning message to be displayed.
     */
    public static function warning(string $message): void
    {
        self::display(Color::YELLOW->get() . $message . "\e[0m");
    }

    /**
     * Displays an error message.
     *
     * @param string $message The error message to be displayed.
     */
    public static function error(string $message): void
    {
        self::display(Color::RED->get() . $message . "\e[0m");
    }
}
