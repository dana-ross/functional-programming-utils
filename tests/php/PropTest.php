<?php

class PropTest extends PHPUnit_Framework_TestCase {

	public function test_array_prop() {

		$this->assertEquals( 'world', DaveRoss\FunctionalProgrammingUtils\array_prop( array(
			'hello' => 'world',
			'x'     => 'y'
		), 'hello' ) );

	}

	public function test_object_prop() {

		$obj        = new stdClass();
		$obj->hello = 'world';
		$obj->x     = 'y';
		$this->assertEquals( 'world', DaveRoss\FunctionalProgrammingUtils\object_prop( $obj, 'hello' ) );

	}

	public function test_prop() {

		$this->assertEquals( 'world', DaveRoss\FunctionalProgrammingUtils\prop( array(
			'hello' => 'world',
			'x'     => 'y'
		), 'hello' ) );

		$obj        = new stdClass();
		$obj->hello = 'world';
		$obj->x     = 'y';
		$this->assertEquals( 'world', DaveRoss\FunctionalProgrammingUtils\prop( $obj, 'hello' ) );

	}

}