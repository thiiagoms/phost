<?php

declare(strict_types=1);

if (php_sapi_name() != 'cli') {
    die("<h1>Only in CLI mode!</h1>");
}

require_once __DIR__ . '/vendor/autoload.php';

use PHost\Utils\ContainerDI;
use PHost\Repositories\PHostRepository;
use PHost\Services\PHostService;
use PHost\Commands\PHostCommand;

$container = new ContainerDI();

$container->add('PHostRepository', fn(): object => new PHostRepository());
$container->add('PHostService', fn(object $container): object => new PHostService(
    $container->get('PHostRepository')
));
$container->add('PHostCommand', fn(object $container): object => new PHostCommand(
    $container->get('PHostService')
));

$app = $container->get('PHostCommand');