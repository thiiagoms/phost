<?php

namespace Src\Commands;

use Src\Utils\Printer;

/**
 * Messages helpers of phost
 * 
 * @package Src\Commands
 */
class BannerCommand extends Printer
{

    /**
     *  Main command about PHost
     * 
     * @return void
     */
    public static function banner(): void
    {
        Printer::display("
        \e[31m
        ██████╗ ██╗  ██╗ ██████╗ ███████╗████████╗
        ██╔══██╗██║  ██║██╔═══██╗██╔════╝╚══██╔══╝
        ██████╔╝███████║██║   ██║███████╗   ██║   
        ██╔═══╝ ██╔══██║██║   ██║╚════██║   ██║   
        ██║     ██║  ██║╚██████╔╝███████║   ██║   
        ╚═╝     ╚═╝  ╚═╝ ╚═════╝ ╚══════╝   ╚═╝
        
        \e[93m
        [*] Author: Thiago AKA thiiagoms
        [*] Version: 1.1
        [*] Thanks so much for using phost!\e[0m
        ");
    }

    /**
     * How to use phost
     * 
     * @return void
     */
    public static function help(): void
    {
        Printer::display("\e[96musage: ./host [answer-the-questions]");
    }

    /**
     * Finish phost use=
     * 
     * @param string $domain
     * @return void
     */
    public static function finish(string $domain): void
    {
        Printer::display("\e[34m Finish to set host config: {$domain}");
    }

}
