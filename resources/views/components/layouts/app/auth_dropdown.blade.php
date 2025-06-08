<flux:profile
    class="cursor-pointer"
    :initials="auth()->user()->initials()" />
<flux:menu>
    <flux:menu.radio.group>
        <div class="p-0 text-sm font-normal">
            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                <span class="relative flex w-8 h-8 overflow-hidden rounded-lg shrink-0">
                    <span
                        class="flex items-center justify-center w-full h-full text-black rounded-lg bg-neutral-200 dark:bg-neutral-700 dark:text-white">
                        {{ auth()->user()->initials() }}
                    </span>
                </span>

                <div class="grid flex-1 text-sm leading-tight text-start">
                    <span class="font-semibold truncate">{{ auth()->user()->name }}</span>
                    <span class="text-xs truncate">{{ auth()->user()->email }}</span>
                </div>
            </div>
        </div>
    </flux:menu.radio.group>

    <flux:menu.separator />

    <flux:menu.radio.group>
        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
    </flux:menu.radio.group>

    <flux:menu.separator />

    <flux:menu.radio.group>
        <flux:menu.item :href="route('orders.index')" icon="shopping-bag" wire:navigate>{{ __('Orders') }}</flux:menu.item>
    </flux:menu.radio.group>

    <flux:menu.separator />

    <form method="POST" action="{{ route('logout') }}" class="w-full">
        @csrf
        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
            {{ __('Log Out') }}
        </flux:menu.item>
    </form>
</flux:menu>