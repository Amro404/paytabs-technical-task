<?php


namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        $categories = Category::factory()->count(5)->create();

        foreach ($categories as $category) {

            $subCategories = Category::factory()
                ->count(3)
                ->create(['parent_id' => $category->id]);

            foreach ($subCategories as $subCategory) {
                Category::factory()
                    ->count(3)
                    ->create(['parent_id' => $subCategory->id]);
            }
        }
    }
}
