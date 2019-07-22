<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameRegopCols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrationformoptions', function (Blueprint $table) {
            $table->dropColumn('optionId');
            $table->dropColumn('registrationFormId');
            $table->integer('options_id');
            $table->integer('registeration_form_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrationformoptions', function (Blueprint $table) {
            $table->dropColumn('options_id');
            $table->dropColumn('registeration_form_id');
            $table->integer('optionId');
            $table->integer('registrationFormId');
        });
    }
}
