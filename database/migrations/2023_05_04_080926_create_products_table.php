<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
		Schema::create('products', function(Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->json('options')->nullable();
            $table->tinyInteger('visibility')->default(1);
            $table->tinyInteger('price_status')->default(1)->comment('0 for Coming soon - 1 for Normal (Price) - 2 for call - 3 for stop build');
            $table->unsignedDecimal('price',15,2)->nullable();
            $table->unsignedDecimal('discount')->nullable();
            $table->enum('discount_type',['fixed','percent'])->nullable();
            $table->decimal('special_price')->nullable();
            $table->enum('special_price_type',['fixed','percent'])->nullable();
            $table->date('special_price_start')->nullable();
            $table->date('special_price_end')->nullable();
            $table->unsignedTinyInteger('in_stock')->default(0);


            $table->unsignedTinyInteger('manage_stock')->default(0);
            $table->unsignedSmallInteger('qty')->default(0);
            $table->unsignedInteger('view_count')->default(0);
            $table->unsignedInteger('sales_integer')->default(0);
            $table->foreignId('category_id')->nullable()->constrained();
            $table->softDeletes();
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
		Schema::drop('products');
	}
};
