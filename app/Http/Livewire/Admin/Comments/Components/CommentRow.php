<?php

namespace App\Http\Livewire\Admin\Comments\Components;

use App\Http\Livewire\WithMessage;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CommentRow extends Component
{
    use AuthorizesRequests;
    use WithMessage;

    public Comment $comment;

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function render()
    {
        return view('livewire.admin.comments.components.comment');
    }

    public function restore(int $id)
    {
        $this->authorize('restore', $this->comment);

        $this->comment->restore();

        $this->withMessage('success', __('Comment was restored!'));
    }

    public function toggleStatus(bool $publish = false)
    {
        $this->authorize('toggleStatus', $this->comment);

        $this->comment->status = $publish ? Comment::STATUS_PUBLISHED : Comment::STATUS_DRAFT;

        $this->comment->save();

        $this->withMessage('success', __('Comment status was change!'));
    }
}
