<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Services\CartService;

class ProductDetail extends Component
{
    public $product;
    public $selectedImage;
    public $quantity = 1;
    public $unitType;

    public function mount($slug = null)
    {
        if ($slug) {
            $this->product = Product::with('category')->where('slug', $slug)->first();
        }

        if (!$this->product) {
            abort(404, 'Product not found');
        }

        $this->unitType = $this->product->unit_type;
        $this->quantity = $this->unitType === 'kg' ? 0.5 : 1;
        $this->selectedImage = $this->product->first_image_url;
    }

    public function selectImage($image)
    {
        $this->selectedImage = $image;
    }

    public function increaseQuantity()
    {
        if ($this->unitType === 'kg') {
            $this->quantity = round($this->quantity + 0.5, 1);
        } else {
            $this->quantity = (int)$this->quantity + 1;
        }
    }

    public function decreaseQuantity()
    {
        if ($this->unitType === 'kg') {
            $newQuantity = round($this->quantity - 0.5, 1);
            if ($newQuantity >= 0.5) {
                $this->quantity = $newQuantity;
            }
        } else {
            $newQuantity = (int)$this->quantity - 1;
            if ($newQuantity >= 1) {
                $this->quantity = $newQuantity;
            }
        }
    }

    public function updatedQuantity()
    {
        if ($this->unitType === 'kg') {
            $this->quantity = max(0.5, round($this->quantity * 2) / 2);
        } else {
            $this->quantity = max(1, (int)$this->quantity);
        }
    }

    // FIX: Remove the parameter and use $this->product->id
    public function addToCart()
    {
        $cartService = new CartService();
        $success = $cartService->addToCart($this->product->id, $this->quantity);

        if ($success) {
            $this->dispatch('cartUpdated');
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Product added to cart successfully!'
            ]);
        } else {
            $this->dispatch('toast', [
                'type' => 'error',
                'message' => 'Failed to add product to cart.'
            ]);
        }
    }

    public function buyNow()
    {
        if ($this->product->stock_quantity == 0) {
            $this->dispatch('toast', [
                'type' => 'error',
                'message' => 'Product is out of stock!'
            ]);
            return;
        }

        $this->updatedQuantity();
        $this->addToCart(); // Now this will work without parameters
        return redirect()->route('checkout');
    }

    public function render()
    {
        return view('livewire.product-detail');
    }
}