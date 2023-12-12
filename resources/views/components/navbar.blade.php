<div class="flex items-center">
    <a href="{{ route('postcreation') }}"></a>
</div>
<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('postcreation')" :active="request()->routeIs('postcreation')">
    {{ __('Creer mon post') }}
    </x-nav-link>
</div>