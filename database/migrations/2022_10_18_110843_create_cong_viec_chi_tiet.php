<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongViecChiTiet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cong_viec_chi_tiet', function (Blueprint $table) {
            $table->id();
            $table->integer('cong_viec_id')->nullable();
            $table->string('noi_dung')->nullable();
            $table->date('han_xu_ly')->nullable();
            $table->string('ket_qua')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('cong_viec_chi_tiet');
    }
}
