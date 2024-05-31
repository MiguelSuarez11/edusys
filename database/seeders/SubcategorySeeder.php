<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subcategory::create(['category_id' => 1, 'name' => 'Mobile Phones']);
        Subcategory::create(['category_id' => 1, 'name' => 'Laptops']);
        Subcategory::create(['category_id' => 2, 'name' => 'Fiction']);
        Subcategory::create(['category_id' => 2, 'name' => 'Non-fiction']);
    }
}
