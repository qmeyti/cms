<?php

namespace Database\Seeders;

use App\Models\ACL\Permission;
use App\Models\ACL\PermissionRegistrar;
use App\Models\ACL\Role;
use Illuminate\Database\Seeder;

class AclSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Reset cached roles and permissions
         */
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        /**
         * Make admin role
         */
        $adminRole = Role::create(['id' => 1, 'label' => 'مدیر کل', 'name' => 'admin', 'guard_name' => 'web']);

        /**
         * Make permissions
         */
        $arrayOfPermissionNames = [
            1 => ['name' => 'show-users', 'label' => 'نمایش کاربران'],
            2 => ['name' => 'create-users', 'label' => 'ایجاد کاربران'],
            3 => ['name' => 'edit-users', 'label' => 'ویرایش کاربران'],
            4 => ['name' => 'delete-users', 'label' => 'حذف کاربران'],
        ];

        foreach ($arrayOfPermissionNames as $index => $permission) {

            /**
             * Generate permission in storage
             */
            Permission::create(['id' => $index, 'name' => $permission['name'], 'label' => $permission['label'], 'guard_name' => 'web']);

            /**
             * Assign permission to role
             */
            $adminRole->givePermissionTo($index);
        }


    }
}
