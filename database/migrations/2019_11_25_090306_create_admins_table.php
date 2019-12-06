<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('staffNo');
            $table->string('name', 65);
            $table->string('otherNames', 65);
            $table->string('email', 65)->unique();
            $table->string('phone', 15)->unique();
            $table->integer('deptId')->nullable()->references('id')->on('departments')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->string('position', 65);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
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
        Schema::dropIfExists('admins');
    }
}
