<?php

namespace DaveRoss\FunctionalProgrammingUtils;

/**
 * Class Maybe
 * @package DaveRoss\FunctionalProgrammingUtils
 */
class Maybe extends Monad
{

    /**
     * Apply a function to this Monad's value only if the value is not null
     *
     * @param callable $f
     *
     * @return Maybe
     */
    public function map(callable $f)
    {
        return ( $this->isNothing() ) ? Maybe::of(null) : Maybe::of($f( $this->value ));
    }

    public function isNothing()
    {
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
function maybe($x, callable $f, Maybe $m)
{
    return ( $m->isNothing() ) ? $x : $f( $m->value() );
}