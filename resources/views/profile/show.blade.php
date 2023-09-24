<x-app-layout>

    <x-slot name="header">
        <h1>
            <a href="/tweets">
                <img src="/images/logo.svg" alt="Tweety">
            </a>
        </h1>
    </x-slot>

    <header class="mb-6 relative">
        <div class="relative">
            <img src="/images/cover.jpg" alt="" class="mb-2 w-full h-72">

            <img src="{{ $user->thumbnail }}" alt=""
                class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" style="left: 50%"
                width="150">
        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @can('update', $user)
                    <a href="{{ $user->editProfile() }}"
                        class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">
                        Edit Profile
                    </a>
                @endcan

                <x-twitter.follow-button :user="$user" />
            </div>
        </div>

        <p class="text-sm">
            The name’s Bugs. Bugs Bunny. Don’t wear it out. Bugs is an anthropomorphic gray
            and white rabbit or hare who is famous for his flippant, insouciant personality.
            He is also characterized by a Brooklyn accent, his portrayal as a trickster,
            and his catch phrase "Eh...What's up, doc?"
        </p>


    </header>

    <x-twitter.time-line :tweets="$tweets" />

</x-app-layout>
