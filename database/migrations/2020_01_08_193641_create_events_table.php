<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('events', function (Blueprint $table) {
            $table->increments('eventId');
            $table->integer('id');
            $table->text('eventTitle');
            $table->text('eventDescription');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->boolean('allDay')->default(false);
            $table->text('eventLocation');
            $table->text('recipients');
            $table->rememberToken();
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
        Schema::dropIfExists('events');
    }
}
