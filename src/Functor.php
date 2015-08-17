<?php

abstract class Functor {

	private $value;

	public function __invoke( $a ) {
		$this->value = $a;
	}

	public function map( $f ) {
		return $f( $this->value );
	}

}