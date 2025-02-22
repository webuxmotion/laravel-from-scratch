<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Thank you for your order!</h4>
                    <p>Your order has been successfully placed. We will contact you at your email: {{ request('email') }}.</p>
                    <hr>
                    <p class="mb-0">Order ID: {{ request('order_id') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>