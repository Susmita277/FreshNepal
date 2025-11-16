<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\CartService;

class Cart extends Component
{
    public $cartItems = [];
    public $groupedCart = [];
    public $total = 0;
    public $itemCount = 0;

    protected $listeners = ['cart-updated' => 'updateCart'];

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        $cartService = new CartService();
        $this->cartItems = $cartService->getCart();
        $this->groupedCart = $cartService->getGroupedCart();
        $this->total = $cartService->getTotal();
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