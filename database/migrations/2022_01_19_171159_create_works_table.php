<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('works', function (Blueprint $table) {
			$table->id();
			$table->string('name')->nullable();
			$table->string('desc')->nullable();
			$table->string('website')->nullable();
			$table->string('email')->nullable();
			$table->string('person')->nullable();
			$table->string('phone')->nullable();
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
		Schema::dropIfExists('works');
	}
}
