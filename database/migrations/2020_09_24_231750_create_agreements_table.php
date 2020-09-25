<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agreements', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->string('title');
			$table->text('description')->nullable();
			$table->text('conditions')->nullable();
			$table->string('doc')->nullable();
			$table->boolean('is_active')->default(1);
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
		Schema::dropIfExists('agreements');
	}
}
