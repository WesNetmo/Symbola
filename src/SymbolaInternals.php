<?php

namespace Netmosfera\Symbola;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

use Error;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

class SymbolaInternals
{
    /**
     * To be used for testing purposes, allows to hard-code the class-context of the caller
     * scope. In other words, it will simulate the access to a class member from the
     * provided class name. If set to empty string it will simulate access from non-class
     * scopes (which are root scope and function scopes). `null` is the desired setting for
     * the normal use: the caller's class-context will be automatically determined using
     * PHP's `debug_backtrace()`.
     *
     * @var string|null
     */
    public static $customCallerClass = null;

    /**
     * The error class to be instantiated for "undefined object member"
     * and "invalid object member access" errors.
     *
     * Constructor must match that from the {@see Error} class.
     */
    public static $errorClass = Error::CLASS;
}
