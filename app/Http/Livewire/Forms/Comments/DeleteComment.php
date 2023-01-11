<?php

namespace App\Http\Livewire\Forms\Comments;

use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class DeleteComment extends Component
{
    use AuthorizesRequests;

    public Comment $comment;

    public function mount(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $this->comment = $comment;
    }

    public function render()
    {
        return view('livewire.forms.comments.delete-comment');
    }

    public function delete()
    {
        $this->authorize('delete', $this->comment);

        $post = $this->comment->post;

        $this->comment->delete();

        return redirect(route('article.detail', $post))
            ->with('success', trans('Comment was created!'));
    }
}
