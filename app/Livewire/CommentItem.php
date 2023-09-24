<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Component;



class CommentItem extends Component
{
    public function render()
    {
        return view('livewire.comment-item');
    }

    public bool  $editing = false;
    public bool  $replying = false;

    public Comment $comment;



    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function deleteComment()
    {

        $user = auth()->user();
        if (!$user) {

            return redirect('/login');
        }

        if ($this->comment->user_id != $user->id) {
            return response('you are not allowed to this action', 403);
        }

        $this->comment->delete();
        $this->dispatch('comment-delete', commentId: $this->comment->id);
    }


    public function editComment()
    {
        $this->editing = true;
    }

    #[On('cancel-editing')]
    public function cancelEditing()
    {
        $this->editing = false;
        $this->replying = false;
    }

    #[On('comment-update')]
    public function commentUpdated()
    {
        $this->editing = false;
    }


    public function startReply()
    {
        $this->replying = true;
    }

    #[On('comment-create')]
    public function commentCreated()
    {
        $this->replying = false;
    }
}
