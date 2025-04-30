<div>
    <div class="flex flex-wrap">
        @foreach ($products as $product)
        <div class="min-w-[220px] bg-[#0F172B] rounded-lg">
            <a href="{{ route('one-product', $product->id) }}" wire:navigate>
                <h1>{{$product->name}}</h1>
            <img class="max-w-[190px] rounded-lg"
             src={{ asset('images/Apricots.webp') }} alt="">
            <div>
                <p>{{$product->price}} $</p>
            </div>
            </a>
        </div>
        @endforeach

    </div>
    {{ $products->links('vendor.livewire.simple-bootstrap') }}
</div>
