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
        Schema::create('shared_archives', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('archiveID');
            $table->unsignedBigInteger('sharedID');
            $table->timestamps();
            $table->foreign(['archiveID'])->references('id')->on('archives');
            $table->foreign('sharedID')->references('id')->on('users');
            $table->unique(['archiveID','sharedID']);
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
