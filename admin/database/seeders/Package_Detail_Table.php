<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package_Detail;

class Package_Detail_Table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package_Detail::insert([
            'package_id' => 1,
            'package_key' => "All Content",
            'package_value' => "1",
        ]);
    }
}
