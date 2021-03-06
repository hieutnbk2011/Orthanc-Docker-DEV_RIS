<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\User;
use App\Models\Patients\Patients;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SearchPatients extends TableComponent
{
    use HtmlComponents;

    public function query() : Builder
    {
        return Patients::with('last');

    }

    public function columns() : array
    {
        return [
            Column::make('ID')
                ->searchable()
                ->sortable(),
            Column::make('Last')
                ->format(function(Patients $model) {
                    return $this->html('<strong>Test</strong>');
                }),
//             Column::make('Name')
//                 ->searchable()
//                 ->sortable(),
//             Column::make('E-mail', 'email')
//                 ->searchable()
//                 ->sortable()
//                 ->format(function(User $model) {
//                     return $this->mailto($model->email, null, ['target' => '_blank']);
//                 }),
//             Column::make('Role', 'role.name')
//                 ->searchable()
//                 ->sortable(),
//             Column::make('Permissions')
//                 ->sortable()
//                 ->format(function(User $model) {
//                     return $this->html('<strong>'.$model->permissions_count.'</strong>');
//                 }),
//             Column::make('Actions')
//                 ->format(function(User $model) {
//                     return view('backend.auth.user.includes.actions', ['user' => $model]);
//                 })
//                 ->hideIf(auth()->user()->cannot('do-this')),
        ];
    }
}
