<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
			// 0 - guest | 1 - user | 2 - manager | 3 - admin
			$table->tinyInteger('role')->default(1);
			// 0 - inactive | 1 - active
            $table->tinyInteger('algo')->default(0);
			// 0 - new | 1 - active | 2 - high (potential) | 3 - low (potential) | 4 - inactive
			$table->tinyInteger('status')->default(0);
			// info
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
			$table->string('client_id'); // practically useless: only used on profile pages tab
			$table->text('comment')->nullable();
			$table->boolean('is_baned')->default(false);
			$table->boolean('is_verified')->default(false);
			// money-money
            $table->decimal('balance', 11, 2)->default(0.00);
            $table->decimal('credit', 11, 2)->default(0.00);
            $table->rememberToken();
            $table->timestamps();
        });
    }

	
	// kajdomu manageru svoix klientov
	// eti manageri mogut vpisivat babki i davat
	// kommenti k polzovatelam + statusi


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
