<?php

namespace Netmosfera\FCM;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

/**
 * Example "Method" class.
 *
 * A custom one can be used by changing {FirstClassMethodsInternals::$methodClass}.
 */
class Method
{
    private $ownerClass;
    private $name;
    private $boundToObject;

    function __construct($ownerClass, $name, $boundToObject){
        $this->ownerClass = $ownerClass;
        $this->name = $name;
        $this->boundToObject = $boundToObject;
        $closure = function(...$arguments) use($name){ return $this->{$name}(...$arguments); };
        $this->closure = $closure->bindTo($this->boundToObject, $this->ownerClass);
    }

    function getThis(){
        return $this->boundToObject;
    }

    function getOwnerClass(){
        return $this->ownerClass;
    }

    function getName(){
        return $this->name;
    }

    function getScopedName(){
        return $this->ownerClass . '::' . $this->name;
    }

    function __invoke(){
        return $this->closure->__invoke(...func_get_args());
    }
}
