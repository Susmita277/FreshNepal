<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderView extends Component
{
    public $orderId;
    public $order;

    public function mount($orderId)
    {
        // Make sure user can only view their own orders
        $this->order = Order::with(['items.product', 'user'])
            ->where('user_id', Auth::id())
            ->where('id', $orderId)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.order-view');
    }
}