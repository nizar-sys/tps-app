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
        Schema::create('tps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('village_id');
            $table->foreign('village_id')->references('id')->on('villages')->onDelete('cascade')->cascadeOnUpdate();
            $table->string('nama_tps');
            $table->unsignedBigInteger('tim_id');
            $table->foreign('tim_id')->references('id')->on('users')->onDelete('cascade')->cascadeOnUpdate();
            $table->enum('status_tps', ['basis', 'sebaran', 'penyangga', 'optimis'])->nullable();
            $table->integer('vote_2014')->default(0);
            $table->integer('vote_2019')->default(0);
            $table->integer('target_rumah')->default(0);
            $table->integer('progres')->nullable();
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
        Schema::dropIfExists('tps');
    }
};
