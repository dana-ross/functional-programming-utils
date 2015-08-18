<?php

class CurryTest extends PHPUnit_Framework_TestCase {

	public function test_curry() {

		$fn  = function ( $x, $y ) {
			return $x + $y;
		};
		$cfn = DaveRoss\FunctionalProgrammingUtils\curry( $fn, 2 );
		$this->assertEquals( 5, $cfn( 3 ) );

	}

	public function test_curry_right() {

		$fn  = function ( $x, $y ) {
			return $x + $y;
		};
		$cfn = DaveRoss\FunctionalProgrammingUtils\curry_right( $fn, 2 );
		$this->assertEquals( 5, $cfn( 3 ) );

	}
}