<?php

namespace App\Http\Livewire\Admin\Posts\Forms;

use App\Http\Livewire\Components\Trix;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Tonysm\RichTextLaravel\Livewire\WithRichTexts;

class CreatePost extends Component
{
    use AuthorizesRequests;
    use WithRichTexts;

    public Post $post;

    public string $date;

    public string $content;

    protected array $rules = [
        'post.title' => 'required|string|max:255',
        'post.perex' => 'nullable|string|max:255',
        'post.slug' => 'required|string|max:255',
        'post.published_at' => 'nullable|date',
    ];

    public $listeners = [
        Trix::EVENT_VALUE_UPDATED // trix_value_updated()
    ];

    public function trix_value_updated($value)
    {
        $this->content = $value;
    }

    public function updatedPostTitle($value): void
    {
        $this->post->slug = $this->post->generateSlug($value);
    }

    public function updatedPostSlug($value): void
    {
        $this->post->slug = $this->post->generateSlug($value);
    }

    public function updatedDate(string $value): void
    {
        $this->post->published_at = $value;
    }

    public function mount()
    {
        $this->authorize('create', Post::class);

        $this->post = new Post();
        $this->content = '';
        $this->date = '';
    }

    public function render()
    {
        return view('livewire.admin.posts.forms.create-post');
    }

    public function save()
    {
        $this->validate();

        $user = Auth::user();
        if ($user === null) {
            return redirect(route('login'));
        }

        if ($this->post->published_at === null) {
            $this->post->published_at = new Carbon();
        }

        $this->post->content = $this->content;
        $this->post->user_id = $user->id;
        $this->post->save();

        return redirect(route('dashboard'));
    }
}
