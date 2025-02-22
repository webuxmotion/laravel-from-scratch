@if (session('cart'))
    <!-- clear cart button, align right -->
    <div class="text-right">
        <a href="#" class="js-clear-cart">Clear cart</a>
    </div>
    <div class="table-responsive cart-modal">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>
                        
                    </th>
                </tr>
            <tbody>
                @foreach (session('cart.items') as $id => $item)
                    <tr>
                        <td>
                            <a href="/products/{{ $item['alias'] }}">
                                <img src="/images/{{ $item['img'] }}" width="100" />
                            </a>
                        </td>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>
                            <a href="#" class="js-delete-cart-item" data-id="{{ $id }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td>Total quantity:</td>
                    <td colspan="4" class="text-right">{{ session('cart.quantity') }}</td>
                </tr>
                <tr>
                    <td>Total price:</td>
                    <td colspan="4" class="text-right js-cart-modal-sum">{{ session('cart.sum') }}</td>
                </tr>
            </tbody>
            </thead>
        </table>
    </div>
@else
    <h3>Cart is empty</h3>
@endif
