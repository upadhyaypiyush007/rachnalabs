<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class Banner_Table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::insert([
            'type_id' => 1,
            'is_home_screen' => '1',
            'video_type' => '1',
            'video_id' => "1",
            'status' => '1'
        ]);
    }
}
