<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongViec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cong_viec', function (Blueprint $table) {
            $table->id();
            $table->integer('sinh_vien_id')->nullable();
            $table->integer('nguoi_giao')->nullable();
            $table->date('han_xu_ly')->nullable();
            $table->string('noi_dung')->nullable();
            $table->string('file')->nullable();
            $table->string('danh_gia_cb')->nullable();
            $table->tinyInteger('xep_loai')->comment('1 hoàn thành tốt 2 hoàn thành 3 hoàn thành xuất sắc')->nullable();
            $table->tinyInteger('trang_thai')->comment('1 mới nhận 2 đang xử lý 3 hoàn thành ')->nullable();
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
        Schema::dropIfExists('cong_viec');
    }
}
