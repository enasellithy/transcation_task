<?php

namespace App\Solid\Services;

use App\Models\Category;
use App\Solid\Repositories\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function create($data)
    {
        return $this->categoryRepository->create($data);
    }

    public function edit($id, $data)
    {
        return $this->categoryRepository->edit($id,$data);
    }

    public function delete($id)
    {
        $user = Category::findOrFail($id);
        $user->delete();
        return true;
    }

    public function getSubCat($id){
        return $this->categoryRepository->getSubCategory($id);
    }
}
