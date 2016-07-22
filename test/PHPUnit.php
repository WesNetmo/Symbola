<?php

namespace Netmosfera\SymbolaTests;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

use PHPUnit_Framework_TestCase;
use Throwable;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

abstract class PHPUnit extends PHPUnit_Framework_TestCase
{
    /**
     * Asserts that the given callable raises the given exception type.
     *
     * @param       callable                                                                $code
     * @param       string                                                                  $exceptionType
     * @param       int|null                                                                $exceptionCode
     * @param       string|null                                                             $exceptionMessage
     * @throws      Throwable
     */
    static function assertThrows(callable $code, string $exceptionType = Throwable::CLASS, int $exceptionCode = null, string $exceptionMessage = null){
        try{
            $code();
            self::assertFalse(true, "Expected an exception of type $exceptionType to be thrown, got nothing instead");
        }catch(Throwable $e){
            if($e instanceof $exceptionType){
                self::assertInstanceOf($exceptionType, $e);
                if($exceptionCode !== null){
                    self::assertSame($exceptionCode, $e->getCode());
                }
                if($exceptionMessage !== null){
                    self::assertSame($exceptionMessage, $e->getMessage());
                }
            }else{
                throw $e;
            }
        }
    }
}
