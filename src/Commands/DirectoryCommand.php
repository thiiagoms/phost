<?php

namespace Src\Commands;

use Src\Utils\Views;

/**
 * Create directories
 * 
 * @package Src\Lib
 */
class DirectoryCommand
{

    /** @var Views $views object  **/
    private Views $views;

    public function __construct()
    {
        $this->views = new Views();
    }
    /**
     * Create directory 
     * 
     * @param string $name
     * @param int $permissions on directory
     * @param bool $recursive
     * @return bool
     */
    public function createDirectory(string $name, int $permissions, bool $recursive): bool
    {
        if (!file_exists($name)) {
            return mkdir($name, $permissions, $recursive);
        }

        return false;
    }

    /**
     * Change group permissions
     * 
     * @param string $directory
     * @param string $user
     * @return bool
     */
    public function chownPermissions(string $directory, string $user): bool
    {
        return chown($directory, $user);
    }

    /**
     * Create or write file into another directory
     * 
     * @param string $destiny
     * @param string $domain
     * @param string $content
     * @return void
     */
    public function write(string $destiny, string $file, string $content = ''): void
    {
        if (is_dir($destiny)) {
            $directory = fopen($file, 'a+');
            fwrite($directory, $content);
            fclose($directory);
            return;
        } 
        
        $directory = fopen($file, 'a+');
        fwrite($directory, $content);
        fclose($directory);
    }
    
    /**
     * Return render object
     * 
     * @return Views
     */
    public function getViews(): Views
    {
        return $this->views;
    }

    

}
