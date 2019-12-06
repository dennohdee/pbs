<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('message');
            $table->string('type',15);
            $table->boolean('status',1)->default(0)->nullable();
            $table->integer('staff_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->integer('admin_id')->unsigned()->references('id')->on('admins')->onUpdate('CASCADE')->onDelete('RESTRICT');
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
        Schema::dropIfExists('notifications');
    }
}
