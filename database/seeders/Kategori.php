<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kategori extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Penginapan',
                'slug' => 'penginapan',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Camping',
                'slug' => 'camping',
                'created_at' => now(),
            ],
        ];

        DB::table('categories')->insert($data);
    }
}
