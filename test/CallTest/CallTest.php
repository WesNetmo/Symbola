<?php

namespace Netmosfera\FCMTests\CallTest;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

use Netmosfera\FCMTests\PHPUnit;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

require(__DIR__ . '/CallTestSampleHierarchy.php');

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

class CallTest extends PHPUnit
{
    function testCallFromNonClassScopes(){
        $this->assertThrows(function(){                   sssk('')->PRI(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'PRI'));
        $this->assertThrows(function(){                   sssk('')->PRO(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'PRO'));
        $this->assertSame(SuperSuperSuperKlass . '::PUB', sssk('')->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ssk ('')->PRI(); }, EC, 0, errMsg(SuperSuperKlass, 'PRI'));
        $this->assertThrows(function(){                   ssk ('')->PRO(); }, EC, 0, errMsg(SuperSuperKlass, 'PRO'));
        $this->assertSame(SuperSuperKlass      . '::PUB', ssk ('')->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   sk  ('')->PRI(); }, EC, 0, errMsg(SuperKlass, 'PRI'));
        $this->assertThrows(function(){                   sk  ('')->PRO(); }, EC, 0, errMsg(SuperKlass, 'PRO'));
        $this->assertSame(SuperSuperKlass      . '::PUB', sk  ('')->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   k   ('')->PRI(); }, EC, 0, errMsg(Klass, 'PRI'));
        $this->assertThrows(function(){                   k   ('')->PRO(); }, EC, 0, errMsg(Klass, 'PRO'));
        $this->assertSame(Klass                . '::PUB', k   ('')->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ck  ('')->PRI(); }, EC, 0, errMsg(ChildKlass, 'PRI'));
        $this->assertThrows(function(){                   ck  ('')->PRO(); }, EC, 0, errMsg(ChildKlass, 'PRO'));
        $this->assertSame(Klass                . '::PUB', ck  ('')->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   cck ('')->PRI(); }, EC, 0, errMsg(ChildChildKlass, 'PRI'));
        $this->assertThrows(function(){                   cck ('')->PRO(); }, EC, 0, errMsg(ChildChildKlass, 'PRO'));
        $this->assertSame(ChildChildKlass      . '::PUB', cck ('')->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ccck('')->PRI(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRI'));
        $this->assertThrows(function(){                   ccck('')->PRO(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRO'));
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck('')->PUB());
    }
    
    function testCallFromOtherClasses(){
        $this->assertThrows(function(){                   sssk(DifferentClass)->PRI(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'PRI', DifferentClass));
        $this->assertThrows(function(){                   sssk(DifferentClass)->PRO(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'PRO', DifferentClass));
        $this->assertSame(SuperSuperSuperKlass . '::PUB', sssk(DifferentClass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ssk (DifferentClass)->PRI(); }, EC, 0, errMsg(SuperSuperKlass, 'PRI', DifferentClass));
        $this->assertThrows(function(){                   ssk (DifferentClass)->PRO(); }, EC, 0, errMsg(SuperSuperKlass, 'PRO', DifferentClass));
        $this->assertSame(SuperSuperKlass      . '::PUB', ssk (DifferentClass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   sk  (DifferentClass)->PRI(); }, EC, 0, errMsg(SuperKlass, 'PRI', DifferentClass));
        $this->assertThrows(function(){                   sk  (DifferentClass)->PRO(); }, EC, 0, errMsg(SuperKlass, 'PRO', DifferentClass));
        $this->assertSame(SuperSuperKlass      . '::PUB', sk  (DifferentClass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   k   (DifferentClass)->PRI(); }, EC, 0, errMsg(Klass, 'PRI', DifferentClass));
        $this->assertThrows(function(){                   k   (DifferentClass)->PRO(); }, EC, 0, errMsg(Klass, 'PRO', DifferentClass));
        $this->assertSame(Klass                . '::PUB', k   (DifferentClass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ck  (DifferentClass)->PRI(); }, EC, 0, errMsg(ChildKlass, 'PRI', DifferentClass));
        $this->assertThrows(function(){                   ck  (DifferentClass)->PRO(); }, EC, 0, errMsg(ChildKlass, 'PRO', DifferentClass));
        $this->assertSame(Klass                . '::PUB', ck  (DifferentClass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   cck (DifferentClass)->PRI(); }, EC, 0, errMsg(ChildChildKlass, 'PRI', DifferentClass));
        $this->assertThrows(function(){                   cck (DifferentClass)->PRO(); }, EC, 0, errMsg(ChildChildKlass, 'PRO', DifferentClass));
        $this->assertSame(ChildChildKlass      . '::PUB', cck (DifferentClass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ccck(DifferentClass)->PRI(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRI', DifferentClass));
        $this->assertThrows(function(){                   ccck(DifferentClass)->PRO(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRO', DifferentClass));
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(DifferentClass)->PUB());
    }
    
    function testCallFromHierarchyScopes(){
        $this->assertSame(SuperSuperSuperKlass . '::PRI', sssk(SuperSuperSuperKlass)->PRI());
        $this->assertSame(SuperSuperSuperKlass . '::PRO', sssk(SuperSuperSuperKlass)->PRO());
        $this->assertSame(SuperSuperSuperKlass . '::PUB', sssk(SuperSuperSuperKlass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertSame(SuperSuperSuperKlass . '::PRI', ssk (SuperSuperSuperKlass)->PRI());
        $this->assertSame(SuperSuperKlass      . '::PRO', ssk (SuperSuperSuperKlass)->PRO());
        $this->assertSame(SuperSuperKlass      . '::PUB', ssk (SuperSuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertSame(SuperSuperKlass      . '::PRI', ssk (SuperSuperKlass)->PRI());
        $this->assertSame(SuperSuperKlass      . '::PRO', ssk (SuperSuperKlass)->PRO());
        $this->assertSame(SuperSuperKlass      . '::PUB', ssk (SuperSuperKlass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertSame(SuperSuperSuperKlass . '::PRI', sk  (SuperSuperSuperKlass)->PRI());
        $this->assertSame(SuperSuperKlass      . '::PRO', sk  (SuperSuperSuperKlass)->PRO());
        $this->assertSame(SuperSuperKlass      . '::PUB', sk  (SuperSuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertSame(SuperSuperKlass      . '::PRI', sk  (SuperSuperKlass)->PRI());
        $this->assertSame(SuperSuperKlass      . '::PRO', sk  (SuperSuperKlass)->PRO());
        $this->assertSame(SuperSuperKlass      . '::PUB', sk  (SuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   sk  (SuperKlass)->PRI(); }, EC, 0, errMsg(SuperKlass, 'PRI', SuperKlass));
        $this->assertSame(SuperSuperKlass      . '::PRO', sk  (SuperKlass)->PRO());
        $this->assertSame(SuperSuperKlass      . '::PUB', sk  (SuperKlass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertSame(SuperSuperSuperKlass . '::PRI', k   (SuperSuperSuperKlass)->PRI());
        $this->assertSame(Klass                . '::PRO', k   (SuperSuperSuperKlass)->PRO());
        $this->assertSame(Klass                . '::PUB', k   (SuperSuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertSame(SuperSuperKlass      . '::PRI', k   (SuperSuperKlass)->PRI());
        $this->assertSame(Klass                . '::PRO', k   (SuperSuperKlass)->PRO());
        $this->assertSame(Klass                . '::PUB', k   (SuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   k   (SuperKlass)->PRI(); }, EC, 0, errMsg(Klass, 'PRI', SuperKlass));
        $this->assertSame(Klass                . '::PRO', k   (SuperKlass)->PRO());
        $this->assertSame(Klass                . '::PUB', k   (SuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertSame(Klass                . '::PRI', k   (Klass)->PRI());
        $this->assertSame(Klass                . '::PRO', k   (Klass)->PRO());
        $this->assertSame(Klass                . '::PUB', k   (Klass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertSame(SuperSuperSuperKlass . '::PRI', ck  (SuperSuperSuperKlass)->PRI());
        $this->assertSame(Klass                . '::PRO', ck  (SuperSuperSuperKlass)->PRO());
        $this->assertSame(Klass                . '::PUB', ck  (SuperSuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertSame(SuperSuperKlass      . '::PRI', ck  (SuperSuperKlass)->PRI());
        $this->assertSame(Klass                . '::PRO', ck  (SuperSuperKlass)->PRO());
        $this->assertSame(Klass                . '::PUB', ck  (SuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   ck  (SuperKlass)->PRI(); }, EC, 0, errMsg(ChildKlass, 'PRI', SuperKlass));
        $this->assertSame(Klass                . '::PRO', ck  (SuperKlass)->PRO());
        $this->assertSame(Klass                . '::PUB', ck  (SuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertSame(Klass                . '::PRI', ck  (Klass)->PRI());
        $this->assertSame(Klass                . '::PRO', ck  (Klass)->PRO());
        $this->assertSame(Klass                . '::PUB', ck  (Klass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   ck  (ChildKlass)->PRI(); }, EC, 0, errMsg(ChildKlass, 'PRI', ChildKlass));
        $this->assertSame(Klass                . '::PRO', ck  (ChildKlass)->PRO());
        $this->assertSame(Klass                . '::PUB', ck  (ChildKlass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertSame(SuperSuperSuperKlass . '::PRI', cck (SuperSuperSuperKlass)->PRI());
        $this->assertSame(ChildChildKlass      . '::PRO', cck (SuperSuperSuperKlass)->PRO());
        $this->assertSame(ChildChildKlass      . '::PUB', cck (SuperSuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertSame(SuperSuperKlass      . '::PRI', cck (SuperSuperKlass)->PRI());
        $this->assertSame(ChildChildKlass      . '::PRO', cck (SuperSuperKlass)->PRO());
        $this->assertSame(ChildChildKlass      . '::PUB', cck (SuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   cck (SuperKlass)->PRI(); }, EC, 0, errMsg(ChildChildKlass, 'PRI', SuperKlass));
        $this->assertSame(ChildChildKlass      . '::PRO', cck (SuperKlass)->PRO());
        $this->assertSame(ChildChildKlass      . '::PUB', cck (SuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertSame(Klass                . '::PRI', cck (Klass)->PRI());
        $this->assertSame(ChildChildKlass      . '::PRO', cck (Klass)->PRO());
        $this->assertSame(ChildChildKlass      . '::PUB', cck (Klass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   cck (ChildKlass)->PRI(); }, EC, 0, errMsg(ChildChildKlass, 'PRI', ChildKlass));
        $this->assertSame(ChildChildKlass      . '::PRO', cck (ChildKlass)->PRO());
        $this->assertSame(ChildChildKlass      . '::PUB', cck (ChildKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertSame(ChildChildKlass      . '::PRI', cck (ChildChildKlass)->PRI());
        $this->assertSame(ChildChildKlass      . '::PRO', cck (ChildChildKlass)->PRO());
        $this->assertSame(ChildChildKlass      . '::PUB', cck (ChildChildKlass)->PUB());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertSame(SuperSuperSuperKlass . '::PRI', ccck(SuperSuperSuperKlass)->PRI());
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(SuperSuperSuperKlass)->PRO());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(SuperSuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertSame(SuperSuperKlass      . '::PRI', ccck(SuperSuperKlass)->PRI());
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(SuperSuperKlass)->PRO());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(SuperSuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   ccck(SuperKlass)->PRI(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRI', SuperKlass));
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(SuperKlass)->PRO());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(SuperKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertSame(Klass                . '::PRI', ccck(Klass)->PRI());
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(Klass)->PRO());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(Klass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   ccck(ChildKlass)->PRI(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRI', ChildKlass));
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(ChildKlass)->PRO());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(ChildKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertSame(ChildChildKlass      . '::PRI', ccck(ChildChildKlass)->PRI());
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(ChildChildKlass)->PRO());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(ChildChildKlass)->PUB());
        //----------------------------------------------------------------------------------
        $this->assertSame(ChildChildChildKlass . '::PRI', ccck(ChildChildChildKlass)->PRI());
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(ChildChildChildKlass)->PRO());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(ChildChildChildKlass)->PUB());
    }

    function testCallNonexistingMethodFromOuterScopes(){
        $this->assertThrows(function(){ sssk('')->WAT(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'WAT'));
        $this->assertThrows(function(){ ssk ('')->WAT(); }, EC, 0, errMsg(SuperSuperKlass, 'WAT'));
        $this->assertThrows(function(){ sk  ('')->WAT(); }, EC, 0, errMsg(SuperKlass, 'WAT'));
        $this->assertThrows(function(){ k   ('')->WAT(); }, EC, 0, errMsg(Klass, 'WAT'));
        $this->assertThrows(function(){ ck  ('')->WAT(); }, EC, 0, errMsg(ChildKlass, 'WAT'));
        $this->assertThrows(function(){ cck ('')->WAT(); }, EC, 0, errMsg(ChildChildKlass, 'WAT'));
        $this->assertThrows(function(){ ccck('')->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT'));
    }

    function testCallNonexistingMethodFromWithinHierarchy(){
        $this->assertThrows(function(){ sssk(SuperSuperSuperKlass)->WAT(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'WAT', SuperSuperSuperKlass));
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ ssk (SuperSuperSuperKlass)->WAT(); }, EC, 0, errMsg(SuperSuperKlass, 'WAT', SuperSuperSuperKlass));
        $this->assertThrows(function(){ ssk (SuperSuperKlass)->WAT(); }, EC, 0, errMsg(SuperSuperKlass, 'WAT', SuperSuperKlass));
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ sk  (SuperSuperSuperKlass)->WAT(); }, EC, 0, errMsg(SuperKlass, 'WAT', SuperSuperSuperKlass));
        $this->assertThrows(function(){ sk  (SuperSuperKlass)->WAT(); }, EC, 0, errMsg(SuperKlass, 'WAT', SuperSuperKlass));
        $this->assertThrows(function(){ sk  (SuperKlass)->WAT(); }, EC, 0, errMsg(SuperKlass, 'WAT', SuperKlass));
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ k   (SuperSuperSuperKlass)->WAT(); }, EC, 0, errMsg(Klass, 'WAT', SuperSuperSuperKlass));
        $this->assertThrows(function(){ k   (SuperSuperKlass)->WAT(); }, EC, 0, errMsg(Klass, 'WAT', SuperSuperKlass));
        $this->assertThrows(function(){ k   (SuperKlass)->WAT(); }, EC, 0, errMsg(Klass, 'WAT', SuperKlass));
        $this->assertThrows(function(){ k   (Klass)->WAT(); }, EC, 0, errMsg(Klass, 'WAT', Klass));
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ ck  (SuperSuperSuperKlass)->WAT(); }, EC, 0, errMsg(ChildKlass, 'WAT', SuperSuperSuperKlass));
        $this->assertThrows(function(){ ck  (SuperSuperKlass)->WAT(); }, EC, 0, errMsg(ChildKlass, 'WAT', SuperSuperKlass));
        $this->assertThrows(function(){ ck  (SuperKlass)->WAT(); }, EC, 0, errMsg(ChildKlass, 'WAT', SuperKlass));
        $this->assertThrows(function(){ ck  (Klass)->WAT(); }, EC, 0, errMsg(ChildKlass, 'WAT', Klass));
        $this->assertThrows(function(){ ck  (ChildKlass)->WAT(); }, EC, 0, errMsg(ChildKlass, 'WAT', ChildKlass));
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ cck (SuperSuperSuperKlass)->WAT(); }, EC, 0, errMsg(ChildChildKlass, 'WAT', SuperSuperSuperKlass));
        $this->assertThrows(function(){ cck (SuperSuperKlass)->WAT(); }, EC, 0, errMsg(ChildChildKlass, 'WAT', SuperSuperKlass));
        $this->assertThrows(function(){ cck (SuperKlass)->WAT(); }, EC, 0, errMsg(ChildChildKlass, 'WAT', SuperKlass));
        $this->assertThrows(function(){ cck (Klass)->WAT(); }, EC, 0, errMsg(ChildChildKlass, 'WAT', Klass));
        $this->assertThrows(function(){ cck (ChildKlass)->WAT(); }, EC, 0, errMsg(ChildChildKlass, 'WAT', ChildKlass));
        $this->assertThrows(function(){ cck (ChildChildKlass)->WAT(); }, EC, 0, errMsg(ChildChildKlass, 'WAT', ChildChildKlass));
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ ccck(SuperSuperSuperKlass)->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', SuperSuperSuperKlass));
        $this->assertThrows(function(){ ccck(SuperSuperKlass)->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', SuperSuperKlass));
        $this->assertThrows(function(){ ccck(SuperKlass)->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', SuperKlass));
        $this->assertThrows(function(){ ccck(Klass)->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', Klass));
        $this->assertThrows(function(){ ccck(ChildKlass)->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', ChildKlass));
        $this->assertThrows(function(){ ccck(ChildChildKlass)->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', ChildChildKlass));
        $this->assertThrows(function(){ ccck(ChildChildChildKlass)->WAT(); }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', ChildChildChildKlass));
    }
}
