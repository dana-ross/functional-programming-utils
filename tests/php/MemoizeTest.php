<?php

use function DaveRoss\FunctionalProgrammingUtils\memoize as memoize;

class MemoizeTest extends PHPUnit_Framework_TestCase {

	function test_memoize() {

		$this->assertInstanceOf('Closure', memoize(function() { return 'test'; }));

		$fn = memoize(function($n) { return $n; });
		$this->assertEquals(4, $fn(4));
		$this->assertEquals(4, $fn(4));

	}

}
