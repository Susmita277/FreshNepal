<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\CartService;

class Cart extends Component
{
    public $cartItems = [];
    public $groupedCart = [];
    public $subtotal = 0;
    public $total = 0;
    public $itemCount = 0;
    public $shippingCost = 50;

    protected $listeners = ['cart-updated' => 'updateCart'];
    public function increaseQuantity($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $current = $cart[$productId]['quantity'];
            $this->updateQuantity($productId, round(($current + 0.5) * 10) / 10);
        }
    }

    public function decreaseQuantity($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $current = $cart[$productId]['quantity'];
            $new = round(($current - 0.5) * 10) / 10;

            if ($new < 1) return; // minimum is 1, do nothing

            $this->updateQuantity($productId, $new);
        }
    }

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        $cartService = new CartService();
        $this->cartItems = $cartService->getCart();
        $this->groupedCart = $cartService->getGroupedCart();
        $this->subtotal = $cartService->getTotal();
        $this->total = $this->subtotal + $this->shippingCost;
        $this->itemCount = $cartService->getItemCount();
    }

    public function updateQuantity($productId, $quantity)
    {
        if ($quantity < 1) {
            $this->removeFromCart($productId);
            return;
        }

        $cartService = new CartService();
        $cartService->updateQuantity($productId, $quantity);
        $this->updateCart();
    }

    public function removeFromCart($productId)
    {
        $cartService = new CartService();
        $cartService->removeFromCart($productId);
        $this->updateCart();

        session()->flash('success', 'Product removed from cart.');
    }

    public function clearCart()
    {
        $cartService = new CartService();
        $cartService->clearCart();
        $this->updateCart();

        session()->flash('success', 'Cart cleared.');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
