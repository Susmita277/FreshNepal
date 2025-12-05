<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
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
        return true;
        // $cartService = new CartService();
        // $success = $cartService->addToCart($productId);

        // if ($success) {
            // Emit event to update header
            // $this->dispatch('cartUpdated');

            // // Show toast notification
            // $this->dispatch('toast', [
            //     'type' => 'success',
            //     'message' => 'Product added to cart successfully!'
            // ]);
        // } else {
            // $this->dispatch('toast', [
            //     'type' => 'error',
            //     'message' => 'Failed to add product to cart.'
            // ]);
        // }
    }

    public function render()
    {
        return view('livewire.home');
    }
}
