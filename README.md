# functional-programming-utils [![Build Status](https://travis-ci.org/daveross/functional-programming-utils.svg?branch=master)](https://travis-ci.org/daveross/functional-programming-utils)
Functional Programming utilities for PHP 5.4+

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
$x = DaveRoss\FunctionalProgrammingUtils\truthy( true ); // true
$x = DaveRoss\FunctionalProgrammingUtils\truthy( 5 ); // false
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
$f = memoize(function($a) { return $a; });
$x = $f(5); // 5
$x = $f(5); // 5 again, but the function didn't need to be called again
```

### curry

### compose

### Functors

## Release History

 * 2015-08-18   v1.0.0   Initial release