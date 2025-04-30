<div class="flex justify-center">
    <div class="w-[350px] justify-center">
        <h1 class="text-2xl text-center my-8">Create new password</h1>
        <form wire:submit="resetPassword">
            <flux:input wire:model="email" type="email" label="Email" />
            <flux:input wire:model="password" type="password" label="Password" />
            <flux:button type="submit">Button</flux:button>
        </form>
    </div>
</div>
