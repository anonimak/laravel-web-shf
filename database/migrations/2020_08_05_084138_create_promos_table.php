<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->longText('description')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('set_banner')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('promo_image', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_promo');
            $table->string('caption');
            $table->string('image');
            $table->timestamps();
            // foreign key
            $table->foreign('id_promo')->references('id')->on('promos')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promos');
    }
}
