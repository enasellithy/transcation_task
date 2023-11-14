<?php

namespace App\Solid\Repositories;

use App\Models\Category;
use App\Models\SubCategory;

class CategoryRepository
{
    public function getAll(){
        return Category::latest()->paginate(10);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function edit($id, array $data)
    {
        return Category::where('id',$id)->update($data);
    }

    public function show($id){
        return Category::find($id);
    }

    public function getSubCategory($id){
        return SubCategory::where('category_id',$id)->latest()->get();
    }
}
