<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared_archive', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('owner');
            $table->unsignedBigInteger('sharedID');
            $table->timestamp('shared_at')->nullable();
            $table->timestamps();
            $table->foreign('owner')->references('id')->on('users');
            $table->foreign('sharedID')->references('id')->on('archives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shared_archive');
    }
};
