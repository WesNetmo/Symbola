<?php

namespace Netmosfera\SymbolaTests\GetTest;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

use Netmosfera\SymbolaTests\PHPUnit;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

require(__DIR__ . '/GetTestSampleHierarchy.php');

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

class GetTest extends PHPUnit
{
    function testReferencingFromNonClassScopes(){
        $this->assertThrows(function(){                   sssk('')->PRI->__invoke(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'PRI'));
        $this->assertThrows(function(){                   sssk('')->PRO->__invoke(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'PRO'));
        $this->assertSame(SuperSuperSuperKlass . '::PUB', sssk('')->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ssk ('')->PRI->__invoke(); }, EC, 0, errMsg(SuperSuperKlass, 'PRI'));
        $this->assertThrows(function(){                   ssk ('')->PRO->__invoke(); }, EC, 0, errMsg(SuperSuperKlass, 'PRO'));
        $this->assertSame(SuperSuperKlass      . '::PUB', ssk ('')->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   sk  ('')->PRI->__invoke(); }, EC, 0, errMsg(SuperKlass, 'PRI'));
        $this->assertThrows(function(){                   sk  ('')->PRO->__invoke(); }, EC, 0, errMsg(SuperKlass, 'PRO'));
        $this->assertSame(SuperSuperKlass      . '::PUB', sk  ('')->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   k   ('')->PRI->__invoke(); }, EC, 0, errMsg(Klass, 'PRI'));
        $this->assertThrows(function(){                   k   ('')->PRO->__invoke(); }, EC, 0, errMsg(Klass, 'PRO'));
        $this->assertSame(Klass                . '::PUB', k   ('')->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ck  ('')->PRI->__invoke(); }, EC, 0, errMsg(ChildKlass, 'PRI'));
        $this->assertThrows(function(){                   ck  ('')->PRO->__invoke(); }, EC, 0, errMsg(ChildKlass, 'PRO'));
        $this->assertSame(Klass                . '::PUB', ck  ('')->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   cck ('')->PRI->__invoke(); }, EC, 0, errMsg(ChildChildKlass, 'PRI'));
        $this->assertThrows(function(){                   cck ('')->PRO->__invoke(); }, EC, 0, errMsg(ChildChildKlass, 'PRO'));
        $this->assertSame(ChildChildKlass      . '::PUB', cck ('')->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ccck('')->PRI->__invoke(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRI'));
        $this->assertThrows(function(){                   ccck('')->PRO->__invoke(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRO'));
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck('')->PUB->__invoke());
    }
    
    function testReferencingFromOtherClasses(){
        $this->assertThrows(function(){                   sssk(DifferentClass)->PRI->__invoke(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'PRI', DifferentClass));
        $this->assertThrows(function(){                   sssk(DifferentClass)->PRO->__invoke(); }, EC, 0, errMsg(SuperSuperSuperKlass, 'PRO', DifferentClass));
        $this->assertSame(SuperSuperSuperKlass . '::PUB', sssk(DifferentClass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ssk (DifferentClass)->PRI->__invoke(); }, EC, 0, errMsg(SuperSuperKlass, 'PRI', DifferentClass));
        $this->assertThrows(function(){                   ssk (DifferentClass)->PRO->__invoke(); }, EC, 0, errMsg(SuperSuperKlass, 'PRO', DifferentClass));
        $this->assertSame(SuperSuperKlass      . '::PUB', ssk (DifferentClass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   sk  (DifferentClass)->PRI->__invoke(); }, EC, 0, errMsg(SuperKlass, 'PRI', DifferentClass));
        $this->assertThrows(function(){                   sk  (DifferentClass)->PRO->__invoke(); }, EC, 0, errMsg(SuperKlass, 'PRO', DifferentClass));
        $this->assertSame(SuperSuperKlass      . '::PUB', sk  (DifferentClass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   k   (DifferentClass)->PRI->__invoke(); }, EC, 0, errMsg(Klass, 'PRI', DifferentClass));
        $this->assertThrows(function(){                   k   (DifferentClass)->PRO->__invoke(); }, EC, 0, errMsg(Klass, 'PRO', DifferentClass));
        $this->assertSame(Klass                . '::PUB', k   (DifferentClass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ck  (DifferentClass)->PRI->__invoke(); }, EC, 0, errMsg(ChildKlass, 'PRI', DifferentClass));
        $this->assertThrows(function(){                   ck  (DifferentClass)->PRO->__invoke(); }, EC, 0, errMsg(ChildKlass, 'PRO', DifferentClass));
        $this->assertSame(Klass                . '::PUB', ck  (DifferentClass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   cck (DifferentClass)->PRI->__invoke(); }, EC, 0, errMsg(ChildChildKlass, 'PRI', DifferentClass));
        $this->assertThrows(function(){                   cck (DifferentClass)->PRO->__invoke(); }, EC, 0, errMsg(ChildChildKlass, 'PRO', DifferentClass));
        $this->assertSame(ChildChildKlass      . '::PUB', cck (DifferentClass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ccck(DifferentClass)->PRI->__invoke(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRI', DifferentClass));
        $this->assertThrows(function(){                   ccck(DifferentClass)->PRO->__invoke(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRO', DifferentClass));
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(DifferentClass)->PUB->__invoke());
    }
    
    function testReferencingFromHierarchyScopes(){
        $this->assertSame(SuperSuperSuperKlass . '::PRI', sssk(SuperSuperSuperKlass)->PRI->__invoke());
        $this->assertSame(SuperSuperSuperKlass . '::PRO', sssk(SuperSuperSuperKlass)->PRO->__invoke());
        $this->assertSame(SuperSuperSuperKlass . '::PUB', sssk(SuperSuperSuperKlass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertSame(SuperSuperSuperKlass . '::PRI', ssk (SuperSuperSuperKlass)->PRI->__invoke());
        $this->assertSame(SuperSuperKlass      . '::PRO', ssk (SuperSuperSuperKlass)->PRO->__invoke());
        $this->assertSame(SuperSuperKlass      . '::PUB', ssk (SuperSuperSuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(SuperSuperKlass      . '::PRI', ssk (SuperSuperKlass)->PRI->__invoke());
        $this->assertSame(SuperSuperKlass      . '::PRO', ssk (SuperSuperKlass)->PRO->__invoke());
        $this->assertSame(SuperSuperKlass      . '::PUB', ssk (SuperSuperKlass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertSame(SuperSuperSuperKlass . '::PRI', sk  (SuperSuperSuperKlass)->PRI->__invoke());
        $this->assertSame(SuperSuperKlass      . '::PRO', sk  (SuperSuperSuperKlass)->PRO->__invoke());
        $this->assertSame(SuperSuperKlass      . '::PUB', sk  (SuperSuperSuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(SuperSuperKlass      . '::PRI', sk  (SuperSuperKlass)->PRI->__invoke());
        $this->assertSame(SuperSuperKlass      . '::PRO', sk  (SuperSuperKlass)->PRO->__invoke());
        $this->assertSame(SuperSuperKlass      . '::PUB', sk  (SuperSuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   sk  (SuperKlass)->PRI->__invoke(); }, EC, 0, errMsg(SuperKlass, 'PRI', SuperKlass));
        $this->assertSame(SuperSuperKlass      . '::PRO', sk  (SuperKlass)->PRO->__invoke());
        $this->assertSame(SuperSuperKlass      . '::PUB', sk  (SuperKlass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertSame(SuperSuperSuperKlass . '::PRI', k   (SuperSuperSuperKlass)->PRI->__invoke());
        $this->assertSame(Klass                . '::PRO', k   (SuperSuperSuperKlass)->PRO->__invoke());
        $this->assertSame(Klass                . '::PUB', k   (SuperSuperSuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(SuperSuperKlass      . '::PRI', k   (SuperSuperKlass)->PRI->__invoke());
        $this->assertSame(Klass                . '::PRO', k   (SuperSuperKlass)->PRO->__invoke());
        $this->assertSame(Klass                . '::PUB', k   (SuperSuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   k   (SuperKlass)->PRI->__invoke(); }, EC, 0, errMsg(Klass, 'PRI', SuperKlass));
        $this->assertSame(Klass                . '::PRO', k   (SuperKlass)->PRO->__invoke());
        $this->assertSame(Klass                . '::PUB', k   (SuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(Klass                . '::PRI', k   (Klass)->PRI->__invoke());
        $this->assertSame(Klass                . '::PRO', k   (Klass)->PRO->__invoke());
        $this->assertSame(Klass                . '::PUB', k   (Klass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertSame(SuperSuperSuperKlass . '::PRI', ck  (SuperSuperSuperKlass)->PRI->__invoke());
        $this->assertSame(Klass                . '::PRO', ck  (SuperSuperSuperKlass)->PRO->__invoke());
        $this->assertSame(Klass                . '::PUB', ck  (SuperSuperSuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(SuperSuperKlass      . '::PRI', ck  (SuperSuperKlass)->PRI->__invoke());
        $this->assertSame(Klass                . '::PRO', ck  (SuperSuperKlass)->PRO->__invoke());
        $this->assertSame(Klass                . '::PUB', ck  (SuperSuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   ck  (SuperKlass)->PRI->__invoke(); }, EC, 0, errMsg(ChildKlass, 'PRI', SuperKlass));
        $this->assertSame(Klass                . '::PRO', ck  (SuperKlass)->PRO->__invoke());
        $this->assertSame(Klass                . '::PUB', ck  (SuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(Klass                . '::PRI', ck  (Klass)->PRI->__invoke());
        $this->assertSame(Klass                . '::PRO', ck  (Klass)->PRO->__invoke());
        $this->assertSame(Klass                . '::PUB', ck  (Klass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   ck  (ChildKlass)->PRI->__invoke(); }, EC, 0, errMsg(ChildKlass, 'PRI', ChildKlass));
        $this->assertSame(Klass                . '::PRO', ck  (ChildKlass)->PRO->__invoke());
        $this->assertSame(Klass                . '::PUB', ck  (ChildKlass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertSame(SuperSuperSuperKlass . '::PRI', cck (SuperSuperSuperKlass)->PRI->__invoke());
        $this->assertSame(ChildChildKlass      . '::PRO', cck (SuperSuperSuperKlass)->PRO->__invoke());
        $this->assertSame(ChildChildKlass      . '::PUB', cck (SuperSuperSuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(SuperSuperKlass      . '::PRI', cck (SuperSuperKlass)->PRI->__invoke());
        $this->assertSame(ChildChildKlass      . '::PRO', cck (SuperSuperKlass)->PRO->__invoke());
        $this->assertSame(ChildChildKlass      . '::PUB', cck (SuperSuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   cck (SuperKlass)->PRI->__invoke(); }, EC, 0, errMsg(ChildChildKlass, 'PRI', SuperKlass));
        $this->assertSame(ChildChildKlass      . '::PRO', cck (SuperKlass)->PRO->__invoke());
        $this->assertSame(ChildChildKlass      . '::PUB', cck (SuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(Klass                . '::PRI', cck (Klass)->PRI->__invoke());
        $this->assertSame(ChildChildKlass      . '::PRO', cck (Klass)->PRO->__invoke());
        $this->assertSame(ChildChildKlass      . '::PUB', cck (Klass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   cck (ChildKlass)->PRI->__invoke(); }, EC, 0, errMsg(ChildChildKlass, 'PRI', ChildKlass));
        $this->assertSame(ChildChildKlass      . '::PRO', cck (ChildKlass)->PRO->__invoke());
        $this->assertSame(ChildChildKlass      . '::PUB', cck (ChildKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(ChildChildKlass      . '::PRI', cck (ChildChildKlass)->PRI->__invoke());
        $this->assertSame(ChildChildKlass      . '::PRO', cck (ChildChildKlass)->PRO->__invoke());
        $this->assertSame(ChildChildKlass      . '::PUB', cck (ChildChildKlass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertSame(SuperSuperSuperKlass . '::PRI', ccck(SuperSuperSuperKlass)->PRI->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(SuperSuperSuperKlass)->PRO->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(SuperSuperSuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(SuperSuperKlass      . '::PRI', ccck(SuperSuperKlass)->PRI->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(SuperSuperKlass)->PRO->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(SuperSuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   ccck(SuperKlass)->PRI->__invoke(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRI', SuperKlass));
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(SuperKlass)->PRO->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(SuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(Klass                . '::PRI', ccck(Klass)->PRI->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(Klass)->PRO->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(Klass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   ccck(ChildKlass)->PRI->__invoke(); }, EC, 0, errMsg(ChildChildChildKlass, 'PRI', ChildKlass));
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(ChildKlass)->PRO->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(ChildKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(ChildChildKlass      . '::PRI', ccck(ChildChildKlass)->PRI->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(ChildChildKlass)->PRO->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(ChildChildKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(ChildChildChildKlass . '::PRI', ccck(ChildChildChildKlass)->PRI->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(ChildChildChildKlass)->PRO->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(ChildChildChildKlass)->PUB->__invoke());
    }

    function testReferencingNonexistingMethodFromOuterScopes(){
        $this->assertThrows(function(){ sssk('')->WAT; }, EC, 0, errMsg(SuperSuperSuperKlass, 'WAT'));
        $this->assertThrows(function(){ ssk ('')->WAT; }, EC, 0, errMsg(SuperSuperKlass, 'WAT'));
        $this->assertThrows(function(){ sk  ('')->WAT; }, EC, 0, errMsg(SuperKlass, 'WAT'));
        $this->assertThrows(function(){ k   ('')->WAT; }, EC, 0, errMsg(Klass, 'WAT'));
        $this->assertThrows(function(){ ck  ('')->WAT; }, EC, 0, errMsg(ChildKlass, 'WAT'));
        $this->assertThrows(function(){ cck ('')->WAT; }, EC, 0, errMsg(ChildChildKlass, 'WAT'));
        $this->assertThrows(function(){ ccck('')->WAT; }, EC, 0, errMsg(ChildChildChildKlass, 'WAT'));
    }

    function testReferencingNonexistingMethodFromWithinHierarchy(){
        $this->assertThrows(function(){ sssk(SuperSuperSuperKlass)->WAT; }, EC, 0, errMsg(SuperSuperSuperKlass, 'WAT', SuperSuperSuperKlass));
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ ssk (SuperSuperSuperKlass)->WAT; }, EC, 0, errMsg(SuperSuperKlass, 'WAT', SuperSuperSuperKlass));
        $this->assertThrows(function(){ ssk (SuperSuperKlass)->WAT; }, EC, 0, errMsg(SuperSuperKlass, 'WAT', SuperSuperKlass));
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ sk  (SuperSuperSuperKlass)->WAT; }, EC, 0, errMsg(SuperKlass, 'WAT', SuperSuperSuperKlass));
        $this->assertThrows(function(){ sk  (SuperSuperKlass)->WAT; }, EC, 0, errMsg(SuperKlass, 'WAT', SuperSuperKlass));
        $this->assertThrows(function(){ sk  (SuperKlass)->WAT; }, EC, 0, errMsg(SuperKlass, 'WAT', SuperKlass));
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ k   (SuperSuperSuperKlass)->WAT; }, EC, 0, errMsg(Klass, 'WAT', SuperSuperSuperKlass));
        $this->assertThrows(function(){ k   (SuperSuperKlass)->WAT; }, EC, 0, errMsg(Klass, 'WAT', SuperSuperKlass));
        $this->assertThrows(function(){ k   (SuperKlass)->WAT; }, EC, 0, errMsg(Klass, 'WAT', SuperKlass));
        $this->assertThrows(function(){ k   (Klass)->WAT; }, EC, 0, errMsg(Klass, 'WAT', Klass));
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ ck  (SuperSuperSuperKlass)->WAT; }, EC, 0, errMsg(ChildKlass, 'WAT', SuperSuperSuperKlass));
        $this->assertThrows(function(){ ck  (SuperSuperKlass)->WAT; }, EC, 0, errMsg(ChildKlass, 'WAT', SuperSuperKlass));
        $this->assertThrows(function(){ ck  (SuperKlass)->WAT; }, EC, 0, errMsg(ChildKlass, 'WAT', SuperKlass));
        $this->assertThrows(function(){ ck  (Klass)->WAT; }, EC, 0, errMsg(ChildKlass, 'WAT', Klass));
        $this->assertThrows(function(){ ck  (ChildKlass)->WAT; }, EC, 0, errMsg(ChildKlass, 'WAT', ChildKlass));
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ cck (SuperSuperSuperKlass)->WAT; }, EC, 0, errMsg(ChildChildKlass, 'WAT', SuperSuperSuperKlass));
        $this->assertThrows(function(){ cck (SuperSuperKlass)->WAT; }, EC, 0, errMsg(ChildChildKlass, 'WAT', SuperSuperKlass));
        $this->assertThrows(function(){ cck (SuperKlass)->WAT; }, EC, 0, errMsg(ChildChildKlass, 'WAT', SuperKlass));
        $this->assertThrows(function(){ cck (Klass)->WAT; }, EC, 0, errMsg(ChildChildKlass, 'WAT', Klass));
        $this->assertThrows(function(){ cck (ChildKlass)->WAT; }, EC, 0, errMsg(ChildChildKlass, 'WAT', ChildKlass));
        $this->assertThrows(function(){ cck (ChildChildKlass)->WAT; }, EC, 0, errMsg(ChildChildKlass, 'WAT', ChildChildKlass));
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ ccck(SuperSuperSuperKlass)->WAT; }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', SuperSuperSuperKlass));
        $this->assertThrows(function(){ ccck(SuperSuperKlass)->WAT; }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', SuperSuperKlass));
        $this->assertThrows(function(){ ccck(SuperKlass)->WAT; }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', SuperKlass));
        $this->assertThrows(function(){ ccck(Klass)->WAT; }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', Klass));
        $this->assertThrows(function(){ ccck(ChildKlass)->WAT; }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', ChildKlass));
        $this->assertThrows(function(){ ccck(ChildChildKlass)->WAT; }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', ChildChildKlass));
        $this->assertThrows(function(){ ccck(ChildChildChildKlass)->WAT; }, EC, 0, errMsg(ChildChildChildKlass, 'WAT', ChildChildChildKlass));
    }
}
