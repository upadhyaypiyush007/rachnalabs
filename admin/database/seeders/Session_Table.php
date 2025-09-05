<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Session;

class Session_Table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Session::insert([
            'name' => "Session 1",
            'status' => '1'
        ]);
    }
}
