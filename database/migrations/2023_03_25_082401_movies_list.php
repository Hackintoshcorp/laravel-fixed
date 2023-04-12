<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('movies_list', function (Blueprint $table) {
            $table->id()->index();
            $table->string('email', 255)->index();
            $table->string('title', 255)->index();
            $table->text('description');
            $table->text('url');
            $table->text('img');
            $table->string('seen', 255)->nullable();
            $table->string('watch_soon', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('movies_list');
    }
};
