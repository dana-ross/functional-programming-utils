<?php

/**
 * Return a property from an array or null if not found
 *
 * @param array $x
 * @param mixed $y array index
 *
 * @return mixed|null
 */
function array_prop( array $x, $y ) {
	return isset( $x[ $y ] ) ? $x[ $y ] : null;
}

/**
 * Return a property from an object or null if not found
 *
 * @param object $x
 * @param mixed  $y property name
 *
 * @return mixed|null
 */

function object_prop( $x, $y ) {
	return isset( $x->$y ) ? $x->$y : null;
}

/**
 * Return a property from an array or object, or null if not found
 *
 * @param array|object $x
 * @param mixed        $y array index or property name
 *
 * @return mixed|null
 */
function prop( $x, $y ) {
	return is_array( $x ) ? array_prop( $x, $y ) : object_prop( $x, $y );
}