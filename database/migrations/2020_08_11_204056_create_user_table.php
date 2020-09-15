<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->string('rut')->unique();
			$table->string('name');
			$table->string('last_name')->nullable();
			$table->string('password');
			$table->unsignedBigInteger('id_rol');
			$table->boolean('is_active')->default(0);
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent();

			$table->foreign('id_rol')->references('id')->on('rol');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('user');
	}
}
