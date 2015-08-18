<?php

class MathTest extends PHPUnit_Framework_TestCase {

	public function test_add() {

		$this->assertInternalType( 'integer', DaveRoss\FunctionalProgrammingUtils\add( 1, 2 ) );
		$this->assertEquals( 3, DaveRoss\FunctionalProgrammingUtils\add( 1, 2 ) );

	}

	public function test_subtract() {

		$this->assertInternalType( 'integer', DaveRoss\FunctionalProgrammingUtils\subtract( 2, 1 ) );
		$this->assertEquals( 1, DaveRoss\FunctionalProgrammingUtils\subtract( 2, 1 ) );

	}

	public function test_multiply() {

		$this->assertInternalType( 'integer', DaveRoss\FunctionalProgrammingUtils\multiply( 3, 2 ) );
		$this->assertEquals( 6, DaveRoss\FunctionalProgrammingUtils\multiply( 3, 2 ) );

	}

	public function test_divide() {

		$this->assertInternalType( 'integer', DaveRoss\FunctionalProgrammingUtils\divide( 6, 3 ) );
		$this->assertEquals( 2, DaveRoss\FunctionalProgrammingUtils\divide( 6, 3 ) );

	}

	public function test_inverse() {

		$this->assertInternalType( 'integer', DaveRoss\FunctionalProgrammingUtils\inverse( 2 ) );
		$this->assertEquals( - 2, DaveRoss\FunctionalProgrammingUtils\inverse( 2 ) );

	}

	public function test_modulus() {

		$this->assertInternalType( 'integer', DaveRoss\FunctionalProgrammingUtils\modulus( 14, 6 ) );
		$this->assertEquals( 2, DaveRoss\FunctionalProgrammingUtils\modulus( 14, 6 ) );

	}

	public function test_truthy() {

		$this->assertInternalType( 'boolean', DaveRoss\FunctionalProgrammingUtils\truthy( true ) );
		$this->assertTrue( DaveRoss\FunctionalProgrammingUtils\truthy( true ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\truthy( false ) );
		$this->assertTrue( DaveRoss\FunctionalProgrammingUtils\truthy( 1 ) );
		$this->assertTrue( DaveRoss\FunctionalProgrammingUtils\truthy( 'hello' ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\truthy( 0 ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\truthy( '' ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\truthy( null ) );

	}

	public function test_true() {

		$this->assertInternalType( 'boolean', DaveRoss\FunctionalProgrammingUtils\true( true ) );
		$this->assertTrue( DaveRoss\FunctionalProgrammingUtils\true( true ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\true( false ) );

		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\true( 1 ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\true( 'hello' ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\true( 0 ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\true( '' ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\true( null ) );

	}

	public function test_falsy() {

		$this->assertInternalType( 'boolean', DaveRoss\FunctionalProgrammingUtils\falsy( true ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\falsy( true ) );
		$this->assertTrue( DaveRoss\FunctionalProgrammingUtils\falsy( false ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\falsy( 1 ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\falsy( 'hello' ) );
		$this->assertTrue( DaveRoss\FunctionalProgrammingUtils\falsy( 0 ) );
		$this->assertTrue( DaveRoss\FunctionalProgrammingUtils\falsy( '' ) );
		$this->assertTrue( DaveRoss\FunctionalProgrammingUtils\falsy( null ) );

	}

	public function test_false() {

		$this->assertInternalType( 'boolean', DaveRoss\FunctionalProgrammingUtils\false( true ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\false( true ) );
		$this->assertTrue( DaveRoss\FunctionalProgrammingUtils\false( false ) );

		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\false( 1 ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\false( 'hello' ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\false( 0 ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\false( '' ) );
		$this->assertFalse( DaveRoss\FunctionalProgrammingUtils\false( null ) );

	}

	public function test_default_value() {

		$this->assertEquals( 5, DaveRoss\FunctionalProgrammingUtils\default_value( 1, 5 ) );
		$this->assertEquals( 5, DaveRoss\FunctionalProgrammingUtils\default_value( 5, null ) );

	}

}