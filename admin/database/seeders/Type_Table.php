<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class Type_Table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::insert([
            'name' => "Movie",
            'type' => "1",
        ]);
    }
}
