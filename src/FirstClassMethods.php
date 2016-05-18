<?php

namespace Netmosfera\FCM;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

use ReflectionException;
use ReflectionMethod;
use Error;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

/**
 * Implements first-class methods using the magic method `__get`.
 *
 * ```php
 * class Foo{
 *     use FirstClassMethods;
 *     function bar(string $foo){ return "bar! $foo"; }
 * }
 * $fooObj = new Foo;
 * $method = $fooObj->bar; // Gets a reference to the method `bar` bound to `$fooObj`
 * echo $method("yay!");   // Prints "bar! yay!"
 * ```
 */
trait FirstClassMethods
{
    final function __get($method){
        // The referencer's class, or empty string if not referenced from inside a class.
        $referencerClass = FirstClassMethodsInternals::$customReferencerScope ?? (string)@debug_backtrace(0, 2)[1]['class'];
        //----------------------------------------------------------------------------------
        if($referencerClass === '' || !is_a($this, $referencerClass)){
            // If referencer is outside $this' hierarchy or root scope,
            // use the last-in-hierarchy method definition
            $rm = $this->__FCM__getLastInHierarchyMethod($method);
        }else{
            // Referencer is within $this' hierarchy (the LHS operand is `$this`, e.g.
            // `$this->method`), so checking if `$method` within `$referencerClass` exists.
            try{
                $rm = new ReflectionMethod($referencerClass, $method);
                if($rm->getDeclaringClass()->getName() !== $referencerClass){ unset($rm); }
            }catch(ReflectionException $e){}
            // If it exists and it's private, then it has precedence
            if(!isset($rm) || !$rm->isPrivate()){
                // If it's not private or it doesn't exist, the last-in-hierarchy
                // method definition must be used instead.
                $rm = $this->__FCM__getLastInHierarchyMethod($method);
            }
        }
        //----------------------------------------------------------------------------------
        if($rm->isPrivate()){
            // If the method is private, the referencer class must match exactly.
            if($referencerClass !== $rm->getDeclaringClass()->getName()){
                $this->__FCM__throwError(true, $rm->getDeclaringClass()->getName(), $method, $referencerClass);
            }
        }elseif($rm->isProtected()){
            // Unless referenced anywhere in the hierarchy throw an error.
            $callerClassRootClass = $this->__FCM__getRootClassOf($referencerClass);
            if(!is_a($this, $callerClassRootClass)){
                $this->__FCM__throwError(false, $rm->getDeclaringClass()->getName(), $method, $referencerClass);
            }
        }
        //----------------------------------------------------------------------------------
        return $rm->getClosure($this);
    }

    /**
     * Gets the last-in-hierarchy method matching the given name.
     *
     * @param string $methodName
     * @return ReflectionMethod
     * @throws Error If there is no such method.
     */
    final private function __FCM__getLastInHierarchyMethod($methodName){
        try{
            return new ReflectionMethod($this, $methodName);
        }catch(ReflectionException $e){
            throw new Error("Undefined property: `" . static::CLASS . "::\$$methodName`.");
        }
    }

    /**
     * Gets the root class type of the given class name.
     *
     * @param string $className Empty string is allowed and means not-a-class referencer.
     * @return string The root class of the given class name.
     */
    final private function __FCM__getRootClassOf(string $className){
        if($className === ''){ return ''; }
        $parents = array_keys(class_parents($className));
        return count($parents) === 0 ? $className :  array_slice($parents, -1)[0];
    }

    /**
     * Formats and throws an error for `private` and `protected` invalid access.
     *
     * @param bool $isPrivate Use `true` for `private`, `false` for `protected`.
     * @param string $class The class name whose method can't be accessed.
     * @param string $method The method name of the method that can't be accessed.
     * @param string $context The class context of the referencer, or empty string if not referenced from a class context.
     * @throws Error
     */
    final private function __FCM__throwError(bool $isPrivate, string $class, string $method, string $context){
        $message = "Cannot access ";
        $message .= $isPrivate ? 'private ' : 'protected ';
        $message .= "method `{$class}::\${$method}`";
        $message .= $context === '' ? '' : " from context `$context`";
        throw new Error("$message.");
    }

    //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

    final function __set($name, $content){
        // Deal with it  (⌐■_■)
        throw new Error("Cannot set the undeclared property `" . static::CLASS . "::\$$name`.");
    }

    final function __unset($name){
        // Deal with it  (⌐■_■)
        throw new Error("Cannot unset the undeclared property `" . static::CLASS . "::\$$name`.");
    }
}
