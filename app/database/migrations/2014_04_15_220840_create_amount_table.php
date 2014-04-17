<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monto', function($table){
			$table->increments('id');
			$table->integer('entidad_id')->unsigned();
			$table->bigInteger('latitud');
			$table->bigInteger('longitud');
			$table->string('ubicacion');
			$table->decimal('monto', 10, 2);
			$table->string('observacion');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
			$table->foreign('entidad_id')
			->references('id')->on('entidad')
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
