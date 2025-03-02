<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name'=>'admin']);
        $guest = Role::create(['name'=>'guest']);

        $categoryList = Permission::create(['name'=>'categoryList']);
        $categoryCreate = Permission::create(['name'=>'categoryCreate']);
        $categoryShow = Permission::create(['name'=>'categoryShow']);
        $categoryUpdate = Permission::create(['name'=>'categoryUpdate']);
        $categoryDelete = Permission::create(['name'=>'categoryDelete']);

        $productList = Permission::create(['name'=>'productList']);
        $productShow = Permission::create(['name'=>'productShow']);
        $productCreate = Permission::create(['name'=>'productCreate']);
        $productUpdate = Permission::create(['name'=>'productUpdate']);
        $productDelete = Permission::create(['name'=>'productDelete']);

        $userlist = Permission::create(['name'=>'userList']);
        $userShow = Permission::create(['name'=>'userShow']);
        $userCreate = Permission::create(['name'=>'userCreate']);
        $userUpdate = Permission::create(['name'=>'userUpdate']);
        $userDelete = Permission::create(['name'=>'userDelete']);

        $roleList = Permission::create(['name'=>'roleList']);
        $roleShow = Permission::create(['name'=>'roleShow']);
        $roleCreate = Permission::create(['name'=>'roleCreate']);
        $roleUpdate = Permission::create(['name'=>'roleUpdate']);
        $roleDelete = Permission::create(['name'=>'roleDelete']);

        $permissionList = Permission::create(['name'=>'permissionList']);
        $permissionShow = Permission::create(['name'=>'permissionShow']);
        $permissionCreate = Permission::create(['name'=>'permissionCreate']);
        $permissionUpdate = Permission::create(['name'=>'permissionUpdate']);
        $permissionDelete = Permission::create(['name'=>'permissionDelete']);

        $admin->givePermissionTo([
            $categoryList, $categoryCreate, $categoryShow,$categoryUpdate, $categoryDelete,
            $productList, $productShow, $productCreate, $productUpdate, $productDelete,
            $userlist, $userCreate, $userShow, $userUpdate, $userDelete,
            $roleList, $roleShow, $roleCreate, $roleUpdate, $roleDelete,
            $permissionList, $permissionShow, $permissionCreate, $permissionUpdate, $permissionDelete
        ]);

        $guest->givePermissionTo([
            $categoryList,
            $productList
        ]);
    }
}
