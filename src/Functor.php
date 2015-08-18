<?php

namespace DaveRoss\FunctionalProgrammingUtils;

/**
 * Class Functor
 * Base class for Functors. Implements basic Functor functionality
 * @package DaveRoss\FunctionalProgrammingUtils
 */
abstract class Functor {

	protected $value;

	/**
	 * Allow the Functor to be called like a function
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
	 * Instantiate a new Functor wrapping a given value
	 *
	 * @param mixed $a
	 *
	 * @return Functor
	 */
	public static function of( $a ) {
		return new static( $a );
	}

	/**
	 * Apply a function to this Functor's value
	 *
	 * @param callable $f
	 *
	 * @return Functor
	 */
	public function map( callable $f ) {
		$class_name = get_called_class();

		return new $class_name( $f( $this->value ) );
	}

}

/**
 * Class Maybe
 * @package DaveRoss\FunctionalProgrammingUtils
 */
class Maybe extends Functor {

	/**
	 * Apply a function to this Functor's value only if the value is not null
	 *
	 * @param callable $f
	 *
	 * @return null
	 */
	public function map( callable $f ) {
		return ( null == $this->value ) ? null : $f( $this->value );
	}

}

/**
 * Class Either
 * Base class for an Either Functor
 * @package DaveRoss\FunctionalProgrammingUtils
 */
abstract class Either extends Functor {
}

/**
 * Class Left
 * Left Functor. Represents a failure or error state.
 * @package DaveRoss\FunctionalProgrammingUtils
 */
abstract class Left extends Either {

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
 * Right Functor. Represents a success state. Acts like a normal Functor.
 * @package DaveRoss\FunctionalProgrammingUtils
 */
abstract class Right extends Either {
}