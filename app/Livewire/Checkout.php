<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Services\CartService;

class Checkout extends Component
{
    public $city = '';
    public $area = '';
    public $deliveryCharge = 0;
    public $subtotal = 0;
    public $total = 0;
    public $cartItems = [];

    protected $cartService;

    protected $rules = [
        'city' => 'required',
        'area' => 'required',
    ];

    protected $messages = [
        'city.required' => 'Please enter your city.',
        'area.required' => 'Please enter your area.',
    ];

    public function boot(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function mount()
    {
        if (!Auth::check()) {
            return redirect()->route('user-login');
        }

        $this->cartItems = $this->cartService->getCart();
        if (empty($this->cartItems)) {
            session()->flash('error', 'Your cart is empty.');
            return redirect()->route('cart');
        }

        $this->calculateTotals();
    }

    public function placeOrder()
    {
        $this->validate();

        try {
            logger('Starting order placement for user: ' . Auth::id());

            // Save order data to session
            $orderData = [
                'user_id' => Auth::id(),
                'user_name' => Auth::user()->name,
                'city' => $this->city,
                'area' => $this->area,
                'subtotal' => $this->subtotal,
                'total' => $this->total,
                'delivery_charge' => $this->deliveryCharge,
                'status' => 'confirmed',
                'order_date' => now()->format('Y-m-d H:i:s'),
                'cart_items' => $this->cartItems,
                'total_items' => $this->getTotalItems()
            ];

            // Save to session
            session()->put('last_order', $orderData);
            session()->save(); // Force save
            
            logger('Order data saved to session');

            // Clear cart
            $this->cartService->clearCart();
            return redirect()->route('order-details');
        
            // Use Livewire redirect
            return $this->redirectRoute('order-details',$orderData);

            
        } catch (\Exception $e) {
            logger('Order placement error: ' . $e->getMessage());
            session()->flash('error', 'Failed to place order. Please try again: ' . $e->getMessage());
        }
    }

    private function calculateTotals()
    {
        $this->subtotal = 0;

        foreach ($this->cartItems as $item) {
            $this->subtotal += $item['price'] * $item['quantity'];
        }

        $this->deliveryCharge = 0;
        $this->total = $this->subtotal;
    }

    public function getTotalItems()
    {
        return array_sum(array_column($this->cartItems, 'quantity'));
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}