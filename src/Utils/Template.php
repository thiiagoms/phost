<?php

declare(strict_types=1);

namespace PHost\Utils;

/**
 * Template render
 *
 * @package PHost\Utils
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.0
 */
final class Template
{
    /**
     * Directory path for templates.
     */
    private const TEMPLATE_DIR = __DIR__ . '/../../resources/';

    /**
     * Retrieves the contents of a template file.
     *
     * @param string $template The name of the template file.
     * @return string The contents of the template file.
     */
    private static function get(string $template): string
    {
        $file = sprintf("%s%s.conf", self::TEMPLATE_DIR, $template);
        return file_get_contents($file) ?? '';
    }

    /**
     * Renders a template with the provided data.
     *
     * @param string $template The name of the template file.
     * @param array $data The data to be replaced in the template.
     * @return string The rendered template.
     */
    public static function render(string $template, array $data): string
    {
        $file = self::get($template);

        if (!empty($file)) {
            $keys = array_keys($data);

            $keys = array_map(function (string $item) {
                return '{{ ' . $item . ' }}';
            }, $keys);

            return str_replace($keys, array_values($data), $file);
        }

        Printer::error("Template conf not found");
        die();
    }
}
