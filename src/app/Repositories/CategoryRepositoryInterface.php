<?php


namespace App\Repositories;



use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function getParentCategories(): ?Collection;
    public function getSubCategories(int $categoryId): ?Collection;
}
