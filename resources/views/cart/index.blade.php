<x-layout>
    <div class="ckeck-top heading">
        <h2>CHECKOUT</h2>
    </div>
    <div class="container js-cart-page">
        <div class="js-cart-items">
            {{ $html }}
        </div>
        <div class="col-xs-6" style="padding-bottom: 50px;">
            <h3>Contact Information</h3>
            <form action="/cart/checkout" method="POST">
                @csrf

                @guest
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email">Email:</label>
                        <input value="{{ old('email') }}" type="email" class="form-control" id="email" name="email"
                            required>

                        @if ($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password">Password:</label>
                        <input value="{{ old('password') }}" type="password" class="form-control" id="password" name="password" required>
                    
                        @if ($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                @endguest

                <div class="form-group">
                    <label for="comment">Comment to Order:</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3">{{ old('comment') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Confirm</button>
            </form>
        </div>

    </div>

</x-layout>
