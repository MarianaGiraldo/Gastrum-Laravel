<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return votype
     */
    public function run()
    {
        Category::Create([
            'type' => 'A',
            'value' => 25000
        ]);
        Category::Create([
            'type' => 'B',
            'value' => 28000
        ]);
        Category::Create([
            'type' => 'C',
            'value' => 30000
        ]);
    }
}
