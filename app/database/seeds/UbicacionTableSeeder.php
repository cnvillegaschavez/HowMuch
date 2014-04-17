<?php

class UbicacionTableSeeder extends Seeder
{
	public function run()
	{
		Ubicacion::create(array(
			'descripcion' => 'Lima, Perú' 			
		));
		
		Ubicacion::create(array(
			'descripcion' => 'San Miguel, Perú'
		));
	}
}