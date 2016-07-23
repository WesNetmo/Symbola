<?php

namespace Netmosfera\Symbola;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

use Netmosfera\Symbola\Examples\ClassMemberAccessError;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

class SymbolaInternals
{
    /**
     * To be used for testing purposes, allows to hardcode the class-context of the
     * referencing scope. In other words, it will simulate the access to a class member
     * from the provided class name. If set to empty string it will simulate access from
     * non-class scopes (which are root scope and function scopes). `null` is the desired
     * setting for the normal use: the referencer's class context will be automatically
     * determined using PHP's `debug_backtrace()`.
     *
     * @var string|null
     */
    public static $customReferencerScope = null;

    /**
     * The error class to be instantiated for "undefined object member"
     * and "invalid object member access" errors.
     *
     * Constructor must match that from Error class.
     */
    public static $errorClass = ClassMemberAccessError::CLASS;
}
