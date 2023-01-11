<?php

namespace App\Http\Livewire\Forms\Comments;

use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class UpdateComment extends Component
{
    use AuthorizesRequests;

    public Comment $comment;

    public string $content;

    protected array $rules = [
        'content' => 'required|string',
    ];

    public function mount(Comment $comment)
    {
        $this->authorize('update', $comment);

        $this->comment = $comment;
        $this->content = html_entity_decode($comment->content);
    }

    public function render()
    {
        return view('livewire.forms.comments.update-comment');
    }

    public function update()
    {
        $this->authorize('update', $this->comment);

        $post = $this->comment->post;

        $this->comment->content = htmlspecialchars($this->content);
        $this->comment->save();

        return redirect(route('article.detail', $post))
            ->with('success', trans('Comment was updated!'));
    }
}
