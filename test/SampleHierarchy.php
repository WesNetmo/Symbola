<?php

use Netmosfera\FCM\FirstClassMethods;
use Netmosfera\FCM\FirstClassMethodsInternals;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

const Error = Error::CLASS;
const Closure = Closure::CLASS;
const stdClass = stdClass::CLASS;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

/**
 * @property Closure $PRI
 * @property Closure $PRO
 * @property Closure $PUB
 */
class SuperSuperSuperKlass{
    use FirstClassMethods;
    private   function PRI   (){ return __METHOD__; }
    protected function PRO   (){ return __METHOD__; }
    public    function PUB   (){ return __METHOD__; }
}

class SuperSuperKlass extends SuperSuperSuperKlass{
    private   function PRI   (){ return __METHOD__; }
    protected function PRO   (){ return __METHOD__; }
    public    function PUB   (){ return __METHOD__; }
}

class SuperKlass extends SuperSuperKlass{}

class Klass extends SuperKlass{
    private   function PRI   (){ return __METHOD__; }
    protected function PRO   (){ return __METHOD__; }
    public    function PUB   (){ return __METHOD__; }
}

class ChildKlass extends Klass{}

class ChildChildKlass extends ChildKlass{
    private   function PRI   (){ return __METHOD__; }
    protected function PRO   (){ return __METHOD__; }
    public    function PUB   (){ return __METHOD__; }
}

class ChildChildChildKlass extends ChildChildKlass{
    private   function PRI   (){ return __METHOD__; }
    protected function PRO   (){ return __METHOD__; }
    public    function PUB   (){ return __METHOD__; }
}

const SuperSuperSuperKlass = SuperSuperSuperKlass::CLASS;
const SuperSuperKlass = SuperSuperKlass::CLASS;
const SuperKlass = SuperKlass::CLASS;
const Klass = Klass::CLASS;
const ChildKlass = ChildKlass::CLASS;
const ChildChildKlass = ChildChildKlass::CLASS;
const ChildChildChildKlass = ChildChildChildKlass::CLASS;

/**
 * Creates a test class with a custom caller class.
 *
 * @param           string                                                                  $className
 * @param           string|null                                                             $caller
 * @return          Klass
 */
function make(string $className, string $caller = null){
    $object = new $className();
    FirstClassMethodsInternals::$customReferencerScope = $caller;
    return $object;
}

function sssk(string $caller = null){ return make(SuperSuperSuperKlass, $caller); }
function ssk (string $caller = null){ return make(SuperSuperKlass, $caller); }
function sk  (string $caller = null){ return make(SuperKlass, $caller); }
function k   (string $caller = null){ return make(Klass, $caller); }
function ck  (string $caller = null){ return make(ChildKlass, $caller); }
function cck (string $caller = null){ return make(ChildChildKlass, $caller); }
function ccck(string $caller = null){ return make(ChildChildChildKlass, $caller); }
