<div class="border border-gray-300 rounded-lg">
    @forelse ($tweets as $tweet)
        <x-twitter.tweet :tweet="$tweet" :loop="$loop" />
    @empty
        <p class="p-4">No tweets yet.</p>
    @endforelse

    {{ $tweets->links() }}
</div>
