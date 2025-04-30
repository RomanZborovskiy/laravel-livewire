<div>
    <div>
        <h1 class="text-2xl text-center my-8">Verify Email Address "{{$email}}"</h1>
        <p class="text-center my-8">Click the button below if you don't have a message</p>
        <form class="text-center my-8" wire:submit="verificationNotification">
            <flux:button type="submit">Verification link sent!</flux:button>
        </form>
        <div>
            @if(session('message'))
            <div class="alert alert-success text-center ">
        {{ session('message') }}
            </div>
        @endif
        </div>
    </div>
</div>
