<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKerjasamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerjasamas', function (Blueprint $table) {
            $table->id('id_kerjasama');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_kategori')->references('id_kategori')->on('kategoris');
            $table->string('nomor_mou');
            $table->string('nomor_mou_instansi');
            $table->string('nomor_instansi');
            $table->string('email_instansi');
            $table->string('alamat_instansi');
            $table->string('nama_instansi');
            $table->string('nama_contact_person');
            $table->string('contact_person');
            $table->string('jenis_kegiatan');
            $table->string('manfaat');
            $table->string('implementasi');
            $table->string('file_mou');
            $table->tinyInteger('hard_file')->default(0);
            $table->date('tgl_mulai');
            $table->date('tgl_berakhir');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('kerjasamas');
    }
}
