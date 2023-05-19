<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Redot\LivewireDatatable\Action;
use Redot\LivewireDatatable\Column;
use Redot\LivewireDatatable\Datatable;
use Spatie\Permission\Models\Role;

class RoleTable extends DataTable
{
    /**
     * Create button.
     */
    public string|bool $create = 'roles.create';

    /**
     * Query builder.
     */
    public function query(): Builder
    {
        return Role::query();
    }

    /**
     * Data table columns.
     */
    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'name')
                ->searchable()
                ->sortable(),
        ];
    }

    /**
     * Data table actions.
     */
    public function actions(): array
    {
        return [
            Action::edit('roles.edit'),
            Action::delete('roles.destroy'),
        ];
    }
}
