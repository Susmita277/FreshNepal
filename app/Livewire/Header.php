<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\CartService;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
    public $cartCount = 0;
    public $searchQuery = '';
    public $showSearchDropdown = false;
    public $searchResults = [];

    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public function mount()
    {
        $this->updateCartCount();
    }

    public function updateCartCount()
    {
        $cartService = new CartService();
        $this->cartCount = $cartService->getCartCount();
    }

    // public function logout()
    // {
    //     auth()->logout();
    //     session()->invalidate();
    //     session()->regenerateToken();
    //     return redirect('/');
    // }

    public function updatedSearchQuery()
    {
        if (strlen($this->searchQuery) >= 2) {
            $this->showSearchDropdown = true;
            $this->performSearch();
        } else {
            $this->showSearchDropdown = false;
            $this->searchResults = [];
        }
    }

    public function performSearch()
    {
        try {
            $results = Product::where('name', 'like', '%' . $this->searchQuery . '%')
                ->where('status', 'active')
                ->select('id', 'name', 'price', 'first_image_url', 'unit_type')
                ->limit(8)
                ->get();

            $this->searchResults = $results->map(function($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->first_image_url ?? 'https://via.placeholder.com/80',
                    'unit_type' => $product->unit_type,
                ];
            })->toArray();

        } catch (\Exception $e) {
            $this->searchResults = [];
        }
    }

    public function viewProduct($productId)
    {
        $this->resetSearch();
        return redirect()->route('product-details', ['product' => $productId]);
    }

    public function resetSearch()
    {
        $this->searchQuery = '';
        $this->showSearchDropdown = false;
        $this->searchResults = [];
    }

    public function closeSearchDropdown()
    {
        $this->showSearchDropdown = false;
    }

    public function render()
    {
        return view('livewire.header');
    }
}