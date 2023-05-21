<?php

declare(strict_types=1);

namespace PHost\Services;

use PHost\Repositories\PHostRepository;
use PHost\Utils\Printer;
use PHost\Utils\Template;

/**
 * PHost Service
 *
 * @package PHost\Commands
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.0
 */
final class PHostService
{
    /**
     * Init service with repository
     *
     * @param PHostRepository $pHostRepository The PHostRepository instance.
     */
    public function __construct(private readonly PHostRepository $pHostRepository)
    {
    }

    /**
     * Creates a directory for the given domain and extension.
     *
     * @param string $domain The domain name.
     * @param string $extension The domain extension.
     */
    private function createDirectory(string $domain, string $extension): void
    {
        $webPath = "/var/www/html/{$domain}.{$extension}/public_html";
        $directory = $this->pHostRepository->createDir($webPath, 0700, true);

        if ($directory === false) {
            Printer::warning("Folder {$domain} already exists in web path => {$webPath}");
        }

        $this->pHostRepository->changeDirPermissions($webPath, get_current_user());
    }

    /**
     * Creates a new domain configuration and updates the hosts file.
     *
     * @param string $domain The domain name.
     * @param string $extension The domain extension.
     * @return void
     */
    public function create(string $domain, string $extension): void
    {
        $this->createDirectory($domain, $extension);

        $data = [
            'user'   => get_current_user(),
            'domain' => $domain,
            'extension' => $extension,
            'webpath'   => 'var/www/html/'
        ];

        $template = Template::render('apache', $data);

        $result = $this->pHostRepository->write(
            "/etc/apache2/sites-available/{$domain}.{$extension}.conf",
            $template
        );

        if (!is_int($result)) {
            Printer::error("Failed to create {$domain}.{$extension} in /etc/apache2/sites-available/");
            exit;
        }

        $result = $this->pHostRepository->write('/etc/hosts', "127.0.1.1 {$domain}.{$extension}");

        if (!is_int($result)) {
            Printer::error("Failed to create {$domain}.{$extension} entry in /etc/hosts");
            exit;
        }

        $this->pHostRepository->exec('systemctl restart apache2.service');
        $this->pHostRepository->exec("a2ensite {$domain}.{$extension}.conf");
        $this->pHostRepository->exec('systemctl restart apache2.service');
    }
}
