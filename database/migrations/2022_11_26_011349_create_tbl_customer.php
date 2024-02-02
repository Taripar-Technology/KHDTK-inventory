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
        Schema::create('tbl_pengecek', function (Blueprint $table) {
            $table->increments('pengecek_id');
            $table->string('pengecek_nama');
            $table->string('pengecek_slug');
            $table->text('pengecek_alamat')->nullable();
            $table->string('pengecek_notelp')->nullable();
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
        Schema::dropIfExists('tbl_pengecek');
    }
};
