<div class="flex justify-center">
    <div class="w-[350px] justify-center">
        <h1 class="text-2xl text-center my-8">Reset password</h1>
        <form wire:submit="forgotPassword">
            <flux:input wire:model="email" type="email" label="Email" />
            <div class="flex justify-center">
                <flux:button type="submit" class="mt-5">Reset</flux:button>
            </div>
        </form>
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
