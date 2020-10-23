<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuComponentAndConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('route');
            $table->foreignId('id_parent');
            $table->bigInteger('index')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_menu')->references('id')->on('menu');
            $table->string('name');
            $table->bigInteger('index')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('config', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_component')->references('id')->on('components');
            $table->string('name');
            $table->enum('type', ['string', 'integer', 'boolean', 'double', 'float', 'array', 'object'])->default('string');
            $table->string('values');
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
        Schema::dropIfExists('menu');
        Schema::dropIfExists('components');
        Schema::dropIfExists('config');
    }
}
