<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('comments', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->id();
            $table->text('description');
            $table->string('name');
            $table->ipAddress('ip_address')->nullable();
            $table->foreignId('post_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('parent_id')->nullable()->references('id')->on('comments')->cascadeOnDelete()->cascadeOnUpdate();
            $table->tinyInteger('visibility')->default(0);
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
		Schema::drop('comments');
	}
};
