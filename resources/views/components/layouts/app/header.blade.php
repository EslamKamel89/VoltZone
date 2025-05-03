<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light" data-theme="pastel">

<head>
    @include('partials.head')
</head>

<body class="flex flex-col min-h-screen bg-white dark:bg-zinc-800">
    <flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <a href="{{ route('home') }}" class="flex items-center space-x-2 ms-2 me-5 rtl:space-x-reverse lg:ms-0" wire:navigate>
            <x-app-logo />
        </a>
        <div class="flex justify-end w-full mx-4">
            <flux:navbar class="-mb-px max-lg:hidden">

                <flux:navbar.item icon="home" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
                    {{'Home' }}
                </flux:navbar.item>
                <flux:navbar.item icon="rectangle-group" :href="route('categories.index')" :current="request()->routeIs('categories.index')" wire:navigate>
                    {{'Categories' }}
                </flux:navbar.item>
                <flux:navbar.item icon="fire" :href="route('home')" :current="request()->routeIs('homee')" wire:navigate>
                    {{'Products' }}
                </flux:navbar.item>
                <flux:navbar.item icon="shopping-cart" :href="route('home')" :current="request()->routeIs('homee')" wire:navigate>
                    {{'Cart' }}
                </flux:navbar.item>
            </flux:navbar>
        </div>

        <flux:spacer />

        <flux:navbar class="me-1.5 space-x-0.5 rtl:space-x-reverse py-0!">
            <!--
            <flux:tooltip :content="__('Search')" position="bottom">
                <flux:navbar.item class="!h-10 [&>div>svg]:size-5" icon="magnifying-glass" href="#" :label="__('Search')" />
            </flux:tooltip>
            <flux:tooltip :content="__('Repository')" position="bottom">
                <flux:navbar.item
                    class="h-10 max-lg:hidden [&>div>svg]:size-5"
                    icon="folder-git-2"
                    href="https://github.com/laravel/livewire-starter-kit"
                    target="_blank"
                    :label="__('Repository')" />
            </flux:tooltip>
            <flux:tooltip :content="__('Documentation')" position="bottom">
                <flux:navbar.item
                    class="h-10 max-lg:hidden [&>div>svg]:size-5"
                    icon="book-open-text"
                    href="https://laravel.com/docs/starter-kits"
                    target="_blank"
                    label="Documentation" />
            </flux:tooltip>
        -->
        </flux:navbar>

        <!-- Desktop User Menu -->
        <flux:dropdown position="top" align="end">
            @auth
            @include('components.layouts.app.auth_dropdown')
            @endauth
            @guest
            @include('components.layouts.app.guest_dropdown')
            @endguest
        </flux:dropdown>
    </flux:header>

    <!-- Mobile Menu -->
    <flux:sidebar stashable sticky class="border-r lg:hidden border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a wire:navigate href="{{ route('home') }}" class="flex items-center space-x-2 ms-1 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">

            <flux:navlist.group :heading="__('Platform')">
                <flux:navlist.item icon="home" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
                    {{ 'Home' }}
                </flux:navlist.item>
                <flux:navlist.item icon="rectangle-group" :href="route('categories.index')" :current="request()->routeIs('categories.index')" wire:navigate>
                    {{ 'Categories' }}
                </flux:navlist.item>
                <flux:navlist.item icon="fire" :href="route('home')" :current="request()->routeIs('homee')" wire:navigate>
                    {{ 'Products' }}
                </flux:navlist.item>
                <flux:navlist.item icon="shopping-cart" :href="route('home')" :current="request()->routeIs('homee')" wire:navigate>
                    {{ 'Cart' }}
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>
        <!--
<flux:spacer />

<flux:navlist variant="outline">
    <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
        {{ __('Repository') }}
    </flux:navlist.item>

    <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank">
        {{ __('Documentation') }}
    </flux:navlist.item>
</flux:navlist>
-->
    </flux:sidebar>
    <div class="flex-1">

        {{ $slot }}
    </div>
    @include('components.layouts.app.footer')

    @fluxScripts
</body>

</html>