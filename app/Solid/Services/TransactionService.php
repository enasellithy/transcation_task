<?php

namespace App\Solid\Services;

use App\Solid\Repositories\TransactionRepository;

class TransactionService
{
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }
    public function create($data)
    {
        return $this->transactionRepository->create($data);
    }

    public function edit($id, $data)
    {
        return $this->transactionRepository->edit($id,$data);
    }

    public function delete($id)
    {
        $this->transactionRepository->delete($id);
        return true;
    }

    public function checkDate($id,$date){
        $this->transactionRepository->checkDate($id,$date);
    }
}
