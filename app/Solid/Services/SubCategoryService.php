<?php

namespace App\Solid\Services;

use App\Models\SubCategory;
use App\Solid\Repositories\SubCategoryRepository;

class SubCategoryService
{
    private $subCategoryRepository;

    public function __construct(SubCategoryRepository $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
    }
    public function create($data)
    {
        return $this->subCategoryRepository->create($data);
    }

    public function edit($id, $data)
    {
        return $this->subCategoryRepository->edit($id,$data);
    }

    public function delete($id)
    {
        $user = SubCategory::findOrFail($id);
        $user->delete();
        return true;
    }
}
