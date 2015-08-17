<?php

namespace DaveRoss\FunctionalProgrammingUtils;

/**
 * Curry a function, partially applying the first parameter and returning a function that takes the remaining parameters
 *
 * @param callable $x
 * @param mixed    $y
 *
 * @return Closure
 */
function curry( callable $x, $y ) {
	return function () use ( $x, $y ) {
		return call_user_func_array( $x, array_merge( array( $y ), func_get_args() ) );
	};
}

/**
 * Curry a function, partially applying the last parameter and returning a function that takes the remaining parameters
 *
 * @param callable $x
 * @param mixed    $y
 *
 * @return Closure
 */
function curry_right( callable $x, $y ) {
	return function () use ( $x, $y ) {
		return call_user_func_array( $x, array_merge( func_get_args(), array( $y ) ) );
	};
}
