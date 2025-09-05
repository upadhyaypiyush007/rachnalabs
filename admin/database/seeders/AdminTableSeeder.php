<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Admin::truncate();
        
        Admin::insert([
            'user_name' => "admin",
            'email' => "admin@admin.com",
            'password' => Hash::make('admin'),
            'type' => '1',
            'status' => '1'
        ]);
    }
}

