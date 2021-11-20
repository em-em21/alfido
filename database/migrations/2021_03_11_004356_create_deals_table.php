<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
			// money money
			$table->unsignedDecimal('investment', 9, 2);
			$table->unsignedDecimal('price', 13, 2);
            $table->decimal('profit', 9, 2);
			// 0 - sell, 1 - buy
            $table->tinyInteger('dest');
			// 0 - crypto || ico, 1 - stocks
            $table->tinyInteger('market');
			// to diff crypto binance from custom ico
			$table->boolean('is_ico')->default(false);
            $table->boolean('is_open')->default(true);
            $table->string('stock_alias');
            $table->string('stock_naming');
			$table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('deals');
    }
}
