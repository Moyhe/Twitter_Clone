<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Tweet;
use Livewire\Component;

class Comments extends Component
{

    protected $listeners = [
        'comment-create' => '$refresh',
        'comment-delete' => '$refresh',
    ];

    public Tweet $tweet;

    public function mount(Tweet $tweet)
    {
        $this->tweet = $tweet;
    }

    public function render()
    {
        $comments = $this->selectComments();
        return view('livewire.comments', compact('comments'));
    }

    public function selectComments()
    {
        return Comment::query()
            ->with(['tweet', 'user', 'comments'])
            ->whereNull('parent_id')
            ->where('tweet_id', '=', $this->tweet->id)
            ->orderByDesc('created_at')
            ->get();
    }
}
