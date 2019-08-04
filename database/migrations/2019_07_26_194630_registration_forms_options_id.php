<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegistrationFormsOptionsId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrationformoptionsvalue', function(Blueprint $table) {
            $table->dropColumn('registrationFormOptionsId');
            $table->integer('registration_forms_options_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrationformoptionsvalue', function(Blueprint $table) {
            $table->dropColumn('registration_forms_options_id');
            $table->integer('registrationFormOptionsId');
        });
    }
}
