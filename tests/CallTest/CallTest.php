<?php

namespace Netmosfera\SymbolaTests\CallTest;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

use Netmosfera\SymbolaTests\PHPUnit;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

require(__DIR__ . '/CallTestSampleHierarchy.php');

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

class CallTest extends PHPUnit
{
    function testCallFromNonClassScopes(){
        self::assertThrows(function(){                   sssk('')->PRI(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'PRI'));
        self::assertThrows(function(){                   sssk('')->PRO(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'PRO'));
        self::assertSame(SuperSuperSuperKlass . '::PUB', sssk('')->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertThrows(function(){                   ssk ('')->PRI(); }, EC, 0, errMsg(SuperSuperKlass, 'PRI'));
        self::assertThrows(function(){                   ssk ('')->PRO(); }, EC, 0, errMsg(SuperSuperKlass, 'PRO'));
        self::assertSame(SuperSuperKlass      . '::PUB', ssk ('')->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertThrows(function(){                   sk  ('')->PRI(); }, EC, 0, errMsg(SuperKlass, 'PRI'));
        self::assertThrows(function(){                   sk  ('')->PRO(); }, EC, 0, errMsg(SuperKlass, 'PRO'));
        self::assertSame(SuperSuperKlass      . '::PUB', sk  ('')->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertThrows(function(){                   k   ('')->PRI(); }, EC, 0, errMsg(Klass, 'PRI'));
        self::assertThrows(function(){                   k   ('')->PRO(); }, EC, 0, errMsg(Klass, 'PRO'));
        self::assertSame(Klass                . '::PUB', k   ('')->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertThrows(function(){                   ck  ('')->PRI(); }, EC, 0, errMsg(ChildKlass, 'PRI'));
        self::assertThrows(function(){                   ck  ('')->PRO(); }, EC, 0, errMsg(ChildKlass, 'PRO'));
        self::assertSame(Klass                . '::PUB', ck  ('')->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertThrows(function(){                   cck ('')->PRI(); }, EC, 0, errMsg(ChildChildKlass, 'PRI'));
        self::assertThrows(function(){                   cck ('')->PRO(); }, EC, 0, errMsg(ChildChildKlass, 'PRO'));
        self::assertSame(ChildChildKlass      . '::PUB', cck ('')->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertThrows(function(){                   ccck('')->PRI(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRI'));
        self::assertThrows(function(){                   ccck('')->PRO(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRO'));
        self::assertSame(ChildChildChildKlass . '::PUB', ccck('')->PUB());
    }

    function testCallFromOtherClasses(){
        self::assertThrows(function(){                   sssk(DifferentClass)->PRI(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'PRI', DifferentClass));
        self::assertThrows(function(){                   sssk(DifferentClass)->PRO(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'PRO', DifferentClass));
        self::assertSame(SuperSuperSuperKlass . '::PUB', sssk(DifferentClass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertThrows(function(){                   ssk (DifferentClass)->PRI(); }, EC, 0, errMsg(SuperSuperKlass, 'PRI', DifferentClass));
        self::assertThrows(function(){                   ssk (DifferentClass)->PRO(); }, EC, 0, errMsg(SuperSuperKlass, 'PRO', DifferentClass));
        self::assertSame(SuperSuperKlass      . '::PUB', ssk (DifferentClass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertThrows(function(){                   sk  (DifferentClass)->PRI(); }, EC, 0, errMsg(SuperKlass, 'PRI', DifferentClass));
        self::assertThrows(function(){                   sk  (DifferentClass)->PRO(); }, EC, 0, errMsg(SuperKlass, 'PRO', DifferentClass));
        self::assertSame(SuperSuperKlass      . '::PUB', sk  (DifferentClass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertThrows(function(){                   k   (DifferentClass)->PRI(); }, EC, 0, errMsg(Klass, 'PRI', DifferentClass));
        self::assertThrows(function(){                   k   (DifferentClass)->PRO(); }, EC, 0, errMsg(Klass, 'PRO', DifferentClass));
        self::assertSame(Klass                . '::PUB', k   (DifferentClass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertThrows(function(){                   ck  (DifferentClass)->PRI(); }, EC, 0, errMsg(ChildKlass, 'PRI', DifferentClass));
        self::assertThrows(function(){                   ck  (DifferentClass)->PRO(); }, EC, 0, errMsg(ChildKlass, 'PRO', DifferentClass));
        self::assertSame(Klass                . '::PUB', ck  (DifferentClass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertThrows(function(){                   cck (DifferentClass)->PRI(); }, EC, 0, errMsg(ChildChildKlass, 'PRI', DifferentClass));
        self::assertThrows(function(){                   cck (DifferentClass)->PRO(); }, EC, 0, errMsg(ChildChildKlass, 'PRO', DifferentClass));
        self::assertSame(ChildChildKlass      . '::PUB', cck (DifferentClass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertThrows(function(){                   ccck(DifferentClass)->PRI(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRI', DifferentClass));
        self::assertThrows(function(){                   ccck(DifferentClass)->PRO(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRO', DifferentClass));
        self::assertSame(ChildChildChildKlass . '::PUB', ccck(DifferentClass)->PUB());
    }

    function testCallFromHierarchyScopes(){
        self::assertSame(SuperSuperSuperKlass . '::PRI', sssk(SuperSuperSuperKlass)->PRI());
        self::assertSame(SuperSuperSuperKlass . '::PRO', sssk(SuperSuperSuperKlass)->PRO());
        self::assertSame(SuperSuperSuperKlass . '::PUB', sssk(SuperSuperSuperKlass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertSame(SuperSuperSuperKlass . '::PRI', ssk (SuperSuperSuperKlass)->PRI());
        self::assertSame(SuperSuperKlass      . '::PRO', ssk (SuperSuperSuperKlass)->PRO());
        self::assertSame(SuperSuperKlass      . '::PUB', ssk (SuperSuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertSame(SuperSuperKlass      . '::PRI', ssk (SuperSuperKlass)->PRI());
        self::assertSame(SuperSuperKlass      . '::PRO', ssk (SuperSuperKlass)->PRO());
        self::assertSame(SuperSuperKlass      . '::PUB', ssk (SuperSuperKlass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertSame(SuperSuperSuperKlass . '::PRI', sk  (SuperSuperSuperKlass)->PRI());
        self::assertSame(SuperSuperKlass      . '::PRO', sk  (SuperSuperSuperKlass)->PRO());
        self::assertSame(SuperSuperKlass      . '::PUB', sk  (SuperSuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertSame(SuperSuperKlass      . '::PRI', sk  (SuperSuperKlass)->PRI());
        self::assertSame(SuperSuperKlass      . '::PRO', sk  (SuperSuperKlass)->PRO());
        self::assertSame(SuperSuperKlass      . '::PUB', sk  (SuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertThrows(function(){                   sk  (SuperKlass)->PRI(); }, EC, 0, errMsg(SuperKlass, 'PRI', SuperKlass));
        self::assertSame(SuperSuperKlass      . '::PRO', sk  (SuperKlass)->PRO());
        self::assertSame(SuperSuperKlass      . '::PUB', sk  (SuperKlass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertSame(SuperSuperSuperKlass . '::PRI', k   (SuperSuperSuperKlass)->PRI());
        self::assertSame(Klass                . '::PRO', k   (SuperSuperSuperKlass)->PRO());
        self::assertSame(Klass                . '::PUB', k   (SuperSuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertSame(SuperSuperKlass      . '::PRI', k   (SuperSuperKlass)->PRI());
        self::assertSame(Klass                . '::PRO', k   (SuperSuperKlass)->PRO());
        self::assertSame(Klass                . '::PUB', k   (SuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertThrows(function(){                   k   (SuperKlass)->PRI(); }, EC, 0, errMsg(Klass, 'PRI', SuperKlass));
        self::assertSame(Klass                . '::PRO', k   (SuperKlass)->PRO());
        self::assertSame(Klass                . '::PUB', k   (SuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertSame(Klass                . '::PRI', k   (Klass)->PRI());
        self::assertSame(Klass                . '::PRO', k   (Klass)->PRO());
        self::assertSame(Klass                . '::PUB', k   (Klass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertSame(SuperSuperSuperKlass . '::PRI', ck  (SuperSuperSuperKlass)->PRI());
        self::assertSame(Klass                . '::PRO', ck  (SuperSuperSuperKlass)->PRO());
        self::assertSame(Klass                . '::PUB', ck  (SuperSuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertSame(SuperSuperKlass      . '::PRI', ck  (SuperSuperKlass)->PRI());
        self::assertSame(Klass                . '::PRO', ck  (SuperSuperKlass)->PRO());
        self::assertSame(Klass                . '::PUB', ck  (SuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertThrows(function(){                   ck  (SuperKlass)->PRI(); }, EC, 0, errMsg(ChildKlass, 'PRI', SuperKlass));
        self::assertSame(Klass                . '::PRO', ck  (SuperKlass)->PRO());
        self::assertSame(Klass                . '::PUB', ck  (SuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertSame(Klass                . '::PRI', ck  (Klass)->PRI());
        self::assertSame(Klass                . '::PRO', ck  (Klass)->PRO());
        self::assertSame(Klass                . '::PUB', ck  (Klass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertThrows(function(){                   ck  (ChildKlass)->PRI(); }, EC, 0, errMsg(ChildKlass, 'PRI', ChildKlass));
        self::assertSame(Klass                . '::PRO', ck  (ChildKlass)->PRO());
        self::assertSame(Klass                . '::PUB', ck  (ChildKlass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertSame(SuperSuperSuperKlass . '::PRI', cck (SuperSuperSuperKlass)->PRI());
        self::assertSame(ChildChildKlass      . '::PRO', cck (SuperSuperSuperKlass)->PRO());
        self::assertSame(ChildChildKlass      . '::PUB', cck (SuperSuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertSame(SuperSuperKlass      . '::PRI', cck (SuperSuperKlass)->PRI());
        self::assertSame(ChildChildKlass      . '::PRO', cck (SuperSuperKlass)->PRO());
        self::assertSame(ChildChildKlass      . '::PUB', cck (SuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertThrows(function(){                   cck (SuperKlass)->PRI(); }, EC, 0, errMsg(ChildChildKlass, 'PRI', SuperKlass));
        self::assertSame(ChildChildKlass      . '::PRO', cck (SuperKlass)->PRO());
        self::assertSame(ChildChildKlass      . '::PUB', cck (SuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertSame(Klass                . '::PRI', cck (Klass)->PRI());
        self::assertSame(ChildChildKlass      . '::PRO', cck (Klass)->PRO());
        self::assertSame(ChildChildKlass      . '::PUB', cck (Klass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertThrows(function(){                   cck (ChildKlass)->PRI(); }, EC, 0, errMsg(ChildChildKlass, 'PRI', ChildKlass));
        self::assertSame(ChildChildKlass      . '::PRO', cck (ChildKlass)->PRO());
        self::assertSame(ChildChildKlass      . '::PUB', cck (ChildKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertSame(ChildChildKlass      . '::PRI', cck (ChildChildKlass)->PRI());
        self::assertSame(ChildChildKlass      . '::PRO', cck (ChildChildKlass)->PRO());
        self::assertSame(ChildChildKlass      . '::PUB', cck (ChildChildKlass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        self::assertSame(SuperSuperSuperKlass . '::PRI', ccck(SuperSuperSuperKlass)->PRI());
        self::assertSame(ChildChildChildKlass . '::PRO', ccck(SuperSuperSuperKlass)->PRO());
        self::assertSame(ChildChildChildKlass . '::PUB', ccck(SuperSuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertSame(SuperSuperKlass      . '::PRI', ccck(SuperSuperKlass)->PRI());
        self::assertSame(ChildChildChildKlass . '::PRO', ccck(SuperSuperKlass)->PRO());
        self::assertSame(ChildChildChildKlass . '::PUB', ccck(SuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertThrows(function(){                   ccck(SuperKlass)->PRI(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRI', SuperKlass));
        self::assertSame(ChildChildChildKlass . '::PRO', ccck(SuperKlass)->PRO());
        self::assertSame(ChildChildChildKlass . '::PUB', ccck(SuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertSame(Klass                . '::PRI', ccck(Klass)->PRI());
        self::assertSame(ChildChildChildKlass . '::PRO', ccck(Klass)->PRO());
        self::assertSame(ChildChildChildKlass . '::PUB', ccck(Klass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertThrows(function(){                   ccck(ChildKlass)->PRI(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRI', ChildKlass));
        self::assertSame(ChildChildChildKlass . '::PRO', ccck(ChildKlass)->PRO());
        self::assertSame(ChildChildChildKlass . '::PUB', ccck(ChildKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertSame(ChildChildKlass      . '::PRI', ccck(ChildChildKlass)->PRI());
        self::assertSame(ChildChildChildKlass . '::PRO', ccck(ChildChildKlass)->PRO());
        self::assertSame(ChildChildChildKlass . '::PUB', ccck(ChildChildKlass)->PUB());
        //----------------------------------------------------------------------------------
        self::assertSame(ChildChildChildKlass . '::PRI', ccck(ChildChildChildKlass)->PRI());
        self::assertSame(ChildChildChildKlass . '::PRO', ccck(ChildChildChildKlass)->PRO());
        self::assertSame(ChildChildChildKlass . '::PUB', ccck(ChildChildChildKlass)->PUB());
    }

    function testCallNonexistingMethodFromOuterScopes(){
        self::assertThrows(function(){ sssk('')->WAT(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'WAT'));
        self::assertThrows(function(){ ssk ('')->WAT(); }, EC, 0, errMsg(SuperSuperKlass, 'WAT'));
        self::assertThrows(function(){ sk  ('')->WAT(); }, EC, 0, errMsg(SuperKlass, 'WAT'));
        self::assertThrows(function(){ k   ('')->WAT(); }, EC, 0, errMsg(Klass, 'WAT'));
        self::assertThrows(function(){ ck  ('')->WAT(); }, EC, 0, errMsg(ChildKlass, 'WAT'));
        self::assertThrows(function(){ cck ('')->WAT(); }, EC, 0, errMsg(ChildChildKlass, 'WAT'));
        self::assertThrows(function(){ ccck('')->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT'));
    }

    function testCallNonexistingMethodFromWithinHierarchy(){
        self::assertThrows(function(){ sssk(SuperSuperSuperKlass)->WAT(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'WAT', SuperSuperSuperKlass));
        //----------------------------------------------------------------------------------
        self::assertThrows(function(){ ssk (SuperSuperSuperKlass)->WAT(); }, EC, 0, errMsg(SuperSuperKlass, 'WAT', SuperSuperSuperKlass));
        self::assertThrows(function(){ ssk (SuperSuperKlass)->WAT(); }, EC, 0, errMsg(SuperSuperKlass, 'WAT', SuperSuperKlass));
        //----------------------------------------------------------------------------------
        self::assertThrows(function(){ sk  (SuperSuperSuperKlass)->WAT(); }, EC, 0, errMsg(SuperKlass, 'WAT', SuperSuperSuperKlass));
        self::assertThrows(function(){ sk  (SuperSuperKlass)->WAT(); }, EC, 0, errMsg(SuperKlass, 'WAT', SuperSuperKlass));
        self::assertThrows(function(){ sk  (SuperKlass)->WAT(); }, EC, 0, errMsg(SuperKlass, 'WAT', SuperKlass));
        //----------------------------------------------------------------------------------
        self::assertThrows(function(){ k   (SuperSuperSuperKlass)->WAT(); }, EC, 0, errMsg(Klass, 'WAT', SuperSuperSuperKlass));
        self::assertThrows(function(){ k   (SuperSuperKlass)->WAT(); }, EC, 0, errMsg(Klass, 'WAT', SuperSuperKlass));
        self::assertThrows(function(){ k   (SuperKlass)->WAT(); }, EC, 0, errMsg(Klass, 'WAT', SuperKlass));
        self::assertThrows(function(){ k   (Klass)->WAT(); }, EC, 0, errMsg(Klass, 'WAT', Klass));
        //----------------------------------------------------------------------------------
        self::assertThrows(function(){ ck  (SuperSuperSuperKlass)->WAT(); }, EC, 0, errMsg(ChildKlass, 'WAT', SuperSuperSuperKlass));
        self::assertThrows(function(){ ck  (SuperSuperKlass)->WAT(); }, EC, 0, errMsg(ChildKlass, 'WAT', SuperSuperKlass));
        self::assertThrows(function(){ ck  (SuperKlass)->WAT(); }, EC, 0, errMsg(ChildKlass, 'WAT', SuperKlass));
        self::assertThrows(function(){ ck  (Klass)->WAT(); }, EC, 0, errMsg(ChildKlass, 'WAT', Klass));
        self::assertThrows(function(){ ck  (ChildKlass)->WAT(); }, EC, 0, errMsg(ChildKlass, 'WAT', ChildKlass));
        //----------------------------------------------------------------------------------
        self::assertThrows(function(){ cck (SuperSuperSuperKlass)->WAT(); }, EC, 0, errMsg(ChildChildKlass, 'WAT', SuperSuperSuperKlass));
        self::assertThrows(function(){ cck (SuperSuperKlass)->WAT(); }, EC, 0, errMsg(ChildChildKlass, 'WAT', SuperSuperKlass));
        self::assertThrows(function(){ cck (SuperKlass)->WAT(); }, EC, 0, errMsg(ChildChildKlass, 'WAT', SuperKlass));
        self::assertThrows(function(){ cck (Klass)->WAT(); }, EC, 0, errMsg(ChildChildKlass, 'WAT', Klass));
        self::assertThrows(function(){ cck (ChildKlass)->WAT(); }, EC, 0, errMsg(ChildChildKlass, 'WAT', ChildKlass));
        self::assertThrows(function(){ cck (ChildChildKlass)->WAT(); }, EC, 0, errMsg(ChildChildKlass, 'WAT', ChildChildKlass));
        //----------------------------------------------------------------------------------
        self::assertThrows(function(){ ccck(SuperSuperSuperKlass)->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', SuperSuperSuperKlass));
        self::assertThrows(function(){ ccck(SuperSuperKlass)->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', SuperSuperKlass));
        self::assertThrows(function(){ ccck(SuperKlass)->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', SuperKlass));
        self::assertThrows(function(){ ccck(Klass)->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', Klass));
        self::assertThrows(function(){ ccck(ChildKlass)->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', ChildKlass));
        self::assertThrows(function(){ ccck(ChildChildKlass)->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', ChildChildKlass));
        self::assertThrows(function(){ ccck(ChildChildChildKlass)->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', ChildChildChildKlass));
    }
}
