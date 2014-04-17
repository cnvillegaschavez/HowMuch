<?php

class Entidad extends Eloquent
{
	protected $table = 'entidad';

	public static function validate($input) {

		$rules = array(
				'nombre' => 'Required|Min:3|Max:80|Alpha'
		);

		return Validator::make($input, $rules);
	}
}