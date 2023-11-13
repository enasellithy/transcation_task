<?php

namespace App\Http\Livewire;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SubCategoryTable extends DataTableComponent
{
    protected $model = SubCategory::class;
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
            Column::make('Name', "name")
                ->searchable()
                ->sortable(),
            Column::make('Category', "category.name")
                ->searchable()
                ->sortable(),
            Column::make('action', "id")
                ->view('sub_category.btn.action')
                ->searchable()
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        return SubCategory::with('category')->select('*');
    }
}
