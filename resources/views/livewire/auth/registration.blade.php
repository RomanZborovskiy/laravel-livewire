<div class="flex justify-center">   
    <div class="w-[350px] justify-center">
        <h1 class="text-2xl text-center my-8">Registration</h1>
        <form wire:submit="save">
            <flux:input wire:model="name" type="text" label="Name" />
            <flux:input wire:model="email" type="email" label="Email" />
            <flux:input wire:model="password" type="password" label="Password" />
            <div class="flex justify-center">
                <flux:button type="submit" class="mt-5">Create new user</flux:button>
            </div>
        </form>
    </div>
</div>
