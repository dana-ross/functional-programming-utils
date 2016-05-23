<?php

namespace DaveRoss\FunctionalProgrammingUtils;

/**
 * Class Either
 * Base class for an Either Monad
 * @package DaveRoss\FunctionalProgrammingUtils
 */
abstract class Either extends Monad
{
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
function either(callable $f, callable $g, Either $e)
{

    switch (get_class($e)) {
        case 'DaveRoss\FunctionalProgrammingUtils\Left':
            return $f( $e->value() );
        case 'DaveRoss\FunctionalProgrammingUtils\Right':
            return $g( $e->value() );
    }

}