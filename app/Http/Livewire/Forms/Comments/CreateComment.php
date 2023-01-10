<?php

namespace App\Http\Livewire\Forms\Comments;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateComment extends Component
{
    use AuthorizesRequests;

    public Post $post;

    public Comment $comment;

    protected array $rules = [
        'comment.content' => 'required|string',
    ];

    public function mount(Post $post)
    {
        $this->authorize('create', Comment::class);

        $this->comment = new Comment();
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.forms.comments.create-comment');
    }

    public function save()
    {
        $this->authorize('create', Comment::class);

        $user = Auth::user();
        if ($user === null) {
            $this->redirect(route('login'));
        }

        $this->comment->user_id = $user->id;
        $this->comment->post_id = $this->post->id;
        $this->comment->save();

        return redirect()->back();
    }
}
