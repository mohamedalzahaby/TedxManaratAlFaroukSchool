<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameRegisterationDetailsToEventRegisterationDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::rename('registerationdetails', 'eventregistrationdetails');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_registeration_details', function (Blueprint $table) {
            Schema::rename('eventregistrationdetails', 'registerationdetails');
        });
    }
}
