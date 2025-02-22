<!--top-header-->
<div class="top-header">
    <div class="container">
        <div class="top-header-main">
            <div class="col-md-6 top-header-left">

                <div class="drop">
                    <x-currency-selector />



                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-6 top-header-left">
                @auth
                    <span>Welcome, {{ auth()->user()->name }}!</span>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @else
                    <a href="/login">Login</a>
                    <a href="/register">Registration</a>
                @endauth

                <div class="cart box_1 js-cart-button">
                    <a href="#">
                        <div class="total">
                            <span class="simpleCart_total"></span>
                        </div>
                        <img src="/images/cart-1.png" alt="" />
                    </a>

                    <p><a href="javascript:;" class="simpleCart_empty js-cart-header-sum">
                            @if (session('cart'))
                                {{ session('cart')['currency']['symbol_left'] }}
                                {{ session('cart')['sum'] }}
                            @else
                                Cart is empty
                            @endif
                        </a></p>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--top-header-->
