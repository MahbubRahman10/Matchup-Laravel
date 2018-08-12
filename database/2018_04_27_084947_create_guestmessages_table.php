<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guestmessages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('relation');
            $table->longText('message');
            $table->string('facebook')->nullable();
            $table->string('linkdin')->nullable();
            $table->string('googleplus')->nullable();
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
        Schema::dropIfExists('guestmessages');
    }
}
