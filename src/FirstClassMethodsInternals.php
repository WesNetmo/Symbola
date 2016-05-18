<?php

namespace Netmosfera\FCM;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

class FirstClassMethodsInternals
{
    /**
     * To be used for testing purposes, allows to hardcode the class-scope of the referencer
     * that requests a handle to a class method. For example, given that `$a` implements
     * {@see FirstClassMethods}, if set to `B`, referencing `$a->someMethod` **anywhere**
     * will behave the same as doing `class B{ function _($a){ return $a->someMethod; } }`.
     * If set to empty string it will simulate the lookup for the reference from the root
     * scope and functions scope; if set to a class name, the referencer will be simulated
     * to be a method of such class. `null` is the desired setting for the normal use;
     * whenever set, the referencer's scope will be automatically determined using PHP's
     * `debug_backtrace()`.
     *
     * @var string|null
     */
    static $customReferencerScope = null;

    /**
     * @TODOC
     */
    static $methodClass = Method::CLASS;
}
