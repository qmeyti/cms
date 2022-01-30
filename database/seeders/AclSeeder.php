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

            ['name' => 'show-pages', 'label' => 'نمایش صفحات'],
            ['name' => 'create-pages', 'label' => 'ایجاد صفحات'],
            ['name' => 'edit-pages', 'label' => 'ویرایش صفحات'],
            ['name' => 'delete-pages', 'label' => 'حذف صفحات'],

            ['name' => 'show-posts', 'label' => 'نمایش مقالات'],
            ['name' => 'create-posts', 'label' => 'ایجاد مقالات'],
            ['name' => 'edit-posts', 'label' => 'ویرایش مقالات'],
            ['name' => 'delete-posts', 'label' => 'حذف مقالات'],

            ['name' => 'show-tags', 'label' => 'نمایش برچسب'],
            ['name' => 'create-tags', 'label' => 'ایجاد برچسب'],
            ['name' => 'edit-tags', 'label' => 'ویرایش برچسب'],
            ['name' => 'delete-tags', 'label' => 'حذف برچسب'],

            ['name' => 'show-categories', 'label' => 'نمایش دسته بندی'],
            ['name' => 'create-categories', 'label' => 'ایجاد دسته بندی'],
            ['name' => 'edit-categories', 'label' => 'ویرایش دسته بندی'],
            ['name' => 'delete-categories', 'label' => 'حذف دسته بندی'],


            ['name' => 'show-permissions', 'label' => 'نمایش حقوق دسترسی'],
            ['name' => 'create-permissions', 'label' => 'ایجاد حقوق دسترسی'],
            ['name' => 'edit-permissions', 'label' => 'ویرایش حقوق دسترسی'],
            ['name' => 'delete-permissions', 'label' => 'حذف حقوق دسترسی'],



            ['name' => 'show-roles', 'label' => 'نمایش نقش های کاربری'],
            ['name' => 'create-roles', 'label' => 'ایجاد نقش کاربری'],
            ['name' => 'edit-roles', 'label' => 'ویرایش نقش کاربری'],
            ['name' => 'delete-roles', 'label' => 'حذف نقش کاربری'],

            ['name' => 'show-modules', 'label' => 'نمایش ماژول ها'],
            ['name' => 'create-modules', 'label' => 'ایجاد ماژول'],
            ['name' => 'edit-modules', 'label' => 'ویرایش ماژول'],
            ['name' => 'delete-modules', 'label' => 'حذف ماژول'],

            ['name' => 'show-sliders', 'label' => 'نمایش اسلایدر'],
            ['name' => 'create-sliders', 'label' => 'ایجاد اسلایدر'],
            ['name' => 'edit-sliders', 'label' => 'ویرایش اسلایدر'],
            ['name' => 'delete-sliders', 'label' => 'حذف اسلایدر'],

            ['name' => 'manage-menus', 'label' => 'مدیریت منوها'],
            ['name' => 'manage-settings', 'label' => 'مدیریت تنطیمات سایت'],
            ['name' => 'manage-logs', 'label' => 'مدیریت لاگ تغییرات'],
            ['name' => 'manage-themes', 'label' => 'مدیریت قالب ها'],


            ['name' => 'manage-app', 'label' => 'دسترسی مدیریت'],
            ['name' => 'manage-tools', 'label' => 'مدیریت ابزارها'],
            ['name' => 'manage-theme-settings', 'label' => 'تنظیمات قالب'],
            ['name' => 'manage-module-generator', 'label' => 'ابزار ماژولساز'],


            ////

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
