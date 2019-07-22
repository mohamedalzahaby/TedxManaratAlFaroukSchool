<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReaddTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('user', function (Blueprint $table) {
        //     // $table->bigIncrements('id');
        //     // $table->string('name');
        //     // $table->string('email')->unique();
        //     // $table->timestamp('email_verified_at')->nullable();
        //     // $table->string('password');
        //     // $table->rememberToken();
        //     $table->timestamps();
        // });
        Schema::create('users', function (Blueprint $table) {
		    $table->engine = 'InnoDB';
		    $table->bigIncrements('id');
		    $table->string('fname', 100);
		    $table->string('lname', 100);
            $table->string('email', 100);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
		    $table->integer('userTypeId');
		    $table->boolean('ismale')->default('0');
            $table->date('birthDate');
            $table->rememberToken();
		    $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
		    $table->integer('isdeleted')->default('0');

		});
    }

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
