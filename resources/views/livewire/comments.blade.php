<div>

    <livewire:comment-create :tweet="$tweet" />

    @foreach ($comments as $comment)
        <livewire:comment-item :comment="$comment"
            wire:key="comment-{{ $comment->id }}-{{ $comment->comments->count() }}" />
    @endforeach

</div>
