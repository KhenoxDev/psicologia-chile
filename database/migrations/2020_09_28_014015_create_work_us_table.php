<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkUsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('work_us', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->string('name');
			$table->string('mail')->unique();
			$table->string('phone');
			$table->string('country')->nullable();
			$table->string('city')->nullable();
			$table->string('cv');
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('work_us');
	}
}
