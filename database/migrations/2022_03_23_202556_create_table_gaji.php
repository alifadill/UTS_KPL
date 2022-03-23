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
        Schema::create('table_gaji', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tunjangan')->unsigned()->nullable()->default(12);
            $table->integer('potongan')->unsigned()->nullable()->default(12);
            $table->integer('id_karyawan')->unsigned()->nullable()->default(12);
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
        Schema::dropIfExists('table_gaji');
    }
};
