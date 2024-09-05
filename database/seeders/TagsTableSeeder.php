<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            [
                'nombre' => 'PHP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Laravel',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
