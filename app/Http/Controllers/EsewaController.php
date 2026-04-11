<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\EsewaService;
use Illuminate\Http\Request;

class EsewaController extends Controller
{
    public function __construct(private EsewaService $esewa) {}


    public function pay(Request $request)
    {
        $order = Order::findOrFail($request->order_id);

        $paymentData = $this->esewa->getPaymentData($order);
        $paymentUrl  = $this->esewa->getPaymentUrl();

        return view('esewa.pay', compact('paymentData', 'paymentUrl'));
    }

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

            $lastOrder = session()->get('last_order', []);
            $lastOrder['status'] = 'confirmed';
            $lastOrder['payment_method'] = 'Esewa';
            session()->put('last_order', $lastOrder);

            return redirect()->route('order-details')
                ->with('success', 'Payment successful!');
        }

        return redirect()->route('cart')
            ->with('error', 'Payment verification failed.');
    }


    public function failure()
    {
        return redirect()->route('cart')
            ->with('error', 'Payment failed or cancelled. Please try again.');
    }
}
