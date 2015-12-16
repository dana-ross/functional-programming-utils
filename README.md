# PHP Functional Programming Utils
[![Latest Stable Version](https://poser.pugx.org/daveross/functional-programming-utils/v/stable)](https://packagist.org/packages/daveross/functional-programming-utils) [![Total Downloads](https://poser.pugx.org/daveross/functional-programming-utils/downloads)](https://packagist.org/packages/daveross/functional-programming-utils) [![Latest Unstable Version](https://poser.pugx.org/daveross/functional-programming-utils/v/unstable)](https://packagist.org/packages/daveross/functional-programming-utils) [![License](https://poser.pugx.org/daveross/functional-programming-utils/license)](https://packagist.org/packages/daveross/functional-programming-utils) [![Build Status](https://travis-ci.org/daveross/functional-programming-utils.svg?branch=master)](https://travis-ci.org/daveross/functional-programming-utils)

Functional Programming utilities for PHP 5.4+

## Table of Contents

  * [Installation](#installation)
    + [Using composer](#using-composer)
    + [Manually](#manually)
  * [License](#license)
  * [Contributing](#contributing)
  * [Further reading & suggested viewing](#further-reading---suggested-viewing)
    + [Simon Holywell's *Functional PHP* talk at PHP Hampshire Feb 2014](#simon-holywell-s--functional-php--talk-at-php-hampshire-feb-2014)
  * [A note for PHP 5.6+ users](#a-note-for-php-56--users)
  * [Features](#features)
    + [Mathematical functions](#mathematical-functions)
    + [Property Access](#property-access)
    + [Memoization](#memoization)
    + [Currying](#currying)
    + [Composition](#composition)
    + [Functors](#functors)
  * [Release History](#release-history)

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

Include all the files in the `src` directory, or individual files as needed:

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

[Buy me a coffee](https://cash.me/$daveross/5)

## Contributing

Pull requests are welcome. Unit tests are encouraged but not required.

## Further reading & suggested viewing
* [Professor Frisby's Mostly Adequate Guide to Functional Programming](http://drboolean.gitbooks.io/mostly-adequate-guide/)
* [Functional Programming in PHP](http://www.functionalphp.com)
* [Learn You a Haskell for Great Good](http://learnyouahaskell.com) to see how a language built for Functional Programming works

### Simon Holywell's *Functional PHP* talk at PHP Hampshire Feb 2014
[![PHP Hampshire Feb 2014: Functional PHP](http://img.youtube.com/vi/4t5EKEZz724/0.jpg)](https://www.youtube.com/watch?v=4t5EKEZz724)

## A note for PHP 5.6+ users

Starting in PHP 5.6, you can ```use function``` at the top of a file to reference that function without typing its whole name, including the namespace. I encourage you to try it.

```php
use function DaveRoss\FunctionalProgrammingUtils\add as add;
$x = add( 5, 5 ); // 10
```

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

#### false
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

See [
Curry or Partial Application?
The Difference Between
Partial Application and Curry](https://medium.com/javascript-scene/curry-or-partial-application-8150044c78b8#.vwmrlqe5x) for details on how these functions differ.

#### partially_apply
*Partially applies* a function. Given a function that takes more than one parameter, returns a function that already
knows the *first* parameter.

```php
$add_five = DaveRoss\FunctionalProgrammingUtils\partially_apply( 'DaveRoss\FunctionalProgrammingUtils\add', 5 );
$x = $add_five( 5 ); // 10
```

#### partially_apply_right
*Partially applies* a function. Given a function that takes more than one parameter, returns a function that already
knows the *last* parameter.

```php
$divide_by_five = DaveRoss\FunctionalProgrammingUtils\partially_apply_right( 'DaveRoss\FunctionalProgrammingUtils\divide', 5 );
$x = $divide_by_five( 25 ); // 5
```

#### curry
*Curries* a function. Given a function that takes more than one parameter, applies a single parameter to it and returns a function that takes the *next* parameter until all required parameters are provided.

```php
  function add_three_integers($a, $b, $c) {
  		return intval( $a ) + intval( $b ) + intval( $c );
  }

  $fn = DaveRoss\FunctionalProgrammingUtils\curry( 'add_three_integers' , 1 );
  $fn2 = $fn( 2 );
  $x = $fn2( 3 ); // 6
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

#### maybe function
May be used to extract the value from a Maybe Functor.

```php
$x = new Maybe( 5 );
$y = maybe(null, function( $a ) { return $a * 5; }, $x); // 25
```

#### Either
To implement conditionals, a function can be defined as returning *either* one value or another. This is represented with the Either Functor and its children, ```Left``` and ```Right```.

##### Left
The Left Functor wraps an error value from an unsuccessful function call.

```php
$f = function($a) {
	return ( $a < 10 ) : Left::of( 'too low' ) : Right::of( $a + 1 );
}

$x = $f( 15 ); // Right( 16 )
$y = $f( 5 ); // Left( "too low" )
```

##### Right
The Right Functor wraps the result of a successful function call.

```php
$f = function($a) {
	return ( $a < 10 ) : Left::of( 'too low' ) : Right::of( $a + 1 );
}

$x = $f( 15 ); // Right( 16 )
$y = $f( 5 ); // Left( "too low" )
```

#### either function
May be used to extract the value from either a Left Functor or a Right Functor.

```php
$x = Left::of( 5 );
$y = Right::of( 7 );

$left_handler = function( $a ) { return $a * 2; };
$right_handler = function( $a ) { return $a * 3; };

$a = either($left_handler, $right_handler, $x); // 10
$b = either($left_handler, $right_handler, $y); // 21
```

## Release History

 * 2015-08-18   v1.0.0   Initial release
