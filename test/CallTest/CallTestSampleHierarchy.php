<?php

namespace Netmosfera\SymbolaTests\CallTest;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

use Closure;
use Netmosfera\Symbola\Symbola;
use Netmosfera\Symbola\SymbolaInternals;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

/** @return Closure */
function makeTestClosure($className, $name){
    return function() use($className, $name){
        return $className . '::' . $name;
    };
}

function PRI($className){ return makeTestClosure($className, 'PRI'); }
function PRO($className){ return makeTestClosure($className, 'PRO'); }
function PUB($className){ return makeTestClosure($className, 'PUB'); }

/**
 * @method string PRI()
 * @method string PRO()
 * @method string PUB()
 */
class SuperSuperSuperKlass{
    use Symbola;
    private   $PRI;
    protected $PRO;
    public    $PUB;
    function __construct(){
        $this->PRI = PRI(SuperSuperSuperKlass);
        $this->PRO = PRO(SuperSuperSuperKlass);
        $this->PUB = PUB(SuperSuperSuperKlass);
    }
}

class SuperSuperKlass extends SuperSuperSuperKlass{
    private   $PRI;
    protected $PRO;
    public    $PUB;
    function __construct(){
        parent::__construct();
        $this->PRI = PRI(SuperSuperKlass);
        $this->PRO = PRO(SuperSuperKlass);
        $this->PUB = PUB(SuperSuperKlass);
    }
}

class SuperKlass extends SuperSuperKlass{}

class Klass extends SuperKlass{
    private   $PRI;
    protected $PRO;
    public    $PUB;
    function __construct(){
        parent::__construct();
        $this->PRI = PRI(Klass);
        $this->PRO = PRO(Klass);
        $this->PUB = PUB(Klass);
    }
}

class ChildKlass extends Klass{}

class ChildChildKlass extends ChildKlass{
    private   $PRI;
    protected $PRO;
    public    $PUB;
    function __construct(){
        parent::__construct();
        $this->PRI = PRI(ChildChildKlass);
        $this->PRO = PRO(ChildChildKlass);
        $this->PUB = PUB(ChildChildKlass);
    }
}

class ChildChildChildKlass extends ChildChildKlass{
    private   $PRI;
    protected $PRO;
    public    $PUB;
    function __construct(){
        parent::__construct();
        $this->PRI = PRI(ChildChildChildKlass);
        $this->PRO = PRO(ChildChildChildKlass);
        $this->PUB = PUB(ChildChildChildKlass);
    }
}

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

const SuperSuperSuperKlass = SuperSuperSuperKlass::CLASS;
const SuperSuperKlass = SuperSuperKlass::CLASS;
const SuperKlass = SuperKlass::CLASS;
const Klass = Klass::CLASS;
const ChildKlass = ChildKlass::CLASS;
const ChildChildKlass = ChildChildKlass::CLASS;
const ChildChildChildKlass = ChildChildChildKlass::CLASS;

/**
 * Creates a test class object with an hardcoded custom caller class.
 *
 * @param           string                                                                  $className
 * @param           string|null                                                             $caller
 * @return          SuperSuperSuperKlass
 */
function makeObject(string $className, string $caller = null){
    $object = new $className();
    SymbolaInternals::$customReferencerScope = $caller;
    return $object;
}

function sssk(string $caller = null){ return makeObject(SuperSuperSuperKlass, $caller); }
function ssk (string $caller = null){ return makeObject(SuperSuperKlass, $caller); }
function sk  (string $caller = null){ return makeObject(SuperKlass, $caller); }
function k   (string $caller = null){ return makeObject(Klass, $caller); }
function ck  (string $caller = null){ return makeObject(ChildKlass, $caller); }
function cck (string $caller = null){ return makeObject(ChildChildKlass, $caller); }
function ccck(string $caller = null){ return makeObject(ChildChildChildKlass, $caller); }
