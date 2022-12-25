<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Trix extends Component
{
    public const EVENT_VALUE_UPDATED = 'trix_value_updated';

    public string $value;
    public string $trixId;

    public function mount(string $value = ''): void
    {
        $this->value = $value;
        $this->trixId = 'trix-' . uniqid('', true);
    }

    public function render()
    {
        return view('livewire.components.trix');
    }

    public function updatedValue($value){
        $this->emit(self::EVENT_VALUE_UPDATED, $this->value);
    }
}
