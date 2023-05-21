<?php

namespace Src\Utils;

/**
 * Render config templates
 * 
 * @package Src\Utils
 */
class Views
{

    /** @var const $templates default location */
    private const TEMPLATES = __DIR__ . '/../../resources/';

    /**
     * Check if template config file exists on default directory
     * 
     * @param string $template
     * @return string
     */
    public function getTemplate(string $template): string
    {
        $file = self::TEMPLATES . $template . '.conf';
        // return file_exists($file) ? file_get_contents($file) : "Template {$template}.{$extension} not found";
        return file_get_contents($file) ?? '';
    }

    /**
     * Render template with values
     * 
     * @param string $template
     * @param array $data 
     * @return string
     */
    public function render(string $template, array $data = []): string
    {
        $file = $this->getTemplate($template);

        if (isset($file)) {
            
            $keys = array_keys($data);

            $keys = array_map(function (string $item) {
                return '{{ ' . $item . ' }}';
            }, $keys);

            return str_replace($keys, array_values($data), $file);
        }

        return "Template: $file not found";
        
    }
}
