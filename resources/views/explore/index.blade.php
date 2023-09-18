<x-app-layout>

    <x-slot name="header">

        <h1>
            <a href="/tweets">
                <img src="/images/logo.svg" alt="Tweety">
            </a>
        </h1>

    </x-slot>

    <x-explore :users="$users" />

</x-app-layout>
