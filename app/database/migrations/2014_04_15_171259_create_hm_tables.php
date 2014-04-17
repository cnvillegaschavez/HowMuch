<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHmTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categoria', function($table){
			$table->increments('id');
			$table->string('nombre');
			$table->string('etiquetas');
			$table->boolean('state');
			$table->timestamps();
		});
		
		Schema::create('subcategoria', function($table){
			$table->increments('id');
			$table->integer('categoria_id')->unsigned();
			$table->string('nombre');
			$table->string('etiquetas');
			$table->boolean('state');
			$table->timestamps();			
			$table->foreign('categoria_id')
			->references('id')->on('categoria')
			->onDelete('restrict');
		});
		
		Schema::create('entidad', function($table){
			$table->increments('id');
			$table->integer('categoria_id')->unsigned();
			$table->integer('subcategoria_id')->unsigned();
			$table->string('nombre');
			$table->string('categoria');
			$table->string('subcategoria');
			$table->string('etiquetas');
			$table->boolean('state');
			$table->timestamps();
			$table->foreign('categoria_id')
			->references('id')->on('categoria')
			->onDelete('restrict');
			$table->foreign('subcategoria_id')
			->references('id')->on('subcategoria')
			->onDelete('restrict');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
