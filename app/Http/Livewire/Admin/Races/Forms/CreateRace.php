<?php

namespace App\Http\Livewire\Admin\Races\Forms;

use App\Http\Livewire\Components\Trix;
use App\Models\Race;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Tonysm\RichTextLaravel\Livewire\WithRichTexts;

class CreateRace extends Component
{
    use AuthorizesRequests;
    use WithRichTexts;

    public Race $race;

    public string $content;

    public string $date;

    protected array $rules = [
        'race.name' => 'required|string|max:255',
        'race.slug' => 'required|string|max:255',
    ];

    public $listeners = [
        Trix::EVENT_VALUE_UPDATED // trix_value_updated()
    ];

    public function trix_value_updated($value)
    {
        $this->content = $value;
    }

    public function updatedRaceName($value): void
    {
        $this->race->slug = $this->race->generateSlug($value);
    }

    public function updatedRaceSlug($value): void
    {
        $this->race->slug = $this->race->generateSlug($value);
    }

    public function mount()
    {
        $this->authorize('create', Race::class);

        $this->race = new Race();
        $this->content = '';
        $this->date = '';
    }

    public function render()
    {
        return view('livewire.admin.races.forms.create-race');
    }

    public function save()
    {
        $this->authorize('create', Race::class);

        $this->validate();

        $user = Auth::user();
        if ($user === null) {
            return redirect(route('login'));
        }

        $this->race->description = $this->content;
        $this->race->race_date = $this->date;
        $this->race->user_id = $user->id;
        $this->race->save();

        return redirect(route('admin.races.index'));
    }
}
