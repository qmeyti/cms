<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $languages = [
            [
                'id' => 1,
                'code' => 'fa',
                'language_name' => 'فارسی',
                'dir' => 'rtl',
            ],
            [
                'id' => 2,
                'code' => 'en',
                'language_name' => 'english',
                'dir' => 'ltr',
            ],
            [
                'id' => 3,
                'code' => 'ar',
                'language_name' => 'العربی',
                'dir' => 'rtl',
            ]
        ];

        Language::insert($languages);
    }
}
