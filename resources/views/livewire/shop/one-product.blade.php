{{-- <div class="flex justify-between">
    <div class="w-50">
        <h1>{{$product->name}}</h1>
        <img class="max-w-[190px] rounded-lg"
             src={{ asset('images/Apricots.webp') }} alt="">
    </div>
    <div class="w-50">
        <h2>Description:</h2>
        <p>{{$product->description}}</p>
        <p>Price:{{$product->price}}</p>
        <div class="flex items-center gap-4 mb-6">
            <input type="number" wire:model="quantity" min="1" class="w-20 px-3 py-2 border rounded">
            <button wire:click="addToCart" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Добавить в корзину
            </button>
        </div>
        
        @if(session('message'))
            <div class="p-4 bg-green-100 text-green-800 rounded">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div> --}}

<!-- resources/views/livewire/product-show.blade.php -->
<div>
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-1/2">
                <img src={{ asset('images/Apricots.webp') }} alt="{{ $product->name }}" class="w-full rounded-lg">
            </div>
            <div class="md:w-1/2">
                <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                <p class="text-2xl text-white-800 mb-4">{{ $product->price }} $</p>
                <div class="mb-6">
                    {{ $product->description }}
                </div>
                
                <div class="flex items-center gap-4 mb-6">
                    <flux:input type="number" wire:model="quantity" min="1" />
                    <flux:button wire:click="addToCart">Add to basket</flux:button>
                </div>
                
                @if(session('message'))
                    <div class="p-4 bg-green-100 text-green-800 rounded">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
