<?php


namespace App\Services;


use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getParentCategories(): ?Collection
    {
        return $this->categoryRepository->getParentCategories();
    }
    public function getSubCategories(int $categoryId): array
    {
        return $this->categoryRepository->getSubCategories($categoryId)->toArray();
    }
}
