<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditEventformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::rename('eventform', 'event_registeration_form');
        Schema::table('event_registeration_form', function (Blueprint $table) {
            $table->dropIfExists('eventId');
            $table->dropIfExists('registerationFormId');
            $table->integer('event_id');
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
        Schema::rename('event_registeration_form', 'eventform');
        Schema::table('eventform', function (Blueprint $table) {
            $table->dropIfExists('event_id');
            $table->dropIfExists('registeration_form_id');
            $table->integer('eventId');
            $table->integer('registerationFormId');
        });
    }
}
