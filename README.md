# First Class Methods in PHP7

Work in progress.

```php
class Foo{
 use FirstClassMethods;
 function bar(string $foo){ return "bar! $foo"; }
}

$fooObj = new Foo;
$method = $fooObj->bar; // Gets a reference to the method `bar` bound to `$fooObj`
echo $method("yay!");   // Prints "bar! yay!"

assert($method->getThis() === $fooObj);
assert($method->getOwnerClass() === 'Foo');
assert($method->getName() === 'bar');
assert($method->getScopedName() === 'Foo::bar');
```
