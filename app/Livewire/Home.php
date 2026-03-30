<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Services\CartService;
use Usernotnull\Toast\Concerns\WireToast;

class Home extends Component
{

    use WireToast;

    public $categoriesWithProducts;

    public function mount()
    {
        // Get ALL categories that have products
        $this->categoriesWithProducts = Category::with(['products' => function ($query) {
            $query->where('status', 'available')
                ->orderBy('created_at', 'desc')
                ->limit(10); // Limit products per category
        }])
            ->whereHas('products', function ($query) {
                $query->where('status', 'available');
            })
            ->orderBy('name')
            ->get();
    }
    public function addToCart($productId)
    {
        $cartService = new CartService();
        $status = $cartService->addToCart($productId);

        if ($status === 'added') {
            $this->dispatch('cartUpdated');
            $this->dispatch('toast', ['type' => 'success', 'message' => 'Product added to cart successfully!']);
        } elseif ($status === 'exists') {
            $this->dispatch('toast', ['type' => 'exists', 'message' => 'Already in cart!']);
        } else {
            $this->dispatch('toast', ['type' => 'error', 'message' => 'Failed to add product to cart.']);
        }
    }

    public function render()
    {
        return view('livewire.home');
    }
}
