<div>
    <h1 class="text-2xl font-bold mb-6">Basket</h1>
    <form wire:submit="store">
    @if(Cart::count() > 0)
        <div class="space-y-4">
            @foreach($cartItems as $item)
                <div class="flex items-center border p-4 rounded-lg">
                    <div class="flex-shrink-0 w-20">
                        <img src="{{ $item->options->image }}" alt="{{ $item->name }}" class="w-full rounded">
                    </div>
                    <div class="ml-4 flex-grow">
                        <h3 class="text-lg font-medium">{{ $item->name }}</h3>
                        <p class="text-white-600">{{ $item->price }} $ × {{ $item->qty }}</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button wire:click="decreaseQuantity('{{ $item->rowId }}')" class="px-2 py-1 border rounded">
                            -
                        </button>
                        <span>{{ $item->qty }}</span>
                        <button wire:click="increaseQuantity('{{ $item->rowId }}')" class="px-2 py-1 border rounded">
                            +
                        </button>
                        <button wire:click="removeItem('{{ $item->rowId }}')" class="text-red-500 hover:text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
            
            <div class="border-t pt-4">
                <div class="flex justify-between mb-2">
                    <span>Subtotal:</span>
                    <span>{{ $subtotal }} $</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Tax:</span>
                    <span>{{ $tax }} $</span>
                </div>
                <div class="flex justify-between font-bold text-lg">
                    <span>Total:</span>
                    <span>{{ $total }} $</span>
                </div>
            </div>
            
            <div class="pt-4">
                <flux:button type="submit" class="w-100">Send</flux:button>
            </div>
        </div>
        </form>
        @if (session()->has('message'))
    <div>{{ session('message') }}</div>
@endif
    @else
        <div class="text-center py-12">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <h3 class="mt-2 text-lg font-medium text-white-900">Your basket is empty</h3>
            <p class="mt-1 text-gray-500">Please, add products to continue shopping</p>
            <flux:button href="/product">Return to shop</flux:button>
        </div>
    @endif
</div>