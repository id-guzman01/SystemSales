<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Cliente']);

        $permission1 = Permission::create(['name' => 'admin.user']);
        $permission2 = Permission::create(['name' => 'admin.products']);
        $permission3 = Permission::create(['name' => 'client.shopping']);

        $role1->syncPermissions([$permission1,$permission2]);
        $role2->givePermissionTo($permission3);

    }
}
