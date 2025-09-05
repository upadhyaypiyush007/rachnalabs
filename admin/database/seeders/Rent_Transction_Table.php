<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RentTransction;

class Rent_Transction_Table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RentTransction::insert([
            'user_id' => 1,
            'video_id' => 1,
            'price' => 99,
            'type_id' => 1,
            'video_type' => 1,
            'status' => 1,
            'date' => "2022-10-04 08:04:07.000000"            
        ]);
    }
}
