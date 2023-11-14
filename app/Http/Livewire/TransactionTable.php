<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TransactionTable extends DataTableComponent
{
    protected $model = Transaction::class;
    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPage'];

    public function resetPage($pageName = 'page')
    {
        $rowsPropertyData = $this->getRows()->toArray();
        $prevPageNum = $rowsPropertyData['current_page'] - 1;
        $prevPageNum = $prevPageNum > 0 ? $prevPageNum : 1;
        $pageNum = count($rowsPropertyData['data']) > 0 ? $rowsPropertyData['current_page'] : $prevPageNum;

        $this->setPage($pageNum, $pageName);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("id", "id"),
            Column::make('amount', "amount")
                ->searchable()
                ->sortable(),
            Column::make('category', "category.name")
                ->searchable()
                ->sortable(),
            Column::make('sub category', "subCategory.name")
                ->searchable()
                ->sortable(),
            Column::make('payer', "payer")
                ->searchable()
                ->sortable(),
            Column::make('due_on', "due_on")
                ->searchable()
                ->sortable(),
            Column::make('Vat inclusive', "vat_in_inclusive")
                ->searchable()
                ->sortable(),
            Column::make('vat', "vat")
                ->searchable()
                ->sortable(),
            Column::make('status', "status")
                ->searchable()
                ->sortable(),
            Column::make('action', "id")
                ->view('transaction.btn.action')
                ->searchable()
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        return Transaction::with(['category','subCategory'])->latest()->select('*');
    }
}
