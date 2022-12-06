<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Common\AllPermission;

class ParentPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nguoiDung = Permission::findOrCreate(AllPermission::nguoiDung());
        Permission::where('name', 'LIKE', "%người dùng%")
            ->where('id', '!=', $nguoiDung->id)
            ->update([
                'parent_id' => $nguoiDung->id
            ]);



    }
}
