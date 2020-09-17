<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Social', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->string('link');
			$table->unsignedBigInteger('type_id')->unique();
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent();

			$table->foreign('type_id')->references('id')->on('social_type');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('Social');
	}
}
