<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use App\Models\Category;


class CategoriesTest extends TestCase
{
    use DatabaseMigrations;

    public function test_can_view_a_list_of_parent_categories(): void
    {
        Category::factory()->count(5)->create();

        $response = $this->get('categories');

        $response->assertResponseOk();
    }

    public function test_can_view_a_list_of_sub_categories(): void
    {
        $category = Category::factory()->create();

        $subCategory1 = Category::factory()->create(['parent_id' => $category->id]);
        $subCategory2 = Category::factory()->create(['parent_id' => $category->id]);

        $response = $this->get("categories/{$category->id}/sub");
        $response->assertResponseOk();
        $response->seeJsonContains([
            [
                'id' => $subCategory2->id,
                'name' => $subCategory2->name
            ]
        ]);
        $response->seeJsonContains([
            [
                'id' => $subCategory1->id,
                'name' => $subCategory1->name
            ]
        ]);

    }

}
