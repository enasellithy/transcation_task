<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\SubCategory\AddSubCategoryRequest;
use App\Http\Requests\Admin\SubCategory\EditSubCategoryRequest;
use App\Solid\Services\SubCategoryService;
use App\Solid\Traits\MessageTraits;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    use MessageTraits;

    protected $subCategoryService;

    public function __construct(SubCategoryService $subCategoryService)
    {
        $this->subCategoryService = $subCategoryService;
    }

    public function index()
    {
        return view('sub_category.index');
    }

    public function store(AddSubCategoryRequest $r)
    {
        $this->subCategoryService->create($r->all());
        $this->done();
        return back();
    }

    public function update($id, EditSubCategoryRequest $r)
    {
        $this->subCategoryService->edit($id, $r->only('name', 'category_id'));
        $this->done();
        return back();
    }

    public function delete($id)
    {
        $this->subCategoryService->delete($id);
        $this->done();
        return back();
    }
}
