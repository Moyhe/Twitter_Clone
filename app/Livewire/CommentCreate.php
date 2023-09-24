<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Tweet;
use Livewire\Component;

class CommentCreate extends Component
{

    public string $comment = '';

    public  Tweet $tweet;
    public ?Comment $commentModel = null;
    public ?Comment $parentComment = null;


    public function mount(Tweet $tweet,  $commentModel = null, $parentComment = null)
    {
        $this->tweet = $tweet;
        $this->commentModel = $commentModel;
        $this->comment = $commentModel ? $commentModel->comment : '';
        $this->parentComment = $parentComment;
    }


    public function createComment()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect('/login');
        }

        if ($this->commentModel) {

            if ($this->commentModel->user_id != $user->id) {
                return response('You are not allowed to perform this action', 403);
            }

            $this->commentModel->comment = $this->comment;
            $this->commentModel->save();
            $this->comment = '';
            $this->dispatch('comment-update')->to(CommentItem::class);
        } else {
            $comment = Comment::create([
                'comment' => $this->comment,
                'tweet_id' => $this->tweet->id,
                'user_id' => $user->id,
                'parent_id' => $this->parentComment?->id
            ]);

            $this->dispatch('comment-create', commentId: $comment->id);
            $this->comment = '';
        }
    }

    public function render()
    {
        return view('livewire.comment-create');
    }
}
