<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ubicacion', function($table){
			$table->increments('id');
			$table->string('descripcion');
			$table->timestamps();
		});
		
		DB::statement('ALTER TABLE ubicacion ADD FULLTEXT search(descripcion)');			
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ubicacion', function($table) {
            $table->dropIndex('search');
        });
		
        Schema::drop('ubicacion');
		
	}

}
