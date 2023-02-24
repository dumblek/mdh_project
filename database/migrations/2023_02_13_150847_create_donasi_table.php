<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('keterangan');
            $table->string('gambar');
            $table->string('slug_donasi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('target');
            $table->integer('tercapai');
            $table->enum('status', ['open', 'close']);
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('donasi');
    }
}
