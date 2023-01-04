<?php

namespace App\Http\Livewire\Admin\Posts\Forms;

use App\Http\Livewire\Components\Trix;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdatePost extends Component
{
    use AuthorizesRequests;

    public Post $post;

    public string $date;

    protected array $rules = [
        'post.title' => 'required|string|max:255',
        'post.perex' => 'nullable|string|max:255',
        'post.slug' => 'required|string|max:255',
        'post.published_at' => 'nullable|date',
    ];

    public $listeners = [
        Trix::EVENT_VALUE_UPDATED
    ];

    public function trix_value_updated($value)
    {
        $this->post->content = $value;
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

    public function mount(Post $post)
    {
        $this->authorize('update', Post::class);

        $this->post = $post;
        $this->date = $post->published_at->toDatetimeString();
    }

    public function render()
    {
        return view('livewire.admin.posts.forms.update-post');
    }

    public function update()
    {
        $this->authorize('update', Post::class);

        $this->validate();

        $user = Auth::user();
        if ($user === null) {
            return redirect(route('login'));
        }

        $this->post->save();

        return redirect(route('dashboard'));
    }
}
