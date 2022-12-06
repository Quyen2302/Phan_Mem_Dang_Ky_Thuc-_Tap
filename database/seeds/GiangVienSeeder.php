<?php

use Illuminate\Database\Seeder;

class GiangVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checkUser = DB::table('roles')->where([
            'name' => 'Giảng viên',
        ])->first();

        if (empty($checkUser)) {
            DB::table('roles')->insert([
                'name' => 'Giảng viên',
                'guard_name' => 'web',
                'created_at' => '2021-07-22',
                'updated_at' => '2021-07-22',
            ]);
        }
    }
}
