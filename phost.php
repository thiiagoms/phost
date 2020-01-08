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
    endif;   
  } catch (Exception $e) 
  {
    print("Exception: {$e->getMessage()}");
  }
  
?>