<?php

namespace App\Http\Livewire\Admin\Posts\Forms;

use App\Http\Livewire\Components\Trix;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class CreatePost extends Component
{
    use AuthorizesRequests;

    public Post $post;

    protected array $rules = [
        'post.title' => 'required|string|max:255',
        'post.perex' => 'nullable|string|max:255',
        'post.slug' => 'required|string|max:255',
        'post.published_at' => 'nullable|datetime',
        'post.state' => 'required|in:draft,publish',
    ];

    public $listeners = [
        Trix::EVENT_VALUE_UPDATED // trix_value_updated()
    ];

    public function trix_value_updated($value)
    {
        $this->post->content = $value;
    }

    public function updatedPostTitle($value): void
    {
        $this->post->slug = Str::slug($value, "-");
    }

    public function updatedPostSlug($value): void
    {
        $this->post->slug = Str::slug($value, "-");
    }

    public function mount()
    {
        $this->authorize('create', Post::class);

        $this->post = new Post();
    }

    public function render()
    {
        $data = [
            'states' => Post::STATES,
        ];

        return view('livewire.admin.posts.forms.create-post', $data);
    }

    public function save()
    {
        $this->validate();

        $user = Auth::user();
        if ($user === null) {
            return redirect(route('login'));
        }

        $this->post->user_id = $user->id;
        $this->post->save();

        return redirect(route('dashboard'));
    }

}
