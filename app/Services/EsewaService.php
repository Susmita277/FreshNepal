<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Http;

class EsewaService
{
    private string $merchantCode;
    private string $secretKey;
    private string $paymentUrl;
    private string $verifyUrl;

    public function __construct()
    {
        $this->merchantCode = config('services.esewa.merchant_code');
        $this->secretKey    = config('services.esewa.secret_key');
        $this->paymentUrl   = config('services.esewa.payment_url');
        $this->verifyUrl    = config('services.esewa.verify_url');
    }

    public function generateSignature(string $totalAmount, string $transactionUuid, string $productCode): string
    {
        $message = "total_amount={$totalAmount},transaction_uuid={$transactionUuid},product_code={$productCode}";
        return base64_encode(hash_hmac('sha256', $message, $this->secretKey, true));
    }

    public function getPaymentData(Order $order): array
    {
        $transactionUuid = $order->id . '-' . time();
        $totalAmount     = number_format($order->total_amount, 2, '.', '');
        $signature       = $this->generateSignature($totalAmount, $transactionUuid, $this->merchantCode);

        // Store transaction uuid in order for verification later
        $order->update(['transaction_uuid' => $transactionUuid]);

        return [
            'amount'                     => number_format($order->subtotal, 2, '.', ''),
            'tax_amount'                 => '0',
            'total_amount'               => $totalAmount,
            'transaction_uuid'           => $transactionUuid,
            'product_code'               => $this->merchantCode,
            'product_service_charge'     => '0',
            'product_delivery_charge'    => number_format($order->delivery_charge, 2, '.', ''),
            'success_url'                => route('esewa.success'),
            'failure_url'                => route('esewa.failure'),
            'signed_field_names'         => 'total_amount,transaction_uuid,product_code',
            'signature'                  => $signature,
        ];
    }

    public function verifyPayment(string $encodedData): array
    {
        try {
            $decoded = json_decode(base64_decode($encodedData), true);

            if (!$decoded) {
                return ['success' => false, 'message' => 'Invalid response from eSewa'];
            }

            $transactionUuid = $decoded['transaction_uuid'];
            $orderId         = explode('-', $transactionUuid)[0];
            $order           = Order::find($orderId);

            if (!$order) {
                return ['success' => false, 'message' => 'Order not found'];
            }

            // Verify with eSewa API
            $response = Http::withHeaders([
                'merchantId'     => $this->merchantCode,
                'merchantSecret' => $this->secretKey,
                'Content-Type'   => 'application/json',
            ])->get($this->verifyUrl, [
                'product_code'     => $this->merchantCode,
                'total_amount'     => $decoded['total_amount'],
                'transaction_uuid' => $transactionUuid,
            ]);

            $data = $response->json();

            if (isset($data['status']) && $data['status'] === 'COMPLETE') {
                return [
                    'success'  => true,
                    'order_id' => $orderId,
                    'data'     => $data,
                ];
            }

            return ['success' => false, 'message' => 'Payment not completed', 'data' => $data];

        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function getPaymentUrl(): string
    {
        return $this->paymentUrl;
    }
}