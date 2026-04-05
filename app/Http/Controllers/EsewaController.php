<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\EsewaService;
use Illuminate\Http\Request;

class EsewaController extends Controller
{
    public function __construct(private EsewaService $esewa) {}

    // Redirect to eSewa payment page
 
    public function pay(Request $request)
    {
        $order = Order::findOrFail($request->order_id); // this returns Order model ✓

        $paymentData = $this->esewa->getPaymentData($order); // pass model not array
        $paymentUrl  = $this->esewa->getPaymentUrl();

        return view('esewa.pay', compact('paymentData', 'paymentUrl'));
    }

    // eSewa calls this on success
    public function success(Request $request)
    {
        $encodedData = $request->data;

        $result = $this->esewa->verifyPayment($encodedData);

        if ($result['success']) {
            $order = Order::find($result['order_id']);
            $order->update([
                'status'         => 'confirmed',
                'payment_method' => 'Esewa',
            ]);

            session()->put('last_order', [
                'order_id' => $order->id,
                'total'    => $order->total_amount,
                'status'   => 'confirmed',
            ]);

            return redirect()->route('order-details')
                ->with('success', 'Payment successful!');
        }

        return redirect()->route('cart')
            ->with('error', 'Payment verification failed.');
    }

    // eSewa calls this on failure
    public function failure()
    {
        return redirect()->route('cart')
            ->with('error', 'Payment failed or cancelled. Please try again.');
    }
}
