<?php

use DaveRoss\FunctionalProgrammingUtils\Monad as Monad;

class MonadImpl extends Monad {
	public $value;
}

class FunctorTest extends PHPUnit_Framework_TestCase {

	public function test_functor_construction() {

		$this->assertInstanceOf( 'DaveRoss\FunctionalProgrammingUtils\Monad', MonadImpl::of( 5 ) );
		$this->assertEquals( 5, MonadImpl::of( 5 )->value );

	}

	public function test_functor_map() {

		$this->assertInstanceOf( 'DaveRoss\FunctionalProgrammingUtils\Monad', MonadImpl::of( 5 )->map( function ( $a ) {
			return $a * 2;
		} ) );

		$this->assertEquals( 10, MonadImpl::of( 5 )->map( function ( $a ) {
			return $a * 2;
		} )->value );

	}

	public function test_functor_invoke() {

		$five = MonadImpl::of( 5 );

		$this->assertInstanceOf( 'DaveRoss\FunctionalProgrammingUtils\Monad', $five( function ( $a ) {
			return $a * 2;
		} ) );

		$this->assertEquals( 10, $five( function ( $a ) {
			return $a * 2;
		} )->value );

	}

	public function test_maybe_functor() {

		$m = \DaveRoss\FunctionalProgrammingUtils\Maybe::of( 5 );
		$this->assertInstanceOf( 'DaveRoss\FunctionalProgrammingUtils\Maybe', $m->map( function ( $a ) {
			return 7;
		} ) );
		$this->assertEquals( '7', $m->map( function ( $a ) {
			return 7;
		} )->value() );

		$n = \DaveRoss\FunctionalProgrammingUtils\Maybe::of( null );
		$this->assertInstanceOf( 'DaveRoss\FunctionalProgrammingUtils\Maybe', $n->map( function ( $a ) {
			return 7;
		} ) );
		$this->assertNull( $n->map( function ( $a ) {
			return 7;
		} )->value() );

	}

	public function test_maybe_function() {

		$m = \DaveRoss\FunctionalProgrammingUtils\Maybe::of( 5 );
		$this->assertInternalType( 'integer', \DaveRoss\FunctionalProgrammingUtils\maybe( null, function ( $a ) {
			return 7;
		}, $m ) );
		$this->assertEquals( 7, \DaveRoss\FunctionalProgrammingUtils\maybe( null, function ( $a ) {
			return 7;
		}, $m ) );

		$n = \DaveRoss\FunctionalProgrammingUtils\Maybe::of( null );
		$this->assertNull( \DaveRoss\FunctionalProgrammingUtils\maybe( null, function ( $a ) {
			return 7;
		}, $n ) );

	}

	public function test_left_functor() {

		$this->assertInstanceOf( 'DaveRoss\FunctionalProgrammingUtils\Left', DaveRoss\FunctionalProgrammingUtils\Left::of( 5 ) );

	}

	public function test_right_functor() {

		$this->assertInstanceOf( 'DaveRoss\FunctionalProgrammingUtils\Right', DaveRoss\FunctionalProgrammingUtils\Right::of( 5 ) );

	}

	public function test_either_function() {

		$x = DaveRoss\FunctionalProgrammingUtils\Left::of( 5 );
		$y = DaveRoss\FunctionalProgrammingUtils\Right::of( 7 );

		$left_handler  = function ( $a ) {
			return $a * 2;
		};
		$right_handler = function ( $a ) {
			return $a * 3;
		};

		$this->assertEquals( 10, DaveRoss\FunctionalProgrammingUtils\either( $left_handler, $right_handler, $x ) );
		$this->assertEquals( 21, DaveRoss\FunctionalProgrammingUtils\either( $left_handler, $right_handler, $y ) );

	}
}

