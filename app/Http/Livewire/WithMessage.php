<?php

declare(strict_types=1);


namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;

trait WithMessage
{
    public function withMessage(string $type, string $message)
    {
        $this->emit('withMessage', $type, $message);
    }
}
