<flux:dropdown>
    <flux:button icon:trailing="chevron-down">Welcome</flux:button>

    <flux:menu>
        <flux:menu.item icon="plus">
            <flux:link :href="route('register')">Create Account</flux:link>
        </flux:menu.item>
        <flux:menu.item icon="user">
            <flux:link :href="route('login')">Sign in</flux:link>
        </flux:menu.item>
        <!--
        <flux:menu.separator />

        <flux:menu.submenu heading="Sort by">
            <flux:menu.radio.group>
                <flux:menu.radio checked>Name</flux:menu.radio>
                <flux:menu.radio>Date</flux:menu.radio>
                <flux:menu.radio>Popularity</flux:menu.radio>
            </flux:menu.radio.group>
        </flux:menu.submenu>

        <flux:menu.submenu heading="Filter">
            <flux:menu.checkbox checked>Draft</flux:menu.checkbox>
            <flux:menu.checkbox checked>Published</flux:menu.checkbox>
            <flux:menu.checkbox>Archived</flux:menu.checkbox>
        </flux:menu.submenu>

        <flux:menu.separator />

        <flux:menu.item variant="danger" icon="trash">Delete</flux:menu.item>
        -->
    </flux:menu>
</flux:dropdown>