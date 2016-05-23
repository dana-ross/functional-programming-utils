<?php

namespace DaveRoss\FunctionalProgrammingUtils;

/**
 * Partially apply a function, partially applying the first parameter and returning a function that takes the remaining parameters
 *
 * @param callable $x
 * @param mixed    $y
 *
 * @return \Closure
 */
function partially_apply(callable $x, $y)
{
    return function () use ($x, $y) {
        return call_user_func_array($x, array_merge(array( $y ), func_get_args()));
    };
}

/**
 * Partially apply a function, partially applying the last parameter and returning a function that takes the remaining parameters
 *
 * @param callable $x
 * @param mixed    $y
 *
 * @return \Closure
 */
function partially_apply_right(callable $x, $y)
{
    return function () use ($x, $y) {
        return call_user_func_array($x, array_merge(func_get_args(), array( $y )));
    };
}

/**
 * Curry a function, partially applying a parameter and returning a function that takes the next required parameter until all are satisfied
 *
 * @param callable $x
 * @param mixed    $y
 *
 * @return \Closure
 */
function curry(callable $x, $y)
{
    $params = array( $y );
    $required_parameters = ( new \ReflectionFunction($x) )->getNumberOfRequiredParameters();

    if (1 === $required_parameters) {
        return call_user_func($x, $y);
    } else {
        return $fn = function ($z = null) use ($x, &$params, $required_parameters, &$fn) {
                $params[] = $z;
            if (count($params) === $required_parameters) {
                return call_user_func_array($x, $params);
            } else {
                return $fn;
            }
        };
    }
}
