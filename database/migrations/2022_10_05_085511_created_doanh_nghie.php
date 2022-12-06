<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedDoanhNghie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doanh_nghiep', function (Blueprint $table) {
            $table->id();
            $table->string('ten_doanh_nghiep')->nullable();
            $table->string('dia_chi')->nullable();
            $table->integer('so_dien_thoai')->nullable();
            $table->tinyInteger('trang_thai')->default(1);
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
        Schema::dropIfExists('doanh_nghiep');
    }
}
