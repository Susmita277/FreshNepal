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
            // Create the order in DB
            $order = \App\Models\Order::create([
                'user_id'          => Auth::id(),
                'subtotal'         => $this->subtotal,
                'total_amount'     => $this->total,
                'delivery_charge'  => $this->deliveryCharge,
                'status'           => 'pending',
                'delivery_address' => $this->area,
                'city'             => $this->city,
                'area'             => $this->area,
                'payment_method'   => 'Cash on Delivery',
                'order_date'       => now(),
            ]);

            // Save order items
            foreach ($this->cartItems as $item) {
                \App\Models\OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item['product_id'],
                    'user_id'    => $item['vendor_id'], // vendor_id stored as user_id
                    'quantity'   => $item['quantity'],
                    'price'      => $item['price'],
                ]);
            }

            // Save to session for order confirmation page
            session()->put('last_order', [
                'order_id'     => $order->id,
                'user_name'    => Auth::user()->name,
                'city'         => $this->city,
                'area'         => $this->area,
                'subtotal'     => $this->subtotal,
                'total'        => $this->total,
                'delivery_charge' => $this->deliveryCharge,
                'status'       => 'pending',
                'order_date'   => now()->format('Y-m-d H:i:s'),
                'cart_items'   => $this->cartItems,
            ]);

            // Clear cart
            $this->cartService->clearCart();

            return redirect()->route('order-details');
        } catch (\Exception $e) {
            logger('Order placement error: ' . $e->getMessage());
            session()->flash('error', 'Failed to place order. Please try again.');
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
