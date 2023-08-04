<?php


namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{
    private string $table = 'categories';

    public function getParentCategories(): ?Collection
    {
        return DB::table($this->table)
            ->select(['id', 'name'])
            ->whereNull('parent_id')->get();
    }

    public function getSubCategories(int $categoryId): ?Collection
    {
        return DB::table($this->table)
            ->select(['id', 'name'])
            ->where('parent_id', $categoryId)->get();
    }
}
