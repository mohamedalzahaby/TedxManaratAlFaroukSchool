<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDepartmentRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departmentRegistrationDetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('registerationId');
            $table->integer('departmentId');
            $table->integer('registrationFormId');
            $table->integer('statusId');
		    $table->boolean('isdeleted')->default('0');
		    $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departmentRegistrationDetails');
    }
}
