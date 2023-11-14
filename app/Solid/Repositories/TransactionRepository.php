<?php

namespace App\Solid\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    public function getAll(){
        return Transaction::with(['category','subCategory'])->latest()->paginate(10);
    }

    public function create(array $data)
    {
        return Transaction::create($data);
    }

    public function edit($id, array $data)
    {
        return Transaction::where('id',$id)->update($data);
    }

    public function show($id){
        return Transaction::find($id);
    }

    public function delete($id){
        return Transaction::find($id)->delete();
    }
}
