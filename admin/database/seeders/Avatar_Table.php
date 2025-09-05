<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Avatar;

class Avatar_Table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Avatar::insert([
            'name' => "Avatar 1",
            'image' => "1.jpg",
        ]);
    }
}
