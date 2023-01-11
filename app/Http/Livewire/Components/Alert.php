<?php

namespace App\Http\Livewire\Components;


use Livewire\Component;

class Alert extends Component
{
    protected $listeners = ['withMessage'];

    private string $type = '';
    private string $message= '';

    public function render()
    {
        $data = [
            'type' => $this->type,
            'message' => $this->message,
        ];

        return view('livewire.components.alert', $data);
    }

    public function withMessage(string $type, string $message): void
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function resetMessage(): void
    {
        $this->type = '';
        $this->message = '';
    }
}
