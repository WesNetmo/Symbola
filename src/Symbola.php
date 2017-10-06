<?php

namespace Netmosfera\Symbola;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

use function debug_backtrace;
use function class_parents;
use function array_slice;
use function array_keys;
use function count;
use function is_a;
use ReflectionException;
use ReflectionMethod;
use Error;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

final class §NotAClass§
{
    private function __construct(){}
}

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

trait Symbola
{
    private $__Symbola__closures = [];

    //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

    /** @inheritDoc */
    public function __call($memberName, $arguments){
        return (function() use($memberName, $arguments){
            return ($this->{$memberName})(...$arguments);
        })->bindTo(
            $this,
            $this->__Symbola__getCallerClass()
        )();
    }

    //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

    /** @inheritDoc */
    public function __get($memberName){
        $callerClass = $this->__Symbola__getCallerClass();

        $RM = NULL;

        // Attempts to get the private method in `$callerClass` first:
        if(is_a($this, $callerClass)){
            try{
                $RM = new ReflectionMethod($callerClass, $memberName);
                if(
                    $RM->getDeclaringClass()->getName() !== $callerClass ||
                    $RM->isPrivate() === FALSE
                ){
                    $RM = NULL;
                }
            }catch(ReflectionException $e){
                unset($e); // There is no private method in `$callerClass`.
            }
        }

        // If the private method is not available, use the most recent method definition:
        if($RM === NULL){
            try{
                $RM = new ReflectionMethod($this, $memberName);
            }catch(ReflectionException $e){
                $this->__Symbola__throwError(static::CLASS, $memberName, $callerClass);
            }
        }

        $RMOwnerClass = $RM->getDeclaringClass();
        $RMIsPrivate = $RM->isPrivate();
        if(
            // If the method is private, the caller class' context must match exactly.
            ($RMIsPrivate && $callerClass !== $RMOwnerClass->getName()) ||

            // If the method is protected, `$this` must be an instance of the root class
            // (the first class in hierarchy that has no `extends`) of `$callerClass`.
            ($RM->isProtected() && !is_a($this, $this->__Symbola__getRootClassOf($callerClass)))
        ){
            $this->__Symbola__throwError(static::CLASS, $memberName, $callerClass);
        }

        $key = ($RMIsPrivate ? $RMOwnerClass . "::" : "") . $memberName;

        if(!isset($this->__Symbola__closures[$key])){
            $this->__Symbola__closures[$key] = $RM->getClosure($this);
        }

        return $this->__Symbola__closures[$key];
    }

    //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

    /**
     * Returns the class-context of the scope that referenced a member of `$this` object.
     *
     * If the referencer's scope is outside of class context (i.e. it is a function, or
     * the root scope), the dummy class name `Netmosfera\FCM\§NotAClass§` will be returned
     * instead.
     *
     * @return string
     */
    private function __Symbola__getCallerClass(){
        if(SymbolaInternals::$customCallerClass !== NULL){
            $callerClass = SymbolaInternals::$customCallerClass;
            return $callerClass === '' ? §NotAClass§::CLASS : $callerClass;
        }
        // @codeCoverageIgnoreStart
        $callerClass = debug_backtrace(0, 3);
        if(isset($callerClass[2]) && isset($callerClass[2]['class'])){
            return $callerClass[2]['class'];
        }
        return §NotAClass§::CLASS;
        // @codeCoverageIgnoreEnd
    }

    //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

    /**
     * Gets the root class type of the given class name.
     *
     * @param string $className
     * @return string The root class of the given class name.
     */
    private function __Symbola__getRootClassOf(string $className){
        $parents = array_keys(class_parents($className));
        return count($parents) === 0 ? $className :  array_slice($parents, -1)[0];
    }

    //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

    /**
     * Formats and throws an error invalid access.
     *
     * @param string $className The class name whose method can't be accessed.
     * @param string $memberName The name of the object member that can't be accessed.
     * @param string $callerClass The class context of the referencer, or empty string if referenced from a non-class context.
     * @throws Error
     */
    private function __Symbola__throwError(string $className, string $memberName, string $callerClass){
        if($callerClass === §NotAClass§::CLASS){
            $message = sprintf(
                "Referenced the either undefined or non-public object member `%s::%s`",
                $className, $memberName
            );
        }else{
            $message = sprintf(
                "Referenced the either undefined or non-public object member `%s::%s` from context `%s`",
                $className, $memberName, $callerClass
            );
        }
        throw new SymbolaInternals::$errorClass($message);
    }
}
