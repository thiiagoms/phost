<?php
   
  $webpath = readline("Please, what's your web path server ? ");
  $vhost = readline("Name of your vhost: ");
  $extension = readline("Extension website name ? E.X: .tk, .study, etc..");
  
  try {
    $user = get_current_user();
    //shell_exec("mkdir -p {$webpath}".DIRECTORY_SEPARATOR."$vhost");
    $user = get_current_user();
    $complete_path = "{$webpath}".DIRECTORY_SEPARATOR."$vhost";
    shell_exec("mkdir -p {$complete_path}");
    shell_exec("chown -R {$user}:{$user} {$complete_path}");
    shell_exec("chmod 777 -R {$complete_path}");
    // Write apache2 vhost conf
    $apache2_config = <<<EOT
    <VirtualHost *:80>
      ServerAdmin webmaster@ostechnix1.lan
      ServerName $vhost.$extension
      ServerAlias www.$vhost.$extension
      DocumentRoot  $complete_path

      ErrorLog  \$${APACHE_LOG_DIR}/error.log
      CustomLog \$${APACHE_LOG_DIR}/access.log combined

      </VirtualHost>
EOT;
    echo $apache2_config;
  } catch (Exception $exception){
    print("{$exception}");
  }
  echo "Your webpath: {$webpath}\n";
?>