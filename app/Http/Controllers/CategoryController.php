<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Category\AddCategoryRequest;
use App\Http\Requests\Admin\Category\EditCategoryRequest;
use App\Http\Resources\API\SubCategoryResource;
use App\Solid\Services\CategoryService;
use App\Solid\Traits\JSONTraits;
use App\Solid\Traits\MessageTraits;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use MessageTraits, JSONTraits;

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return view('category.index');
    }

    public function store(AddCategoryRequest $r)
    {
        $this->categoryService->create($r->all());
        $this->done();
        return back();
    }

    public function show($id)
    {
        $data = SubCategoryResource::collection($this->categoryService->getSubCat($id));
        return $this->whenDone($data);
    }

    public function update($id, EditCategoryRequest $r)
    {
        $this->categoryService->edit($id, $r->only('name'));
        $this->done();
        return back();
    }

    public function delete($id)
    {
        $this->categoryService->delete($id);
        $this->done();
        return back();
    }
}
