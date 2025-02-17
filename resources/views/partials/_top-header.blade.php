<!--top-header-->
<div class="top-header">
    <div class="container">
        <div class="top-header-main">
            <div class="col-md-6 top-header-left">

                <div class="drop">
                    <x-currency-selector />

                    <div class="box1">
                        <select tabindex="4" class="dropdown">
                            <option value="" class="label">English :</option>
                            <option value="1">English</option>
                            <option value="2">French</option>
                            <option value="3">German</option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-6 top-header-left">
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
