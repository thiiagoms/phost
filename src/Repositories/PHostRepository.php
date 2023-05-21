<?php

declare(strict_types=1);

namespace PHost\Repositories;

/**
 * PHost Repository
 *
 * @package PHost\Repositories
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.0
 */
final class PHostRepository
{
    /**
     * Create a directory.
     *
     * @param string $name The name of the directory.
     * @param int $permissions The directory permissions (default: 755).
     * @param bool $recursive Whether to create directories recursively (default: true).
     * @return bool True if the directory was successfully created, false otherwise.
     */
    public function createDir(string $name, int $permissions = 755, bool $recursive = true): bool
    {
        return !file_exists($name) && mkdir($name, $permissions, $recursive);
    }

    /**
     * Change directory permissions.
     *
     * @param string $directory The directory path.
     * @param string $user The user to set as the owner of the directory.
     * @return bool True if the directory permissions were successfully changed, false otherwise.
     */
    public function changeDirPermissions(string $directory, string $user): bool
    {
        return chown($directory, $user);
    }

    /**
     * Write content to a file.
     *
     * @param string $destiny The path to the file.
     * @param string $content The content to write to the file.
     * @return false|int The number of bytes written to the file, or false on failure.
     */
    public function write(string $destiny, string $content): false|int
    {
        return file_put_contents($destiny, $content, FILE_APPEND);
    }

    /**
     * Execute a shell command.
     *
     * @param string $shell The shell command to execute.
     * @return void
     */
    public function exec(string $shell): void
    {
        shell_exec($shell);
    }
}
