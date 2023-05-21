<?php

declare(strict_types=1);

namespace Unit\Repositories;

use PHost\Repositories\PHostRepository;
use PHPUnit\Framework\TestCase;

class PHostRepositoryTest extends TestCase
{
    public function testCreateDir(): void
    {
        $pHostRepository = new PHostRepository();

        $directory = __DIR__ . '/test_dir';

        if (file_exists($directory)) {
            rmdir($directory);
        }

        $result = $pHostRepository->createDir($directory);
        $this->assertTrue($result);
        $this->assertDirectoryExists($directory);

        rmdir($directory);
    }

    public function testChangeDirPermissions(): void
    {
        $pHostRepository = new PHostRepository();

        $directory = __DIR__ . '/test_dir';

        mkdir($directory);

        $result = $pHostRepository->changeDirPermissions($directory, get_current_user());
        $this->assertTrue($result);

        rmdir($directory);
    }

    public function testWrite(): void
    {
        $pHostRepository = new PHostRepository();

        $file = __DIR__ . '/test_file.txt';

        if (file_exists($file)) {
            unlink($file);
        }

        $content = 'Test content';
        $result = $pHostRepository->write($file, $content);
        $this->assertNotFalse($result);
        $this->assertFileExists($file);

        unlink($file);
    }
}
