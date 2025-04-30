<div class="flex justify-center">
    <div class="w-[350px] justify-center">
        <h1 class="text-2xl text-center my-8">Login</h1>
        <form wire:submit="login">
            <flux:input wire:model="email" type="email" label="Email" />
            <flux:input wire:model="password" type="password" label="Password" />
            <div class="flex justify-center">
                <flux:button type="submit" class="mt-5">Login</flux:button>
            </div>
        </form>
        <div class="flex justify-center mt-5">
            <flux:button href="forgot-password" wire:wire:navigate>Forgot Password</flux:button>
        </div>
    </div>
</div>
