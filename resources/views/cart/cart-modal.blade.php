@if (session('cart'))
    <div class="table-responsive cart-modal">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>
                        <i class="fa fa-trash"></i>
                    </th>
                </tr>
            <tbody>
                @foreach (session('cart.items') as $id => $item)
                    <tr>
                        <td>
                            <a href="/product/{{ $item['alias'] }}">
                                <img src="/images/{{ $item['img'] }}" width="100" />
                            </a>
                        </td>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>
                            <a href="{{ route('cart.remove', ['id' => $id]) }}">
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
                    <td colspan="4" class="text-right">{{ session('cart.sum') }}</td>
                </tr>
            </tbody>
            </thead>
        </table>
    </div>
@else
    <h3>Cart is empty</h3>
@endif
