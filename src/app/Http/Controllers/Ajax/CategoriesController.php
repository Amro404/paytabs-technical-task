<?php


namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Services\CategoryServiceInterface;
use Illuminate\Http\JsonResponse;

class CategoriesController extends Controller
{

    private CategoryServiceInterface $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function subCategories(int $categoryId): JsonResponse
    {
        $categories = $this->categoryService->getSubCategories($categoryId);
        return response()->json($categories);
    }

}

