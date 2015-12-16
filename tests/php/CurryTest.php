<?php

function three_param($a, $b, $c) {
		return intval($a) + intval($b) + intval($c);
}

class CurryTest extends PHPUnit_Framework_TestCase {

	public function test_partially_apply() {

		$fn  = function ( $x, $y ) {
			return $x + $y;
		};
		$cfn = DaveRoss\FunctionalProgrammingUtils\partially_apply( $fn, 2 );
		$this->assertEquals( 5, $cfn( 3 ) );

	}

	public function test_partially_apply_right() {

		$fn  = function ( $x, $y ) {
			return $x + $y;
		};
		$cfn = DaveRoss\FunctionalProgrammingUtils\partially_apply_right( $fn, 2 );
		$this->assertEquals( 5, $cfn( 3 ) );

	}

	public function test_curry_two_param_function() {
		$pfd = DaveRoss\FunctionalProgrammingUtils\curry( 'range', 1 );
		$output = $pfd( 5 );
		$this->assertEquals( array(1,2,3,4,5), $output );
	}

	public function test_curry_single_param_function() {
		$output = DaveRoss\FunctionalProgrammingUtils\curry( 'intval', 5.2 );
		$this->assertEquals( 5, $output );
	}

	public function test_curry_three_param_function() {
		$fn1_instance1 = DaveRoss\FunctionalProgrammingUtils\curry( 'three_param' , 1 );
		$fn1_instance2 = $fn1_instance1(2);
		$output1 = $fn1_instance2(3);
		$this->assertEquals(6, $output1);
	}

  /**
	 * Test that curry() can track parameters for two functions simultaneously
	 */
	public function test_curry_multiple_invocations() {
		$fn1_instance1 = DaveRoss\FunctionalProgrammingUtils\curry( 'three_param' , 1 );
		$fn2_instance1 = DaveRoss\FunctionalProgrammingUtils\curry( 'three_param' , 10 );
		$fn1_instance2 = $fn1_instance1(2);
		$fn2_instance2 = $fn2_instance1(20);
		$output1 = $fn1_instance2(3);
		$output2 = $fn2_instance2(30);
		$this->assertEquals(6, $output1);
		$this->assertEquals(60, $output2);
	}

}
