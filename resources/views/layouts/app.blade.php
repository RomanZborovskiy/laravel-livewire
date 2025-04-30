<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire SPA</title>
    @livewireStyles
    @fluxAppearance
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
        <flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
        <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Acme Inc." class="max-lg:hidden dark:hidden" />
        <flux:brand href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Acme Inc." class="max-lg:hidden! hidden dark:flex" />
        <flux:navbar class="-mb-px max-lg:hidden">
            <flux:navbar.item icon="home" href="/" wire:navigate >Home</flux:navbar.item>
            <flux:navbar.item icon="inbox" href="/product" wire:wire:navigate >Product</flux:navbar.item>
            <flux:navbar.item icon="document-text" href="/login" wire:wire:navigate>Login</flux:navbar.item>
            <flux:navbar.item icon="calendar" href="#">Calendar</flux:navbar.item>
            <flux:separator vertical variant="subtle" class="my-2"/>
            <flux:dropdown class="max-lg:hidden">
                <flux:navbar.item icon:trailing="chevron-down">Favorites</flux:navbar.item>
                <flux:navmenu>
                    <flux:navmenu.item href="/" wire:wire:navigate>Marketing site</flux:navmenu.item>
                    <flux:navmenu.item href="/about" wire:wire:navigate>Android app</flux:navmenu.item>
                    <flux:navmenu.item href="#">Brand guidelines</flux:navmenu.item>
                </flux:navmenu>
            </flux:dropdown>
        </flux:navbar>
        <flux:spacer />
        <flux:navbar class="me-4">
            <flux:navbar.item icon="magnifying-glass" href="#" label="Search" />
            <flux:navbar.item class="max-lg:hidden" icon="cog-6-tooth" href="#" label="Settings" />
            <flux:navbar.item class="max-lg:hidden" icon="information-circle" href="#" label="Help" />
            @livewire('shop.basket-icon')
        </flux:navbar>
        @auth
        <flux:dropdown position="top" align="start">
            <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />
            <flux:menu>
                <flux:menu.radio.group>
                    <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                    <flux:menu.radio>Truly Delta</flux:menu.radio>
                </flux:menu.radio.group>
                <flux:menu.separator />
                <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
            </flux:menu>
        </flux:dropdown>
        <flux:button variant="danger" href="/logout" >Logout</flux:button>
        @endauth
        @guest
        <flux:button href="/registration" wire:wire:navigate class="mr-4">Registration</flux:button>
        <flux:button href="/login" variant="primary" wire:wire:navigate>Login</flux:button>
        @endguest
    </flux:header>
    <main class="container mx-auto py-4 px-10">
        {{ $slot }}
    </main>

    @livewireScripts
    @fluxScripts
</body>
</html>