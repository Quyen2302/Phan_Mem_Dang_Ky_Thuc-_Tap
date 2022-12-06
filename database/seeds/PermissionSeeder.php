<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Common\AllPermission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::where('name', QUAN_TRI_HT)->first();

        if (empty($role)) {
            $role = Role::create(['name' => QUAN_TRI_HT]);
            $user = \App\User::where('username', 'admin')->update([
                'role_id' => $role->id
            ]);

        }

        //nguoi dunggit
        Permission::findOrCreate(AllPermission::themNguoiDung());
        Permission::findOrCreate(AllPermission::suaNguoiDung());
        Permission::findOrCreate(AllPermission::xoaNguoiDung());



        if ($role) {
            $permissions = Permission::all();
            $role->syncPermissions($permissions);
        }

    }
}
