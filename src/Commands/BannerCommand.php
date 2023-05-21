<?php

declare(strict_types=1);

namespace PHost\Commands;

use PHost\Utils\Printer;

/**
 * Banner Command
 *
 * @package PHost\Commands
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.0
 */
final class BannerCommand
{
    /**
     * Initial banner
     *
     * @return void
     */
    public static function init(): void
    {
        Printer::info('
            ██████╗ ██╗  ██╗ ██████╗ ███████╗████████╗
            ██╔══██╗██║  ██║██╔═══██╗██╔════╝╚══██╔══╝
            ██████╔╝███████║██║   ██║███████╗   ██║ 
            ██╔═══╝ ██╔══██║██║   ██║╚════██║   ██║ 
            ██║     ██║  ██║╚██████╔╝███████║   ██║
            ╚═╝     ╚═╝  ╚═╝ ╚═════╝ ╚══════╝   ╚═╝
            
            [*] Author: Thiago AKA thiiagoms
            [*] Version: 1.1
        ');
    }
}
