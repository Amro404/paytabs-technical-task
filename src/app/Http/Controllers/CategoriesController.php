<?php


namespace App\Http\Controllers;

use App\Services\CategoryServiceInterface;
use Illuminate\View\View;

class CategoriesController extends Controller
{

    private CategoryServiceInterface $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): View
    {
        $categories = $this->categoryService->getParentCategories();
        return view('categories.index', compact('categories'));
    }

}
