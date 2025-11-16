<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderDetails extends Component
{
    public $orderData = [];
    public $cartItems = [];
    
    public function mount()
    {
        // Get order data from session
        $this->orderData = session()->get('last_order', []);
        
        // Get cart items from order data
        $this->cartItems = $this->orderData['cart_items'] ?? [];
        
        // If no order data, redirect to products
        if (empty($this->orderData)) {
            session()->flash('error', 'No order found. Please place an order first.');
            return redirect()->route('products');
        }
    }

    public function render()
    {
        return view('livewire.order-details', [
            'orderData' => $this->orderData,
            'cartItems' => $this->cartItems
        ]);
    }
}