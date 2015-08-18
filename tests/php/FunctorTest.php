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

}

