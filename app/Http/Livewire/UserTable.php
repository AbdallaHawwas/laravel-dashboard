<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Redot\LivewireDatatable\Action;
use Redot\LivewireDatatable\Column;
use Redot\LivewireDatatable\Datatable;

class UserTable extends Datatable
{
    /**
     * Query builder.
     */
    public function query(): Builder
    {
        return User::query();
    }

    /**
     * Data table columns.
     */
    public function columns(): array
    {
        return [
            Column::make(__('First Name'), 'first_name')
                ->searchable()
                ->sortable(),
            Column::make(__('Last Name'), 'last_name')
                ->searchable()
                ->sortable(),
            Column::make(__('Email'), 'email')
                ->format(fn ($email) => "<a href=\"mailto:$email\">$email</a>")
                ->searchable()
                ->sortable(),
            Column::make(__('Verified'), 'email_verified_at')
                ->format(fn ($date) => $date ? $date->format('d M Y') : 'Not Verified')
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
            Action::delete('dashboard.users.destroy')->can('dashboard.users.destroy'),
        ];
    }
}
