<?php

namespace App\Livewire\Shop;

use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Http;


class Basket extends Component
{
    public $status ='true';
    protected $listeners = ['cartUpdated' => '$refresh'];

    public function store(){
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'total_price' => Cart::total(2, '.', ''),
            'status' => $this->status,
       
        ]);
        foreach (Cart::content() as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty,
                'price' => $item->price,
            ]);
    }
    $this->sendTelegramMessage();

    session()->flash('message', 'Заказ отправлен!');
    Cart::destroy();

    return redirect('/');

    }
    public function sendTelegramMessage()
    {
        $token = '8192772425:AAGcYkf3qkRaFVma2FxscjctjlR5HfDcXrA';
        $chat_id = '384586711';
        $name = Auth::user()->name;
        $total_price = Cart::total();
        $message = "📦 New order:\n\n👤 Name:{$name} \n";

        $total = 0;
        foreach (Cart::content() as $item) {
            if (!empty($item->id) ) {
                $message .= "-Product:{$item->name}\n";
                $message .= "-Price:{$item->price}\n";
                $message .= "-Quantity:{$item->qty}\n\n";
            }
        }
        $message .= "-Total:{$total_price}\n";

        Http::get("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chat_id,
            'text' => $message,
        ]);
    }
    public function increaseQuantity($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty + 1);
    }
    
    public function decreaseQuantity($rowId)
    {
        $item = Cart::get($rowId);
        if ($item->qty > 1) {
            Cart::update($rowId, $item->qty - 1);
        }
    }
    
    public function removeItem($rowId)
    {
        Cart::remove($rowId);
    }

    public function render()
    {       
        return view('livewire.shop.basket'
        , [
            'cartItems' => Cart::content(),
            'subtotal' => Cart::subtotal(),
            'tax' => Cart::tax(),
            'total' => Cart::total()]
            )->layout('layouts.app');
    }
}
