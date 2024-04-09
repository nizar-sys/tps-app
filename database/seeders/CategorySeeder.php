<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'nama_kategori' => 'Kategori 1',
            ],
            [
                'nama_kategori' => 'Kategori 2',
            ],
            [
                'nama_kategori' => 'Kategori 3',
            ],
            [
                'nama_kategori' => 'Kategori 4',
            ],
            [
                'nama_kategori' => 'Kategori 5',
            ],
        ];
        Category::insert($categories);
    }
}
