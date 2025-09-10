<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('showings', function (Blueprint $table) {
            $table->id();
            $table->datetime('showing_datetime');
            $table->unsignedBigInteger('movie_id');
            $table->double('price');
            $table->string('rooms');
            $table->integer('limit')->default(50);
            $table->timestamps();

            $table->foreign('movie_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
