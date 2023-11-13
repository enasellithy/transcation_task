<?php

namespace App\Solid\Repositories;

use App\Models\SubCategory;

class SubCategoryRepository
{
    public function getAll(){
        return SubCategory::latest()->paginate(10);
    }

    public function create(array $data)
    {
        return SubCategory::create($data);
    }

    public function edit($id, array $data)
    {
        return SubCategory::where('id',$id)->update($data);
    }

    public function show($id){
        return SubCategory::find($id);
    }
}
