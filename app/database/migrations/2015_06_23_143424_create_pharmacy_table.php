<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pharmacy', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->string('pharmacy_id', 128);
            $table->string('item', 128);
            $table->integer('quantity');
            $table->integer('price');
            $table->string('expiry');
            $table->string('nafdac');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('pharmacy');
	}

}
