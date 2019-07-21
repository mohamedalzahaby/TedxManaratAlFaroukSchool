<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBoardId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eventregistrationdetails', function (Blueprint $table) {
            $table->dropColumn('boardId');
            $table->integer('eventId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eventregistrationdetails', function (Blueprint $table) {
            $table->dropColumn('eventId');
            $table->integer('boardId');
        });
    }
}
