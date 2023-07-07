<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Project;

class ProjectTable extends DataTableComponent
{
    protected $model = Project::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Action")
                ->label(function ($row, $column) {
                    return view('project.action', ['project' => $row]);
                }),
            Column::make("Kode", "kode")
                ->sortable(),
            Column::make("Nama", "nama")
                ->sortable(),
            Column::make("Client", "client")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
