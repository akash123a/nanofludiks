<!DOCTYPE html>
<html>

<head>
    <title>Payment</title>
</head>

<body>

    <h2>Pay for Order #{{ $order->id }}</h2>

    <p><strong>Product:</strong> {{ $order->product_name }}</p>
    <p><strong>Amount:</strong> ₹{{ $order->amount ?? 'Not Set' }}</p>

    <hr>

    <form action="{{ route('payment.success') }}" method="POST">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order->id }}">

        <!-- Razorpay payment id will come here later -->
        <input type="hidden" name="razorpay_payment_id" value="TEST123">

        <button type="submit">Pay with Razorpay</button>
    </form>

</body>

</html>
