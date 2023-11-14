<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Transaction\AddTransactionRequest;
use App\Solid\Services\TransactionService;
use App\Solid\Traits\MessageTraits;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use MessageTraits;

    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index()
    {
        return view('transaction.index');
    }

    public function store(AddTransactionRequest $r)
    {
        $item = $this->transactionService->create($r->all());
        $this->transactionService->checkDate($item->id,$r['due_on']);
        $this->done();
        return back();
    }
    public function delete($id)
    {
        $this->transactionService->delete($id);
        $this->done();
        return back();
    }
}
