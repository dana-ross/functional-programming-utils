<?php

namespace DaveRoss\FunctionalProgrammingUtils;

/**
 * Class Left
 * Left Monad. Represents a failure or error state.
 * @package DaveRoss\FunctionalProgrammingUtils
 */
class Left extends Either
{

    /**
     * Return $this without applying the passed function
     *
     * @param callable $f
     *
     * @return Monad
     */
    public function map(callable $f)
    {
        return $this;
    }
}