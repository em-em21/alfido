<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetaTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beta_transfers', function (Blueprint $table) {
			$table->id();
			
			$table->string('order_id');
			$table->decimal('amount', 9, 2);
			$table->string('currency');
			$table->boolean('status')->default(false);
			$table->foreignId('user_id')->constrained();
			
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
        Schema::dropIfExists('beta_transfers');
    }
}
