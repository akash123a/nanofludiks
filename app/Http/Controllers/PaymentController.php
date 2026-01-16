<?php
namespace App\Http\Controllers;

use Razorpay\Api\Api;
use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{
   public function show(Order $order)
{
    $api = new Api(
        config('services.razorpay.key'),
        config('services.razorpay.secret')
    );

    $razorpayOrder = $api->order->create([
        'receipt'  => 'order_' . $order->id,
        'amount'   => $order->amount * 100, // paise
        'currency' => 'INR'
    ]);

    $order->update([
        'razorpay_order_id' => $razorpayOrder['id']
    ]);

    return view('payment.payment', compact('order', 'razorpayOrder'));
}


    public function success(Request $request)
    {
        $api = new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );

        try {
            $api->utility->verifyPaymentSignature([
                'razorpay_order_id'   => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature'  => $request->razorpay_signature
            ]);

            $order = Order::where('razorpay_order_id', $request->razorpay_order_id)->first();

            $order->update([
                'payment_id'     => $request->razorpay_payment_id,
                'payment_method' => 'razorpay',
                'status'         => 'paid'
            ]);

            return redirect()->route('user.dashboard')
                ->with('success', 'Payment Successful 🎉');

        } catch (\Exception $e) {
            return redirect()->route('user.dashboard')
                ->with('error', 'Payment Failed ❌');
        }
    }
}
