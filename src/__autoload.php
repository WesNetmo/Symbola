<?php

namespace Netmosfera\FCM;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

spl_autoload_register(function($class){
    $baseNS = __NAMESPACE__ . '\\';
    if(substr($class, 0, strlen($baseNS)) !== $baseNS) return;
    $classRelative = substr($class, strlen($baseNS));
    $file = __DIR__ . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, explode('\\', $classRelative)) . '.php';
    require($file);
});
