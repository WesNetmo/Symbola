<?php

use Netmosfera\Symbola\Symbola;

require(__DIR__ . '/src/__autoload.php');

var_dump(extension_loaded('uopz'));

/**
 * @method string foo()
 * @property string $bar
 */
class Something{
    use Symbola;
    function __construct(){
        $this->foo = function(){
            return "I'm foo!";
        };
    }
    function bar(){
        return "I'm bar!";
    }
}

$object = new Something;

echo $object->foo(); // Prints "I'm foo!"

$bar = $object->bar;
echo $bar(); // Prints "I'm bar!"
