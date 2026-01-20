<!DOCTYPE html>
<html>

<head>
    <title>Pay Now</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<body>
 
    <h2>Pay for Order #{{ $order->id }}</h2>
    <p><strong>Product:</strong> {{ $order->product_name }}</p>
    <h2>Pay ₹{{ $order->amount }}</h2>

    <button id="pay-btn">Pay Now</button>

    <form id="razorpay-form" method="POST" action="{{ route('payment.success') }}">
        @csrf
        <input type="hidden" name="razorpay_order_id">
        <input type="hidden" name="razorpay_payment_id">
        <input type="hidden" name="razorpay_signature">
    </form>

    <script>
        var options = {
            "key": "{{ config('services.razorpay.key') }}",
            "amount": "{{ $order->amount * 100 }}",
            "currency": "INR",
            "name": "My Store",
            "description": "Order #{{ $order->id }}",
            "order_id": "{{ $razorpayOrder['id'] }}",
            "handler": function(response) {
                document.querySelector('[name=razorpay_order_id]').value = response.razorpay_order_id;
                document.querySelector('[name=razorpay_payment_id]').value = response.razorpay_payment_id;
                document.querySelector('[name=razorpay_signature]').value = response.razorpay_signature;
                document.getElementById('razorpay-form').submit();
            }
        };

        var rzp = new Razorpay(options);
        document.getElementById('pay-btn').onclick = function(e) {
            rzp.open();
            e.preventDefault();
        }
    </script>

</body>

</html>
