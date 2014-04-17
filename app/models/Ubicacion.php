<?php

class Ubicacion extends Eloquent
{
	protected $table = 'ubicacion';
	
	public static function validate($input) {
		
		$rules = array(
	        'descripcion' => 'Required|Min:3|Max:80|Alpha'
		);
		
		return Validator::make($input, $rules);
	}
}