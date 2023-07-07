<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ActivityTable extends DataTableComponent
{
    protected $model = Activity::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        $query = Activity::query();
        if (Auth::user()->hasAnyRole('member')) {
            $query
                ->where([
                    'user_id' => Auth::user()->id
                ]);
        }
        return $query; // Select some things
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Action")
                ->label(function ($row, $column) {
                    return view('activity.action', ['activity' => $row]);
                }),
            Column::make("Title", "title")
                ->sortable(),
            Column::make("Project", "project.nama")
                ->sortable(),
            Column::make("Status", "status.nama")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
