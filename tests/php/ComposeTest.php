<?php

class ComposeTest extends PHPUnit_Framework_TestCase {

	public function test_compose() {

		$replace_capital_a = function($a) { return preg_replace('/A/', '', $a); };

		$f = DaveRoss\FunctionalProgrammingUtils\compose($replace_capital_a, 'strtoupper');
		$this->assertEquals('MNOP', $f('amAnaoAp'));

	}

}