<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityTable extends Migration {

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
			$table->timestamps();
		});
		
		Schema::create('entidad', function($table){
			$table->increments('id');
			$table->integer('categoria_id')->unsigned();
			$table->string('nombre');
			$table->string('etiquetas');
			$table->timestamps();
			$table->foreign('categoria_id')
			->references('id')->on('categoria')
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
