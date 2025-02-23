<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Thank you for your order!</h4>
                    <p>Your order has been successfully placed. We will contact you at your email:
                        {{ request('email') }}.</p>
                    <hr>
                    <p class="mb-0">Order ID: {{ request('order_id') }}</p>
                </div>
            </div>
        </div>
    </div>
    @if (request('wasLoggedIn'))
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Successfully logged in!</h4>
                        <p>
                            You have successfully logged in. You can now view your order history and manage your account.
                        </p>
                        <hr>
                        <p class="mb-0">
                            <a href="{{ route('user.orders') }}" class="btn btn-primary">Go to orders page</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-layout>
