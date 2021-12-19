<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::create([
            'id' => 1,
            'name' => 'مهدی',
            'family' => 'حاجت پور',
            'email' => 'mehdi.hajatpour@gmail.com',
            'national_code' => '5270033828',
            'password' => bcrypt('123456'),
            'avatar' => null,
            'about' => null,
            'nickname' => 'مهدی',
            'username' => 'mehdi',
        ]);

        $adminUser->assignRole('admin');

    }
}
