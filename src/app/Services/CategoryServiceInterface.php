<?php


namespace App\Services;


use Illuminate\Support\Collection;

interface CategoryServiceInterface
{
    public function getParentCategories(): ?Collection;
    public function getSubCategories(int $categoryId): array;
}
