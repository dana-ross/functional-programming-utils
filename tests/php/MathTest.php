<?php

use function DaveRoss\FunctionalProgrammingUtils\add as add;
use function DaveRoss\FunctionalProgrammingUtils\subtract as subtract;
use function DaveRoss\FunctionalProgrammingUtils\multiply as multiply;
use function DaveRoss\FunctionalProgrammingUtils\divide as divide;
use function DaveRoss\FunctionalProgrammingUtils\inverse as inverse;
use function DaveRoss\FunctionalProgrammingUtils\modulus as modulus;
use function DaveRoss\FunctionalProgrammingUtils\truthy as truthy;
use function DaveRoss\FunctionalProgrammingUtils\true as true;
use function DaveRoss\FunctionalProgrammingUtils\falsy as falsy;
use function DaveRoss\FunctionalProgrammingUtils\false as false;
use function DaveRoss\FunctionalProgrammingUtils\default_value as default_value;

class MathTest extends PHPUnit_Framework_TestCase {

	public function test_add() {

		$this->assertInternalType( 'integer', add( 1, 2 ) );
		$this->assertEquals( 3, add( 1, 2 ) );

	}

	public function test_subtract() {

		$this->assertInternalType( 'integer', subtract( 2, 1 ) );
		$this->assertEquals( 1, subtract( 2, 1 ) );

	}

	public function test_multiply() {

		$this->assertInternalType( 'integer', multiply( 3, 2 ) );
		$this->assertEquals( 6, multiply( 3, 2 ) );

	}

	public function test_divide() {

		$this->assertInternalType( 'integer', divide( 6, 3 ) );
		$this->assertEquals( 2, divide( 6, 3 ) );

	}

	public function test_inverse() {

		$this->assertInternalType( 'integer', inverse( 2 ) );
		$this->assertEquals( - 2, inverse( 2 ) );

	}

	public function test_modulus() {

		$this->assertInternalType( 'integer', modulus( 14, 6 ) );
		$this->assertEquals( 2, modulus( 14, 6 ) );

	}

	public function test_truthy() {

		$this->assertInternalType( 'boolean', truthy( true ) );
		$this->assertTrue( truthy( true ) );
		$this->assertFalse( truthy( false ) );
		$this->assertTrue( truthy( 1 ) );
		$this->assertTrue( truthy( 'hello' ) );
		$this->assertFalse( truthy( 0 ) );
		$this->assertFalse( truthy( '' ) );
		$this->assertFalse( truthy( null ) );

	}

	public function test_true() {

		$this->assertInternalType( 'boolean', true( true ) );
		$this->assertTrue( true( true ) );
		$this->assertFalse( true( false ) );

		$this->assertFalse( true( 1 ) );
		$this->assertFalse( true( 'hello' ) );
		$this->assertFalse( true( 0 ) );
		$this->assertFalse( true( '' ) );
		$this->assertFalse( true( null ) );

	}

	public function test_falsy() {

		$this->assertInternalType( 'boolean', falsy( true ) );
		$this->assertFalse( falsy( true ) );
		$this->assertTrue( falsy( false ) );
		$this->assertFalse( falsy( 1 ) );
		$this->assertFalse( falsy( 'hello' ) );
		$this->assertTrue( falsy( 0 ) );
		$this->assertTrue( falsy( '' ) );
		$this->assertTrue( falsy( null ) );

	}

	public function test_false() {

		$this->assertInternalType( 'boolean', false( true ) );
		$this->assertFalse( false( true ) );
		$this->assertTrue( false( false ) );

		$this->assertFalse( false( 1 ) );
		$this->assertFalse( false( 'hello' ) );
		$this->assertFalse( false( 0 ) );
		$this->assertFalse( false( '' ) );
		$this->assertFalse( false( null ) );

	}

	public function test_default_value() {

		$this->assertEquals( 5, default_value( 1, 5 ) );
		$this->assertEquals( 5, default_value( 5, null ) );

	}

}