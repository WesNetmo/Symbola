# Symbola

First class methods & more for PHP 7 (Experimental)

## Why use it?
- Always type-hint for `Closure` (and never `callable`, which has [strange semantics](https://wiki.php.net/rfc/consistent_callables))
- No need to hardcode method names as string; `[$this, 'method']` will simply be `$this->method`
- No need for special syntax for calling "`callable` fields": `($this->field)()` will simply be `$this->field()`

```php
/**
 * @method string foo()
 * @property string $bar
 */
class Something
{
    use Symbola;

    public $foo;

    function __construct(){
        $this->foo = function(){
            return "I'm foo!";
        };
    }

    function bar(){
        return "I'm bar!";
    }
}

$object = new Something;

echo $object->foo(); // Prints "I'm foo!"

$bar = $object->bar;
echo $bar(); // Prints "I'm bar!"
```

## Install through Composer:

```
composer require netmosfera/symbola
```
