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
        Schema::create('table_karyawan', function (Blueprint $table) {
            $table->integer('nik')->primary();
            $table->string('nama', 100)->nullable()->default('text');
            $table->string('jenis_kelamin', 100)->nullable()->default('text');
            $table->integer('id_golongan')->unsigned()->nullable()->default(12);
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
        Schema::dropIfExists('table_karyawan');
    }
};
