<?php

namespace DaveRoss\FunctionalProgrammingUtils;

/**
 * Memoize a function
 *
 * @param callable $f function to memoize
 *
 * @return Closure
 */
function memoize(callable $f)
{
    return function () use ($f) {
        static $memoize = array();
        $memoize_key = md5(json_encode(func_get_args()));
        if (isset($memoize[ $memoize_key ])) {
            return $memoize[ $memoize_key ];
        }

        return $memoize[ $memoize_key ] = call_user_func_array($f, func_get_args());
    };
}
