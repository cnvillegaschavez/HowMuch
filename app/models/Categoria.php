<?php

class Categoria extends Eloquent
{
	protected $table = 'categoria';

	public static function validate($input) {

		$rules = array(
				'nombre' => 'Required|Min:3|Max:80|Alpha'
		);

		return Validator::make($input, $rules);
	}
}