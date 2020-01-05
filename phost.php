<?php

  print("[*] PHost Tool\n");
  $webpath = "/var/www/html";
  $vhost = "testng";
  $extension = "tk";

  try {  
    $user = get_current_user();
    $complete_path = "{$webpath}/{$vhost}";
    $mkdir = "mkdir -p {$complete_path}";
    $brackets = array("{", "}");
    print("[*] Creating dir...\n");
    shell_exec($mkdir);
    print("[*] Change group...\n");
    $group = "chown -R {$user}:{$user} $complete_path";
    shell_exec($group);
    print("[*] Right permissions...\n");
    $permissions = "chmod -R 755 {$webpath}";
    shell_exec($permissions);
    print("[*] Creating apache2 config file...\n");
    $apache2_config_file = <<<EOT
    "<VirtualHost *:80>
        ServerAdmin {$user}@admin.{$extension}
        ServerName $vhost.$extension
        ServerAlias www.$vhost.$extension
        DocumentRoot  $complete_path
    </VirtualHost>"
EOT;
    print("[*] Copy to default dir...\n");
    shell_exec("echo {$apache2_config_file} > {$vhost}.{$extension}.conf");
    $copy_file = "cp {$vhost}.{$extension}.conf /etc/apache2/sites-available/{$vhost}.{$extension}.conf";
    shell_exec($copy_file);
    print("[*] Restarting apache2...\n");
    shell_exec("systemctl restart apache2.service");
  } catch(Exception $e) {
    print("Error: {$e->getMessage()}");
  }

?>
