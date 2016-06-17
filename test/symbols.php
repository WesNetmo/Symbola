<?php

use Netmosfera\Symbola\Examples\ClassMemberAccessError;

class DifferentClass{}
const Closure = Closure::CLASS;
const DifferentClass = DifferentClass::CLASS;
const EC = ClassMemberAccessError::CLASS;

function errMsg($className, $memberName, $context = ''){
    if($context === ''){
        return "Referenced the either undefined or non-public object member `$className::$memberName`.";
    }else{
        return "Referenced the either undefined or non-public object member `$className::$memberName` from context `$context`.";
    }
}
