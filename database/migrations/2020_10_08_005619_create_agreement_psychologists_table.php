<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementPsychologistsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agreement_psychologists', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->unsignedBigInteger('agreement_id');
			$table->unsignedBigInteger('psychologist_id');
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent();

			$table->foreign('agreement_id')->references('id')->on('agreements');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('agreement_psychologists');
	}
}
