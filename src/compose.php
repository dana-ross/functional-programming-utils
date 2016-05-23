<?php

namespace DaveRoss\FunctionalProgrammingUtils;

/**
 * Compose a function consisting of a series of functions that each take a single parameter
 *
 * @return \Closure
 */
function compose()
{

    static $g;
    if (! isset($g)) {
        /**
         * Apply function $f to $b iff $b is not null
         *
         * @param callable $f
         * @param mixed    $b
         *
         * @return mixed
         */
        $g = function (callable $f, $b) {
            return ( null === $b ) ? null : $f( $b );
        };
    };

    $fs = array_reverse(func_get_args());

    /**
     * Apply a series of functions to $a
     *
     * @param mixed $a
     *
     * @return mixed
     */
    return function ($a) use ($fs, $g) {

        $b = $a;
        foreach ($fs as $fn) {
            $b = $g( $fn, $b );
        }

        return $b;

    };

}
