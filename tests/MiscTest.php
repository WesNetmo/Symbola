<?php

namespace Netmosfera\SymbolaTests\MiscTest;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

use Netmosfera\Symbola\Symbola;
use Netmosfera\SymbolaTests\PHPUnit;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

class GetTest extends PHPUnit
{
    function testAlwaysReturnsTheSameClosure(){
        $a = new class{
            use Symbola;
            public function bar(){}
        };

        $bar1 = $a->bar;
        $bar2 = $a->bar;

        $this->assertSame($bar1, $bar2);
    }
}
