<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;

class CartService
{
    public function addToCart($productId, $quantity = 1)
    {
        $cart = session()->get('cart', []);

        // Eager load the vendor relationship with proper error handling
        $product = Product::with('vendor')->find($productId);

        if (!$product) {
            return false;
        }

        // Get vendor name with better fallback
        $vendorName = 'Fresh Nepal';
        
        if ($product->vendor) {
            $vendorName = $product->vendor->name;
        } else {
            // If vendor relationship fails, try to get vendor directly
            $vendor = User::find($product->user_id);
            if ($vendor) {
                $vendorName = $vendor->name;
            }
        }

        // Check if product already in cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->first_image_url,
                'unit_type' => $product->unit_type,
                'vendor_id' => $product->user_id,
                'vendor_name' => $vendorName, // Use the determined vendor name
                'stock_quantity' => $product->stock_quantity
            ];
        }

        session()->put('cart', $cart);
        return true;
    }

    // ... keep the rest of your methods the same ...
    public function updateQuantity($productId, $quantity)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
            return true;
        }

        return false;
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return true;
        }

        return false;
    }

    public function getCart()
    {
        return session()->get('cart', []);
    }

    public function getGroupedCart()
    {
        $cart = $this->getCart();
        $grouped = [];

        foreach ($cart as $item) {
            $vendorId = $item['vendor_id'];
            if (!isset($grouped[$vendorId])) {
                $grouped[$vendorId] = [
                    'vendor_name' => $item['vendor_name'],
                    'items' => []
                ];
            }
            $grouped[$vendorId]['items'][] = $item;
        }

        return $grouped;
    }

    public function getTotal()
    {
        $cart = $this->getCart();
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }

    public function getItemCount()
    {
        return count($this->getCart());
    }

    public function clearCart()
    {
        session()->forget('cart');
    }

    public function getCartCount()
    {
        $cart = $this->getCart();
        $totalItems = 0;

        foreach ($cart as $item) {
            $totalItems += $item['quantity'];
        }

        return $totalItems;
    }
}