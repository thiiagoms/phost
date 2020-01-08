<?php
 spl_autoload_register(function($className){
   $fileName = "settings".DIRECTORY_SEPARATOR.$className.".php";
   if(file_exists($fileName)){
    require_once($fileName);
   }
 });

?> 