<?php

namespace Netmosfera\Symbola;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

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
    /** @inheritDoc */
    function __call($methodName, $arguments){
        $callerClassContext = $this->__Symbola__getReferencerClass();
        $call = function($methodName, $arguments){ $m = $this->$methodName; return $m(...$arguments); };
        $call = $call->bindTo($this, $callerClassContext);
        return $call($methodName, $arguments);
    }

    /** @inheritDoc */
    function __get($methodName){
        $callerClassContext = $this->__Symbola__getReferencerClass();
        //----------------------------------------------------------------------------------
        if(is_a($this, $callerClassContext)){
            // Caller is within `$this` object's hierarchy (e.g. `$this->method`);
            // checking if `$methodName` within `$callerClassContext` exists.
            try{
                $reflectionMethod = new ReflectionMethod($callerClassContext, $methodName);
                if($reflectionMethod->getDeclaringClass()->getName() !== $callerClassContext){
                    // The method must be defined within `$callerClassContext`;
                    // inherited methods must be discarded, as this aims to determine if
                    // a private method named `$methodName` exists.
                    unset($reflectionMethod);
                }
            }catch(ReflectionException $e){
                // The method is undefined.
            }
            if(!isset($reflectionMethod) || !$reflectionMethod->isPrivate()){
                // If it's not private or it doesn't exist, attempt to use
                // the last-in-hierarchy method definition.
                $reflectionMethod = $this->__FCM__getLastInHierarchyMethod($methodName, $callerClassContext);
            }
            // Otherwise, use the private method found, which has precedence.
        }else{
            // Caller is outside $this' hierarchy; attempt to use
            // the last-in-hierarchy method definition.
            $reflectionMethod = $this->__FCM__getLastInHierarchyMethod($methodName, $callerClassContext);
        }
        //----------------------------------------------------------------------------------
        if(
            // If the method is private, the referencer class context must match exactly.
            ($reflectionMethod->isPrivate() && $callerClassContext !== $reflectionMethod->getDeclaringClass()->getName()) ||
            // If the method is protected, $this must be an instance of the root class
            // (the first class in hierarchy that has no `extends`) of $callerClassContext
            ($reflectionMethod->isProtected() && !is_a($this, $this->__Symbola__getRootClassOf($callerClassContext)))
        ){
            $this->__Symbola__throwError(static::CLASS, $methodName, $callerClassContext);
        }
        //----------------------------------------------------------------------------------
        $method = function(...$arguments) use($methodName){
            return $this->$methodName(...$arguments);
        };
        return $method->bindTo($this, $reflectionMethod->getDeclaringClass()->getName());
    }

    /**
     * Returns the class-context of the scope that referenced a member of `$this` object.
     *
     * If the referencer's scope is outside of class context (i.e. it is a function, or
     * the root scope), the dummy class name `Netmosfera\FCM\§NotAClass§` will be returned
     * instead.
     *
     * @return string
     */
    final private function __Symbola__getReferencerClass(){
        if(isset(SymbolaInternals::$customReferencerScope)){
            $referencerClass = SymbolaInternals::$customReferencerScope;
            return $referencerClass === '' ? §NotAClass§::CLASS : $referencerClass;
        }
        $referencerClass = debug_backtrace(0, 3);
        if(isset($referencerClass[2]) && isset($referencerClass[2]['class'])){
            return $referencerClass[2]['class'];
        }
        return §NotAClass§::CLASS;
    }

    /**
     * Gets the last-in-hierarchy method definition matching the given name.
     *
     * @param string $methodName
     * @param string $referencerClass
     * @return ReflectionMethod
     * @throws Error If there is no such method.
     */
    final private function __FCM__getLastInHierarchyMethod($methodName, $referencerClass){
        try{
            return new ReflectionMethod($this, $methodName);
        }catch(ReflectionException $e){
            $this->__Symbola__throwError(static::CLASS, $methodName, $referencerClass);
        }
    }

    /**
     * Gets the root class type of the given class name.
     *
     * @param string $className
     * @return string The root class of the given class name.
     */
    final private function __Symbola__getRootClassOf(string $className){
        $parents = array_keys(class_parents($className));
        return count($parents) === 0 ? $className :  array_slice($parents, -1)[0];
    }

    /**
     * Formats and throws an error invalid access.
     *
     * @param string $className The class name whose method can't be accessed.
     * @param string $memberName The name of the object member that can't be accessed.
     * @param string $contextClassName The class context of the referencer, or empty string if referenced from a non-class context.
     * @throws Error
     */
    final private function __Symbola__throwError(string $className, string $memberName, string $contextClassName){
        $message  = "Referenced the either undefined or non-public object member `$className::$memberName`";
        $message .= $contextClassName === §NotAClass§::CLASS ? '' : " from context `$contextClassName`";
        throw new SymbolaInternals::$errorClass("$message.");
    }
}
