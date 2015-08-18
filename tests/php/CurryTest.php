<?php

use function DaveRoss\FunctionalProgrammingUtils\curry as curry;
use function DaveRoss\FunctionalProgrammingUtils\curry_right as curry_right;

class CurryTest extends PHPUnit_Framework_TestCase {

	public function test_curry() {

		$fn  = function ( $x, $y ) {
			return $x + $y;
		};
		$cfn = curry( $fn, 2 );
		$this->assertEquals( 5, $cfn( 3 ) );

	}

	public function test_curry_right() {

		$fn  = function ( $x, $y ) {
			return $x + $y;
		};
		$cfn = curry_right( $fn, 2 );
		$this->assertEquals( 5, $cfn( 3 ) );

	}
}