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
        Schema::create('metrics', function (Blueprint $table) {
            $table->id('id');
            $table->integer('short_linkid')->unsigned();
            $table->string('platform')->nullable();
            $table->string('browser')->nullable();
            $table->timestamps();
        });

        Schema::table('metrics',function (Blueprint $table){
            $table->foreign('short_linkid')->references('id')->on('short_links');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metrics');
    }
};
