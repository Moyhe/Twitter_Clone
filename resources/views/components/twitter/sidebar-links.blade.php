<ul>
    <li>
        <a class="font-bold text-lg mb-4 block" href="{{ route('home') }}">
            Home
        </a>
    </li>

    <li>
        <a class="font-bold text-lg mb-4 block" href="/explore">
            Explore
        </a>
    </li>

    @auth
        <li>
            <a class="font-bold text-lg mb-4 block" href="{{ auth()->user()->path() }}">
                Profile
            </a>
        </li>

        <li>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </li>
    @endauth
</ul>
