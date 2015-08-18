<?php

use DaveRoss\FunctionalProgrammingUtils\Functor as Functor;

class FunctorImpl extends Functor {
	public $value;
}

class FunctorTest extends PHPUnit_Framework_TestCase {

	public function test_functor_construction() {

		$this->assertInstanceOf( 'DaveRoss\FunctionalProgrammingUtils\Functor', FunctorImpl::of( 5 ) );
		$this->assertEquals( 5, FunctorImpl::of( 5 )->value );

	}

	public function test_functor_map() {

		$this->assertInstanceOf( 'DaveRoss\FunctionalProgrammingUtils\Functor', FunctorImpl::of( 5 )->map( function ( $a ) {
			return $a * 2;
		} ) );

		$this->assertEquals( 10, FunctorImpl::of( 5 )->map( function ( $a ) {
			return $a * 2;
		} )->value );

	}

	public function test_functor_invoke() {

		$five = FunctorImpl::of( 5 );

		$this->assertInstanceOf( 'DaveRoss\FunctionalProgrammingUtils\Functor', $five( function ( $a ) {
			return $a * 2;
		} ) );

		$this->assertEquals( 10, $five( function ( $a ) {
			return $a * 2;
		} )->value );

	}

	public function test_maybe_functor() {

		$m = \DaveRoss\FunctionalProgrammingUtils\Maybe::of(5);
		$this->assertInstanceOf('DaveRoss\FunctionalProgrammingUtils\Maybe', $m->map(function($a) { return 7; }));
		$this->assertEquals('7', $m->map(function($a) { return 7; })->value());

		$n = \DaveRoss\FunctionalProgrammingUtils\Maybe::of(null);
		$this->assertInstanceOf('DaveRoss\FunctionalProgrammingUtils\Maybe', $n->map(function($a) { return 7; }));
		$this->assertNull($n->map(function($a) { return 7; })->value());

	}

	public function test_maybe_function() {

		$m = \DaveRoss\FunctionalProgrammingUtils\Maybe::of(5);
		$this->assertInternalType('integer', \DaveRoss\FunctionalProgrammingUtils\maybe(null, function($a) { return 7; }, $m));
		$this->assertEquals(7, \DaveRoss\FunctionalProgrammingUtils\maybe(null, function($a) { return 7; }, $m));

		$n = \DaveRoss\FunctionalProgrammingUtils\Maybe::of(null);
		$this->assertNull(\DaveRoss\FunctionalProgrammingUtils\maybe(null, function($a) { return 7; }, $n));

	}

}

