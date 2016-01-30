<?php

namespace DaveRoss\FunctionalProgrammingUtils;

/**
 * Class Monad
 * Base class for Monads. Implements basic Monad functionality
 * @package DaveRoss\FunctionalProgrammingUtils
 */
abstract class Monad {

	protected $value;

	/**
	 * Allow Monad::map() to be called like a method
	 *
	 * @param callable $f
	 *
	 * @return mixed
	 */
	public function __invoke( $f ) {
		return $this->map( $f );
	}

	/**
	 * @param mixed $a
	 */
	private function __construct( $a ) {
		$this->value = $a;
	}

	/**
	 * Instantiate a new Monad wrapping a given value
	 *
	 * @param mixed $a
	 *
	 * @return Functor
	 */
	public static function of( $a ) {
		return new static( $a );
	}

	/**
	 * Apply a function to this Monad's value
	 *
	 * @param callable $f
	 *
	 * @return Monad
	 */
	public function map( callable $f ) {
		$class_name = get_called_class();

		return new $class_name( $f( $this->value ) );
	}

	/**
	 * Get this Functor's value without wrapping it.
	 * @return mixed
	 */
	public function value() {
		return $this->value;
	}

}

/**
 * Class Just
 * The most basic Monad just holds a value and allows functions to be mapped to it
 * @package DaveRoss\FunctionalProgrammingUtils
 */
class Just extends Monad {
}

/**
 * Class Maybe
 * @package DaveRoss\FunctionalProgrammingUtils
 */
class Maybe extends Monad {

	/**
	 * Apply a function to this Monad's value only if the value is not null
	 *
	 * @param callable $f
	 *
	 * @return Maybe
	 */
	public function map( callable $f ) {
		return ( $this->isNothing() ) ? Maybe::of( null ) : Maybe::of( $f( $this->value ) );
	}

	public function isNothing() {
		return ( null == $this->value );
	}

}

/**
 * Helper function to apply a function to a Maybe that is not Maybe(null). Returns the value directly rather
 * than wrapping it in another Maybe.
 *
 * @param mixed    $x default value
 * @param callable $f function to apply to a non-empty Maybe's value
 * @param Maybe    $m the Maybe to run the function against if the Maybe is not Maybe(null)
 *
 * @return mixed
 */
function maybe( $x, callable $f, Maybe $m ) {
	return ( $m->isNothing() ) ? $x : $f( $m->value() );
}

/**
 * Class Either
 * Base class for an Either Monad
 * @package DaveRoss\FunctionalProgrammingUtils
 */
abstract class Either extends Monad {
}

/**
 * Class Left
 * Left Monad. Represents a failure or error state.
 * @package DaveRoss\FunctionalProgrammingUtils
 */
class Left extends Either {

	/**
	 * Return $this without applying the passed function
	 *
	 * @param callable $f
	 *
	 * @return Functor
	 */
	public function map( callable $f ) {
		return $this;
	}

}

/**
 * Class Right
 * Right Monad. Represents a success state. Acts like a normal Monad.
 * @package DaveRoss\FunctionalProgrammingUtils
 */
class Right extends Either {
}

/**
 * Helper function to apply one of a pair of function to Either a Left or Right . Returns the value directly rather
 * than wrapping it in another Either.
 *
 * @param callable $f function to apply if $e is a Left
 * @param callable $g function to apply if $e is a Right
 * @param Either   $e
 *
 * @return mixed
 */
function either( callable $f, callable $g, Either $e ) {

	switch ( get_class( $e ) ) {
		case 'DaveRoss\FunctionalProgrammingUtils\Left':
			return $f( $e->value() );
		case 'DaveRoss\FunctionalProgrammingUtils\Right':
			return $g( $e->value() );
	}

}