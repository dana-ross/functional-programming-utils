<?php

namespace DaveRoss\FunctionalProgrammingUtils;

/**
 * Add two numbers
 *
 * @param mixed $x
 * @param mixed $y
 *
 * @return mixed
 */
function add($x, $y)
{
    return $x + $y;
}

/**
 * Invert a number
 *
 * @param mixed $x
 *
 * @return mixed
 */
function inverse($x)
{
    return multiply($x, - 1);
}

/**
 * Subtract two numbers
 *
 * @param mixed $x
 * @param mixed $y
 *
 * @return mixed
 */
function subtract($x, $y)
{
    return $x - $y;
}

/**
 * Multiply two numbers
 *
 * @param mixed $x
 * @param mixed $y
 *
 * @return mixed
 */
function multiply($x, $y)
{
    return $x * $y;
}

/**
 * Divide two numbers
 *
 * @param mixed $x
 * @param mixed $y
 *
 * @return float
 */
function divide($x, $y)
{
    return $x / $y;
}

/**
 * Divide two numbers, return the modulus
 *
 * @param mixed $x
 * @param mixed $y
 *
 * @return int
 */
function modulus($x, $y)
{
    return $x % $y;
}

/**
 * Check if a value is "truthy" but not necessarily equal to true
 *
 * @param mixed $x
 *
 * @return bool
 */
function truthy($x)
{
    return true == $x;
}

/**
 * Check if a value is boolean true
 *
 * @param mixed $x
 *
 * @return bool
 */
function true($x)
{
    return true === $x;
}

/**
 * Check if a value is "falsey" but not necessarily equal to false
 *
 * @param mixed $x
 *
 * @return bool
 */
function falsy($x)
{
    return false == $x;
}

/**
 * Check if a value is boolean false
 *
 * @param mixed $x
 *
 * @return bool
 */
function false($x)
{
    return false === $x;
}

/**
 * Return a value or a default if the value is null or not set
 *
 * @param mixed $x
 * @param mixed $y default value
 *
 * @return mixed
 */
function default_value($x, $y = null)
{
    return null === $y ? $x : $y;
}
