<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function (Blueprint $table) {
			$table->id()->autoIncrement();
			$table->string('title');
			$table->unsignedBigInteger('author_id');
			$table->longText('content');
			$table->string('image');
			$table->boolean('is_posted')->default(0);
			$table->date('posted_on')->nullable();
			$table->string('updated_by')->nullable();
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent();

			$table->foreign('author_id')->references('id')->on('author');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('news');
	}
}
