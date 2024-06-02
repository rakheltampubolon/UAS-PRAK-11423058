<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'lapangan-list',
           'lapangan-create',
           'lapangan-edit',
           'lapangan-delete',
           'member-list',
           'member-create',
           'member-edit',
           'member-delete',
           'laporan-list',
           'laporan-create',
           'laporan-edit',
           'laporan-delete',
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
