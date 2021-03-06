<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class MallCart extends Component
{
    public $cartItems = [];
    
    protected $listeners = ['cartUpdated' => 'onCartUpdate'];

    public function mount()
    {
        $this->cartItems = Cart::session(auth()->id())->getContent()->toArray();
    }

    public function onCartUpdate($type ,$msg)
    {
        session()->flash($type, $msg);
        $this->mount();
    }

    public function render()
    {
        return view('livewire.mall-cart');
    }
}
