<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('alias');
            $table->decimal('starter_price', 7, 0);
            $table->decimal('current_price', 7, 0);
            $table->string('release_date');
            $table->decimal('amount', 13, 0);
            $table->string('slug');
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
        Schema::dropIfExists('icos');
    }
}
