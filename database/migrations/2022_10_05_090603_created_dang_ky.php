<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedDangKy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dang_ky', function (Blueprint $table) {
            $table->id();
            $table->string('ten_sinh_vien')->nullable();
            $table->string('ma_sinh_vien')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->string('lop')->nullable();
            $table->string('khoa')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->string('y_kien')->nullable();
            $table->tinyInteger('trang_thai')->default(1)->comment('1 vừa đăng ký 2 đã được cán bộ nhà trường duyệt 3 doanh nghiệp đã duyệt 0 đã hủy');
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
        Schema::dropIfExists('dang_ky');
    }
}
