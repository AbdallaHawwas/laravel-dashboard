<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder;
use Redot\LivewireDatatable\Action;
use Redot\LivewireDatatable\Column;
use Redot\LivewireDatatable\Datatable;

class AdminTable extends Datatable
{
    /**
     * Create button.
     */
    public string|bool $create = 'admins.create';

    /**
     * Query builder.
     */
    public function query(): Builder
    {
        return Admin::whereNotCurrentAdmin();
    }

    /**
     * Data table columns.
     */
    public function columns(): array
    {
        return [
            Column::make('')
                ->width('50px')
                ->resolve(fn ($admin) => view('components.avatar', ['user' => $admin])),
            Column::make(__('Name'), 'name')
                ->searchable()
                ->sortable(),
            Column::make(__('Role'))
                ->resolve(fn ($admin) => $admin->getRoleNames()->first()),
            Column::make(__('Email'), 'email')
                ->format(fn ($email) => "<a href=\"mailto:$email\">$email</a>")
                ->searchable()
                ->sortable(),
            Column::make(__('Created At'), 'created_at')
                ->format(fn ($date) => $date->format('d M Y'))
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
            Action::edit('admins.edit')->can('admins.edit'),
            Action::delete('admins.destroy')->can('admins.destroy'),
        ];
    }
}
