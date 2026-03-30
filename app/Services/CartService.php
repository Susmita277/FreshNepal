<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;

class CartService
{
    public function addToCart($productId, $quantity = 0.5)
    {
        $cart = session()->get('cart', []);

        $product = Product::with('vendor')->find($productId);

        if (!$product) {
            return 'error';
        }

        $vendorName = 'Fresh Nepal';

        if ($product->vendor) {
            $vendorName = $product->vendor->name;
        } else {
            $vendor = User::find($product->user_id);
            if ($vendor) {
                $vendorName = $vendor->name;
            }
        }

        if (isset($cart[$productId])) {
            session()->put('cart', $cart);
            return 'exists'; // already in cart
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
                'vendor_name' => $vendorName,
                'stock_quantity' => $product->stock_quantity
            ];
            session()->put('cart', $cart);
            return 'added';
        }
    }

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
        return count($this->getCart());
    }
}
