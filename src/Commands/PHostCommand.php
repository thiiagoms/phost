<?php

declare(strict_types=1);

namespace PHost\Commands;

use PHost\Services\PHostService;

/**
 * PHost Command
 *
 * @package PHost\Commands
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.0
 */
final class PHostCommand
{
    /**
     * Init command with service
     *
     * @param PHostService $pHostService
     */
    public function __construct(private readonly PHostService $pHostService)
    {
    }

    /**
     * Create new host config
     *
     * @param string $domain
     * @param string $extension
     * @return void
     */
    public function create(string $domain, string $extension): void
    {
        $this->pHostService->create($domain, $extension);
    }
}
