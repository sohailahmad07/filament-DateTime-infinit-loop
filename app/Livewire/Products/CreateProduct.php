<?php

namespace App\Livewire\Products;

use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateProduct extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('period_of_time')
                ->debounce()
                ->prefixIcon('heroicon-o-clock')
                ->suffix('Hrs')
                ->afterStateUpdated(function (string $state, Forms\Set $set) {
                    $set('date', now()->addHours((int)$state));
                })
                ->required(),
            Forms\Components\DateTimePicker::make('date')
                ->lazy()
                ->native(false),

        ])->statePath('data');
    }

    public function render(): View
    {
        return view('livewire.products.create-product');
    }
}
