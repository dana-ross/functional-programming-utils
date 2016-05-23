<?php

namespace DaveRoss\FunctionalProgrammingUtils;

/**
 * Class Monad
 * Base class for Monads. Implements basic Monad functionality
 * @package DaveRoss\FunctionalProgrammingUtils
 */
abstract class Monad
{

    protected $value;

    /**
     * Allow Monad::map() to be called like a method
     *
     * @param callable $f
     *
     * @return mixed
     */
    public function __invoke($f)
    {
        return $this->map($f);
    }

    /**
     * @param mixed $a
     */
    private function __construct($a)
    {
        $this->value = $a;
    }

    /**
     * Instantiate a new Monad wrapping a given value
     *
     * @param mixed $a
     *
     * @return Monad
     */
    public static function of($a)
    {
        return new static( $a );
    }

    /**
     * Apply a function to this Monad's value
     *
     * @param callable $f
     *
     * @return Monad
     */
    public function map(callable $f)
    {
        $class_name = get_called_class();

        return new $class_name( $f( $this->value ) );
    }

    /**
     * Get this Monad's value without wrapping it.
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }
}