<?php

  class VHost {

    public function bannerPHost()
    {
      VHost::execCMD("clear");
     
      print("
      ######  #     #                     
      #     # #     #  ####   ####  ##### 
      #     # #     # #    # #        #   
      ######  ####### #    #  ####    #   
      #       #     # #    #      #   #   
      #       #     # #    # #    #   #   
      #       #     #  ####   ####    #   
      
      [*] Author: ekkopy
      [*] Version: 1.0
      [*] Thanks so much for using PHost!
      ");
      VHost::instructionsPHost();
    }

    // Just display Instructions on how to use phost
    public function instructionsPHost()
    {
      print("\n
      It's very simple to use PHost, just execute it on your shell like:
      $~: php phost.php
      Answer the questions and let phost works :D!
      To see instructions again, just run: php phost.php -h or php.phost --help
      \n");
    }

    public function execCMD($cmd)
    {
      return shell_exec($cmd);
    }

    public function changePermissions($directory = NULL, $permissions = NULL, $option = NULL, $user = NULL)
    {
      if($option == 'dir')
      {
        return VHost::execCMD("chmod {$permissions} -R {$directory}");
      } if ($option == 'group')
      {
        return VHost::execCMD("chown -R {$user}:{$user} $directory");
      }
    }

    public function createDirectory($path)
    {
      return mkdir($path, 0700, true);
    }

    public function createTMPFile($file = NULL, $path = NULL, $domain = NULL, $extension)
    {
      $cmd = "echo {$file} >> {$path}".DIRECTORY_SEPARATOR."{$domain}.{$extension}.conf";
      return vHost::execCMD($cmd);
    }

    public function createSingleFile($file, $path)
    {
      return VHost::execCMD("echo {$file} >> {$path}");
    }
  }
?> 