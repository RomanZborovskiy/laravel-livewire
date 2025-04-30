<div class="flex justify-center">
    <div>
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    </div>
    <div class="w-[350px] justify-center">
        <form wire:submit="create">
            <flux:input wire:model="name" type="text" label="Product name" />
            <flux:input wire:model="price" type="number" label="Price" />           
            <flux:input wire:model="image" type="text" label="Image" />
            <flux:textarea class="mb-3" wire:model="description"
                label="Description"
            />
            <flux:checkbox wire:model="status" label="Is this product in stock?" />
            <flux:button class="mt-3" type="submit">Button</flux:button>
        </form>
    </div>
</div>
