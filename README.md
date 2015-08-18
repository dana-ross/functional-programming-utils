# functional-programming-utils
[![Latest Stable Version](https://poser.pugx.org/daveross/functional-programming-utils/v/stable)](https://packagist.org/packages/daveross/functional-programming-utils) [![Total Downloads](https://poser.pugx.org/daveross/functional-programming-utils/downloads)](https://packagist.org/packages/daveross/functional-programming-utils) [![Latest Unstable Version](https://poser.pugx.org/daveross/functional-programming-utils/v/unstable)](https://packagist.org/packages/daveross/functional-programming-utils) [![License](https://poser.pugx.org/daveross/functional-programming-utils/license)](https://packagist.org/packages/daveross/functional-programming-utils) [![Build Status](https://travis-ci.org/daveross/functional-programming-utils.svg?branch=master)](https://travis-ci.org/daveross/functional-programming-utils)

Functional Programming utilities for PHP 5.4+

## Installation

### Using composer

Put the require statement for `functional-programming-utils` in your `composer.json` file and run `composer install` or `php composer.phar install`:

```json
{
    "require": {
        "daveross/functional-programming-utils": "~1.0"
    }
}
```

### Manually

Include all the files in the `src` directory, or individual files as needed

```php
<?php
include 'path/to/functional-programming-utils/src/compose.php';
include 'path/to/functional-programming-utils/src/curry.php';
include 'path/to/functional-programming-utils/src/Functor.php';
include 'path/to/functional-programming-utils/src/math.php';
include 'path/to/functional-programming-utils/src/memoize.php';
include 'path/to/functional-programming-utils/src/prop.php';
```

## License

[MIT](http://daveross.mit-license.org)

See [why I contribute to open source software](https://davidmichaelross.com/blog/contribute-open-source-software/).

## Contributing

Pull requests are welcome. Unit tests are encouraged but not required.

## Features

### Mathematical functions

#### add
Adds two values

```php
$x = DaveRoss\FunctionalProgrammingUtils\add( 5, 5 ); // 10
```
#### subtract
Subtracts two values

```php
$x = DaveRoss\FunctionalProgrammingUtils\subtract( 10, 5 ); // 5
```
#### multiply
Multiplies two numbers

```php
$x = DaveRoss\FunctionalProgrammingUtils\multiply( 5, 5 ); // 25
```

#### divide
Divides two numbers

```php
$x = DaveRoss\FunctionalProgrammingUtils\divide( 25, 5 ); // 5
```

#### modulus
Computes the remainder after division

```php
$x = DaveRoss\FunctionalProgrammingUtils\modulus( 13, 5 ); // 3
```

#### inverse
Inverts a number

```php
$x = DaveRoss\FunctionalProgrammingUtils\inverse( 5 ); // -5
```

#### truthy
Checks if a value evaluates to ```true``` using standard PHP rules

```php
$x = DaveRoss\FunctionalProgrammingUtils\truthy( 5 ); // true
$x = DaveRoss\FunctionalProgrammingUtils\truthy( 0 ); // false
```

#### true
Checks if a value is boolean true

```php
$x = DaveRoss\FunctionalProgrammingUtils\true( true ); // true
$x = DaveRoss\FunctionalProgrammingUtils\true( 5 ); // false
```

#### falsy
Checks if a value evaluates to ```false``` using standard PHP rules

```php
$x = DaveRoss\FunctionalProgrammingUtils\falsy( 0 ); // true
$x = DaveRoss\FunctionalProgrammingUtils\falsy( 5 ); // false
```

#### true
Checks if a value is boolean false

```php
$x = DaveRoss\FunctionalProgrammingUtils\false( false ); // true
$x = DaveRoss\FunctionalProgrammingUtils\false( 0 ); // false
```

#### default_value
Returns a value, or a default if the value is null

```php
$x = DaveRoss\FunctionalProgrammingUtils\default_value( 5, 10); // 10
$x = DaveRoss\FunctionalProgrammingUtils\default_value( 5, null); // 5
```

### Property Access
 
#### array_prop
Returns a value from an array given the corresponding key, or null if the key doesn't exist in the array

```php
$a = array( 'hello' => 'world', 'a' => 'b' );
$x = DaveRoss\FunctionalProgrammingUtils\array_prop( $a, 'hello'); // 'world'
$x = DaveRoss\FunctionalProgrammingUtils\array_prop( $a, 'test'); // null
```

#### object_prop
Returns a value from an object given the corresponding property name, or null if the property doesn't exist in the object

```php
$o = new stdClass();
$o->hello = 'world';
$o->a = 'b';
$x = DaveRoss\FunctionalProgrammingUtils\object_prop( $o, 'hello'); // 'world'
$x = DaveRoss\FunctionalProgrammingUtils\object_prop( $o, 'test'); // null
```

#### prop
Calls ```array_prop``` or ```object_prop``` as appropriate

```php
$a = array( 'hello' => 'world', 'a' => 'b' );

$x = DaveRoss\FunctionalProgrammingUtils\prop( $a, 'hello'); // 'world'
$x = DaveRoss\FunctionalProgrammingUtils\prop( $a, 'test'); // null

$o = new stdClass();
$o->hello = 'world';
$o->a = 'b';

$x = DaveRoss\FunctionalProgrammingUtils\prop( $o, 'hello'); // 'world'
$x = DaveRoss\FunctionalProgrammingUtils\prop( $o, 'test'); // null
```

### Memoization

#### memoize
Wraps a function in a layer that stores the function's return value for every set of parameters it's called with, so the function
doesn't need to be called again the next time it's called with the same parameters

```php
$f = DaveRoss\FunctionalProgrammingUtils\memoize(function($a) { return $a; });
$x = $f(5); // 5
$x = $f(5); // 5 again, but the function didn't need to be called a second time
```

### Currying

#### curry
*Partially applies* a function. Given a function that takes more than one parameter, returns a function that already
knows the *first* parameter.

```php
$add_five = DaveRoss\FunctionalProgrammingUtils\curry( 'DaveRoss\FunctionalProgrammingUtils\add', 5 );
$x = $add_five( 5 ); // 10
```

#### curry_right
*Partially applies* a function. Given a function that takes more than one parameter, returns a function that already
knows the *last* parameter.

```php
$divide_by_five = DaveRoss\FunctionalProgrammingUtils\curry_right( 'DaveRoss\FunctionalProgrammingUtils\divide', 5 );
$x = $divide_by_five( 25 ); // 5
```

### Composition

#### compose
Creates a new function consisting of a series of functions that each take one parameter. When the new function is
called, that series of functions is called from right to left, processing the result of the previous function.  

```php
$backwards_and_uppercase = DaveRoss\FunctionalProgrammingUtils\compose( 'str_reverse', 'strtoupper' );
$x = $backwards_and_uppercase( 'dlrow olleh' ); // HELLO WORLD
```

### Functors

#### Functor
Abstract parent class for Functors. A Functor is a class that wraps a single value and implements `function map(callable $f)`.
Functor::map() returns another Functor wrapping the function's return value. See the ```Just``` Functor. 

#### Just
The ```Just``` Functor "just" wraps a value and maps functions to it.

```php
$x = new Just( 5 );
$y = $x->map( function( $a ) { return $a * 5; } ); // Just(25)
```

#### Maybe
The Maybe Functor recognizes when it's holding a ```null``` value and returns ```Maybe( null )``` when a function is mapped to it. Otherwise, it behaves like a Just Functor.

```php
$x = new Maybe( 5 );
$y = $x->map( function( $a ) { return $a * 5; } ); // Maybe(25)

$a = new Maybe( null );
$b = $a->map( function( $a ) { return $a * 5; } ); // Maybe(null)

```

#### Either

##### Left
##### Right

## Release History

 * 2015-08-18   v1.0.0   Initial release
