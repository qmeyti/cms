<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = Module::insert([ 
            [
            'id' => 1,
            'name' => 'post',
            'label' => 'پست ماژول',
            'status' => 1,
            ],

            [
                'id' => 2,
                'name' => 'setting',
                'label' => 'تنظیمات ماژول',
                'status' => 1,
            ]

        ],
    
    );

    }
  

    
};
