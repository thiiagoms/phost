<?php

declare(strict_types=1);

namespace PHost\Enums;

/**
 * Colors package
 *
 * @package Src\Tools
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.1
 */
enum Color
{
    /**
     * RED color
     *
     * @var string
     */
    case RED;

    /**
     * GREEN color
     *
     * @var string
     */
    case GREEN;

    /**
     * YELLOW color
     *
     * @var string
     */
    case YELLOW;

    /**
     * Color package
     *
     * @return string
     */
    public function get(): string
    {
        return match ($this) {
            self::RED => "\e[31m",
            self::GREEN => "\e[32m",
            self::YELLOW => "\e[33m"
        };
    }
}
