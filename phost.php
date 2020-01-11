<?php
  require_once("settings".DIRECTORY_SEPARATOR."settings.php");

  $phost = new VHost();
  $phost->bannerPHost();
  try {
    if(isset($argv[1]) == '-h' or isset($argv[1]) == '--help'):
      $phost->instructionsPHost();
    else:
      $webpath = readline("[*] Please, what's your webpath? ");
      $domain = readline("[*] Please, what's your domain name? ");
      $extension = readline("[*] Please, what's your extension? Like: .com, .tk, etc: ");
      $user = get_current_user();
      print("[*] Creating directory!\n");
      $phost->createDirectory($webpath, $domain);
      print("[*] Change directory group permissions..\n");
      $cmpPath = "{$webpath}".DIRECTORY_SEPARATOR."{$domain}";
      $phost->changePermissions($cmpPath, NULL, 'group', $user);
      print("[*] Grant all permissions...\n");
      $phost->changePermissions($cmpPath, '777', 'dir', NULL);
      print("[*] Creating apache2 config file!");
      $apache2 = <<<EOT
      "<VirtualHost *:80>
        ServerAdmin {$user}@admin.{$extension}
        ServerName $domain.$extension
        ServerAlias www.$domain.$extension
        DocumentRoot  $webpath/$domain
      </VirtualHost>"
EOT;
      $phost->createTMPFile($apache2, '/etc/apache2/sites-available', $domain, $extension);
      print("[*] Restarting apache2 service!\n");
      $phost->execCMD("systemctl restart apache2.service");
      print("[*] Writing on hosts file!\n");
      $hosts = "127.0.0.1 {$domain}.{$extension}";
      $phost->createSingleFile($hosts, '/etc/hosts');
      print("[*] Activate vhost config!\n");
      $phost->execCMD("a2ensite {$domain}.{$extension}.conf");
      print("[*] Restarting apache2.service!\n");
      $phost->execCMD("systemctl restart apache2.service");
    endif;   
  } catch (Exception $e) 
  {
    print("Exception: {$e->getMessage()}");
  }
  
?>