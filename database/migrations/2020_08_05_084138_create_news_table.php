<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_type')->references('id')->on('type_news');
            $table->string('title');
            $table->string('image');
            $table->longText('description')->nullable();
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });

        
        Schema::create('type_news', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->boolean('status')->default(true);
            $table->softDeletes();
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
        Schema::dropIfExists('type_news');
        Schema::dropIfExists('news');
    }
}
