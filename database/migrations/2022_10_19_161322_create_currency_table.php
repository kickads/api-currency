<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('currencies', function (Blueprint $table) {
			$table->id();
			$table->decimal('ARS', 11, 3)->nullable();
			$table->decimal('ARS_BLUE', 11, 3)->nullable();
			$table->decimal('EUR', 11, 3)->nullable();
			$table->decimal('BRL', 11, 3)->nullable();
			$table->decimal('GBP', 11, 3)->nullable();
			$table->decimal('MXN', 11, 3)->nullable();
			$table->decimal('COP', 11, 3)->nullable();
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
		Schema::dropIfExists('currency');
	}
};
