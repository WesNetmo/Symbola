<?php

use Netmosfera\FCMTests\PHPUnit;

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

require(__DIR__ . '/SampleHierarchy.php');

//[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]

class FCMTest extends PHPUnit
{
    function testReferencingFromNonClassScopes(){
        $this->assertThrows(function(){                   sssk('')->PRI->__invoke(); }, Error, 0, 'Cannot access private method `SuperSuperSuperKlass::$PRI`.');
        $this->assertThrows(function(){                   sssk('')->PRO->__invoke(); }, Error, 0, 'Cannot access protected method `SuperSuperSuperKlass::$PRO`.');
        $this->assertSame(SuperSuperSuperKlass . '::PUB', sssk('')->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ssk ('')->PRI->__invoke(); }, Error, 0, 'Cannot access private method `SuperSuperKlass::$PRI`.');
        $this->assertThrows(function(){                   ssk ('')->PRO->__invoke(); }, Error, 0, 'Cannot access protected method `SuperSuperKlass::$PRO`.');
        $this->assertSame(SuperSuperKlass      . '::PUB', ssk ('')->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   sk  ('')->PRI->__invoke(); }, Error, 0, 'Cannot access private method `SuperSuperKlass::$PRI`.');
        $this->assertThrows(function(){                   sk  ('')->PRO->__invoke(); }, Error, 0, 'Cannot access protected method `SuperSuperKlass::$PRO`.');
        $this->assertSame(SuperSuperKlass      . '::PUB', sk  ('')->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   k   ('')->PRI->__invoke(); }, Error, 0, 'Cannot access private method `Klass::$PRI`.');
        $this->assertThrows(function(){                   k   ('')->PRO->__invoke(); }, Error, 0, 'Cannot access protected method `Klass::$PRO`.');
        $this->assertSame(Klass                . '::PUB', k   ('')->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ck  ('')->PRI->__invoke(); }, Error, 0, 'Cannot access private method `Klass::$PRI`.');
        $this->assertThrows(function(){                   ck  ('')->PRO->__invoke(); }, Error, 0, 'Cannot access protected method `Klass::$PRO`.');
        $this->assertSame(Klass                . '::PUB', ck  ('')->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   cck ('')->PRI->__invoke(); }, Error, 0, 'Cannot access private method `ChildChildKlass::$PRI`.');
        $this->assertThrows(function(){                   cck ('')->PRO->__invoke(); }, Error, 0, 'Cannot access protected method `ChildChildKlass::$PRO`.');
        $this->assertSame(ChildChildKlass      . '::PUB', cck ('')->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ccck('')->PRI->__invoke(); }, Error, 0, 'Cannot access private method `ChildChildChildKlass::$PRI`.');
        $this->assertThrows(function(){                   ccck('')->PRO->__invoke(); }, Error, 0, 'Cannot access protected method `ChildChildChildKlass::$PRO`.');
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck('')->PUB->__invoke());
    }
    
    function testReferencingFromOtherClasses(){
        $this->assertThrows(function(){                   sssk(stdClass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `SuperSuperSuperKlass::$PRI` from context `stdClass`.');
        $this->assertThrows(function(){                   sssk(stdClass)->PRO->__invoke(); }, Error, 0, 'Cannot access protected method `SuperSuperSuperKlass::$PRO` from context `stdClass`.');
        $this->assertSame(SuperSuperSuperKlass . '::PUB', sssk(stdClass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ssk (stdClass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `SuperSuperKlass::$PRI` from context `stdClass`.');
        $this->assertThrows(function(){                   ssk (stdClass)->PRO->__invoke(); }, Error, 0, 'Cannot access protected method `SuperSuperKlass::$PRO` from context `stdClass`.');
        $this->assertSame(SuperSuperKlass      . '::PUB', ssk (stdClass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   sk  (stdClass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `SuperSuperKlass::$PRI` from context `stdClass`.');
        $this->assertThrows(function(){                   sk  (stdClass)->PRO->__invoke(); }, Error, 0, 'Cannot access protected method `SuperSuperKlass::$PRO` from context `stdClass`.');
        $this->assertSame(SuperSuperKlass      . '::PUB', sk  (stdClass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   k   (stdClass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `Klass::$PRI` from context `stdClass`.');
        $this->assertThrows(function(){                   k   (stdClass)->PRO->__invoke(); }, Error, 0, 'Cannot access protected method `Klass::$PRO` from context `stdClass`.');
        $this->assertSame(Klass                . '::PUB', k   (stdClass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ck  (stdClass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `Klass::$PRI` from context `stdClass`.');
        $this->assertThrows(function(){                   ck  (stdClass)->PRO->__invoke(); }, Error, 0, 'Cannot access protected method `Klass::$PRO` from context `stdClass`.');
        $this->assertSame(Klass                . '::PUB', ck  (stdClass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   cck (stdClass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `ChildChildKlass::$PRI` from context `stdClass`.');
        $this->assertThrows(function(){                   cck (stdClass)->PRO->__invoke(); }, Error, 0, 'Cannot access protected method `ChildChildKlass::$PRO` from context `stdClass`.');
        $this->assertSame(ChildChildKlass      . '::PUB', cck (stdClass)->PUB->__invoke());
        //[][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][][]
        $this->assertThrows(function(){                   ccck(stdClass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `ChildChildChildKlass::$PRI` from context `stdClass`.');
        $this->assertThrows(function(){                   ccck(stdClass)->PRO->__invoke(); }, Error, 0, 'Cannot access protected method `ChildChildChildKlass::$PRO` from context `stdClass`.');
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(stdClass)->PUB->__invoke());
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
        $this->assertThrows(function(){                   sk  (SuperKlass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `SuperSuperKlass::$PRI` from context `SuperKlass`.');
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
        $this->assertThrows(function(){                   k   (SuperKlass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `Klass::$PRI` from context `SuperKlass`.');
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
        $this->assertThrows(function(){                   ck  (SuperKlass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `Klass::$PRI` from context `SuperKlass`.');
        $this->assertSame(Klass                . '::PRO', ck  (SuperKlass)->PRO->__invoke());
        $this->assertSame(Klass                . '::PUB', ck  (SuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(Klass                . '::PRI', ck  (Klass)->PRI->__invoke());
        $this->assertSame(Klass                . '::PRO', ck  (Klass)->PRO->__invoke());
        $this->assertSame(Klass                . '::PUB', ck  (Klass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   ck  (ChildKlass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `Klass::$PRI` from context `ChildKlass`.');
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
        $this->assertThrows(function(){                   cck (SuperKlass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `ChildChildKlass::$PRI` from context `SuperKlass`.');
        $this->assertSame(ChildChildKlass      . '::PRO', cck (SuperKlass)->PRO->__invoke());
        $this->assertSame(ChildChildKlass      . '::PUB', cck (SuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(Klass                . '::PRI', cck (Klass)->PRI->__invoke());
        $this->assertSame(ChildChildKlass      . '::PRO', cck (Klass)->PRO->__invoke());
        $this->assertSame(ChildChildKlass      . '::PUB', cck (Klass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   cck (ChildKlass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `ChildChildKlass::$PRI` from context `ChildKlass`.');
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
        $this->assertThrows(function(){                   ccck(SuperKlass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `ChildChildChildKlass::$PRI` from context `SuperKlass`.');
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(SuperKlass)->PRO->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(SuperKlass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertSame(Klass                . '::PRI', ccck(Klass)->PRI->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PRO', ccck(Klass)->PRO->__invoke());
        $this->assertSame(ChildChildChildKlass . '::PUB', ccck(Klass)->PUB->__invoke());
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){                   ccck(ChildKlass)->PRI->__invoke(); }, Error, 0, 'Cannot access private method `ChildChildChildKlass::$PRI` from context `ChildKlass`.');
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
        $this->assertThrows(function(){ sssk('')->WAT; }, Error, 0, 'Undefined property: `SuperSuperSuperKlass::$WAT`.');
        $this->assertThrows(function(){ ssk ('')->WAT; }, Error, 0, 'Undefined property: `SuperSuperKlass::$WAT`.');
        $this->assertThrows(function(){ sk  ('')->WAT; }, Error, 0, 'Undefined property: `SuperKlass::$WAT`.');
        $this->assertThrows(function(){ k   ('')->WAT; }, Error, 0, 'Undefined property: `Klass::$WAT`.');
        $this->assertThrows(function(){ ck  ('')->WAT; }, Error, 0, 'Undefined property: `ChildKlass::$WAT`.');
        $this->assertThrows(function(){ cck ('')->WAT; }, Error, 0, 'Undefined property: `ChildChildKlass::$WAT`.');
        $this->assertThrows(function(){ ccck('')->WAT; }, Error, 0, 'Undefined property: `ChildChildChildKlass::$WAT`.');
    }

    function testReferencingNonexistingMethodFromWithinHierarchy(){
        $this->assertThrows(function(){ sssk(SuperSuperSuperKlass)->WAT; }, Error, 0, 'Undefined property: `SuperSuperSuperKlass::$WAT`.');
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ ssk (SuperSuperSuperKlass)->WAT; }, Error, 0, 'Undefined property: `SuperSuperKlass::$WAT`.');
        $this->assertThrows(function(){ ssk (SuperSuperKlass)->WAT; }, Error, 0, 'Undefined property: `SuperSuperKlass::$WAT`.');
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ sk  (SuperSuperSuperKlass)->WAT; }, Error, 0, 'Undefined property: `SuperKlass::$WAT`.');
        $this->assertThrows(function(){ sk  (SuperSuperKlass)->WAT; }, Error, 0, 'Undefined property: `SuperKlass::$WAT`.');
        $this->assertThrows(function(){ sk  (SuperKlass)->WAT; }, Error, 0, 'Undefined property: `SuperKlass::$WAT`.');
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ k   (SuperSuperSuperKlass)->WAT; }, Error, 0, 'Undefined property: `Klass::$WAT`.');
        $this->assertThrows(function(){ k   (SuperSuperKlass)->WAT; }, Error, 0, 'Undefined property: `Klass::$WAT`.');
        $this->assertThrows(function(){ k   (SuperKlass)->WAT; }, Error, 0, 'Undefined property: `Klass::$WAT`.');
        $this->assertThrows(function(){ k   (Klass)->WAT; }, Error, 0, 'Undefined property: `Klass::$WAT`.');
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ ck  (SuperSuperSuperKlass)->WAT; }, Error, 0, 'Undefined property: `ChildKlass::$WAT`.');
        $this->assertThrows(function(){ ck  (SuperSuperKlass)->WAT; }, Error, 0, 'Undefined property: `ChildKlass::$WAT`.');
        $this->assertThrows(function(){ ck  (SuperKlass)->WAT; }, Error, 0, 'Undefined property: `ChildKlass::$WAT`.');
        $this->assertThrows(function(){ ck  (Klass)->WAT; }, Error, 0, 'Undefined property: `ChildKlass::$WAT`.');
        $this->assertThrows(function(){ ck  (ChildKlass)->WAT; }, Error, 0, 'Undefined property: `ChildKlass::$WAT`.');
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ cck (SuperSuperSuperKlass)->WAT; }, Error, 0, 'Undefined property: `ChildChildKlass::$WAT`.');
        $this->assertThrows(function(){ cck (SuperSuperKlass)->WAT; }, Error, 0, 'Undefined property: `ChildChildKlass::$WAT`.');
        $this->assertThrows(function(){ cck (SuperKlass)->WAT; }, Error, 0, 'Undefined property: `ChildChildKlass::$WAT`.');
        $this->assertThrows(function(){ cck (Klass)->WAT; }, Error, 0, 'Undefined property: `ChildChildKlass::$WAT`.');
        $this->assertThrows(function(){ cck (ChildKlass)->WAT; }, Error, 0, 'Undefined property: `ChildChildKlass::$WAT`.');
        $this->assertThrows(function(){ cck (ChildChildKlass)->WAT; }, Error, 0, 'Undefined property: `ChildChildKlass::$WAT`.');
        //----------------------------------------------------------------------------------
        $this->assertThrows(function(){ ccck(SuperSuperSuperKlass)->WAT; }, Error, 0, 'Undefined property: `ChildChildChildKlass::$WAT`.');
        $this->assertThrows(function(){ ccck(SuperSuperKlass)->WAT; }, Error, 0, 'Undefined property: `ChildChildChildKlass::$WAT`.');
        $this->assertThrows(function(){ ccck(SuperKlass)->WAT; }, Error, 0, 'Undefined property: `ChildChildChildKlass::$WAT`.');
        $this->assertThrows(function(){ ccck(Klass)->WAT; }, Error, 0, 'Undefined property: `ChildChildChildKlass::$WAT`.');
        $this->assertThrows(function(){ ccck(ChildKlass)->WAT; }, Error, 0, 'Undefined property: `ChildChildChildKlass::$WAT`.');
        $this->assertThrows(function(){ ccck(ChildChildKlass)->WAT; }, Error, 0, 'Undefined property: `ChildChildChildKlass::$WAT`.');
        $this->assertThrows(function(){ ccck(ChildChildChildKlass)->WAT; }, Error, 0, 'Undefined property: `ChildChildChildKlass::$WAT`.');
    }

    function testThingsWillAnnoyCertainPeople(){
        $this->assertThrows(function(){ k('')->baz = 0; }, Error, 0, 'Cannot set the undeclared property `Klass::$baz`.');
        $this->assertThrows(function(){ unset(k('')->baz); }, Error, 0, 'Cannot unset the undeclared property `Klass::$baz`.');
    }
}
