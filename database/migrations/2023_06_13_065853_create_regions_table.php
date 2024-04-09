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
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wilayah');
            $table->unsignedBigInteger('mentor_id');
            $table->foreign('mentor_id')->references('id')->on('users')->onDelete('cascade')->cascadeOnUpdate();
            $table->unsignedBigInteger('operator_id');
            $table->foreign('operator_id')->references('id')->on('users')->onDelete('cascade')->cascadeOnUpdate();
            $table->enum('status_wilayah', ['basis', 'sebaran', 'penyangga', 'optimis'])->nullable();
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
        Schema::dropIfExists('regions');
    }
};
