@props(['tweet', 'loop'])

<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ $tweet->user->path() }}">
            <img src="{{ $tweet->user->thumbnail }}" alt="" class="rounded-full mr-2" width="50" height="50">
        </a>
    </div>

    <div class="w-full h-auto">
        <h5 class="font-bold mb-2">
            <a href="{{ $tweet->user->path() }}">
                {{ $tweet->user->name }}
            </a>
        </h5>

        <p class="text-sm mb-3">
            {{ $tweet->content }}
        </p>

        @if ($tweet->thumbnail)
            <div>
                <img src="{{ $tweet->path() }}" alt="" class="mb-2 w-full h-auto rounded object-fit">
            </div>
        @endif

        @auth
            <x-twitter.like-buttons :tweet="$tweet" />
        @endauth

        <livewire:comments :tweet="$tweet" />

    </div>
</div>
