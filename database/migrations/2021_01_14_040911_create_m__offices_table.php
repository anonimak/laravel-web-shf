<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_offices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('address')->nullable();
            $table->string('telp')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->boolean('center')->nullable();
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
        Schema::dropIfExists('m_offices');
    }
}
