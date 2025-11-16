<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product as ProductModel;
use App\Models\Category;
use App\Services\CartService;

class Product extends Component
{
    public $selectedCategories = [];
    public $priceSort = '';
    public $search = '';
    public $categories;

    public function mount()
    {
        // Get all categories for filter options
        $this->categories = Category::whereHas('products', function ($query) {
            $query->where('status', 'available');
        })->get();
    }
  
    public function addToCart($productId)
    {
        $cartService = new CartService();
        $success = $cartService->addToCart($productId);

        if ($success) {
            // Emit event to update header
            $this->dispatch('cartUpdated');

            // Show toast notification
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

    public function updatedSelectedCategories()
    {
        // This will automatically refresh when categories change
    }

    public function updatedPriceSort()
    {
        // This will automatically refresh when price sort changes
    }

    public function updatedSearch()
    {
        // This will automatically refresh when search changes
    }

    public function clearFilters()
    {
        $this->selectedCategories = [];
        $this->priceSort = '';
        $this->search = '';
    }

    public function getProductsProperty()
    {
        $query = ProductModel::with('category')
            ->where('status', 'available')
            ->where('stock_quantity', '>', 0);

        // Apply category filter
        if (!empty($this->selectedCategories)) {
            $query->whereIn('category_id', $this->selectedCategories);
        }

        // Apply search filter
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhereHas('category', function ($categoryQuery) {
                        $categoryQuery->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        }

        // Apply price sorting
        if ($this->priceSort) {
            if ($this->priceSort === 'high_to_low') {
                $query->orderBy('price', 'desc');
            } elseif ($this->priceSort === 'low_to_high') {
                $query->orderBy('price', 'asc');
            }
        } else {
            // Default sorting
            $query->orderBy('created_at', 'desc');
        }

        return $query->get();
    }

    public function render()
    {
        return view('livewire.product', [
            'products' => $this->products
        ]);
    }
}
