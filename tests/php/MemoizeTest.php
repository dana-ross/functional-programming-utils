<?php

class MemoizeTest extends PHPUnit_Framework_TestCase {

	function test_memoize() {

		$this->assertInstanceOf( 'Closure', DaveRoss\FunctionalProgrammingUtils\memoize( function () {
			return 'test';
		} ) );

		$fn = DaveRoss\FunctionalProgrammingUtils\memoize( function ( $n ) {
			return $n;
		} );

		$this->assertEquals( 4, $fn( 4 ) );
		$this->assertEquals( 4, $fn( 4 ) );

	}

}
