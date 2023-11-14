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
        $item = Transaction::create($data);
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

    public function checkDate($date, $id){
        if($date == '2021-01-10'){
            Transaction::where('id',$id)->update(['status' => 'Overdue']);
        }elseif($date == '2022-01-12'){
            Transaction::where('id',$id)->update(['status' => 'Outstanding']);
        }
        else{
            Transaction::where('id',$id)->update(['status' => 'Paid']);
        }
    }
}
