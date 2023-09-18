<x-app-layout>

    <x-slot name="header">

        <h1>
            <a href="/tweets">
                <img src="/images/logo.svg" alt="Tweety">
            </a>
        </h1>

    </x-slot>

    <div>
        <x-twitter.public-tweet-panel />

        <x-twitter.time-line :tweets="$tweets" />
    </div>
</x-app-layout>
