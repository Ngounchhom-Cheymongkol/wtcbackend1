<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class role_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([  
            'role_name' => 'Admin',
            'role_slug' => 'admin',
        ]);
        DB::table('roles')->insert([  
            'role_name' => 'User',
            'role_slug' => 'user',
        ]);
        DB::table('roles')->insert([  
            'role_name' => 'Manager',
            'role_slug' => 'manager',
        ]);
    }
}
