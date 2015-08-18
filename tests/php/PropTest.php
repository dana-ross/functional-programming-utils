<?php

use function DaveRoss\FunctionalProgrammingUtils\array_prop as array_prop;
use function DaveRoss\FunctionalProgrammingUtils\object_prop as object_prop;
use function DaveRoss\FunctionalProgrammingUtils\prop as prop;

class PropTest extends PHPUnit_Framework_TestCase {

	public function test_array_prop() {

		$this->assertEquals( 'world', array_prop( array( 'hello' => 'world', 'x' => 'y' ), 'hello' ) );

	}

	public function test_object_prop() {

		$obj = new stdClass();
		$obj->hello = 'world';
		$obj->x = 'y';
		$this->assertEquals( 'world', object_prop( $obj, 'hello' ) );

	}

	public function test_prop() {

		$this->assertEquals( 'world', prop( array( 'hello' => 'world', 'x' => 'y' ), 'hello' ) );

		$obj = new stdClass();
		$obj->hello = 'world';
		$obj->x = 'y';
		$this->assertEquals( 'world', prop( $obj, 'hello' ) );

	}

}