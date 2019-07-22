<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReaddTableRegop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('registrationformoptions');
        Schema::create('registrationformoptions', function(Blueprint $table) {
		    $table->engine = 'InnoDB';

		    $table->bigIncrements('rid');
		    $table->integer('registeration_form_id');
		    $table->integer('options_id');
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
        Schema::dropIfExists('registrationformoptions');
    }
}
