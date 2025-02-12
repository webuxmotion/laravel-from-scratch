<div class="currency-widget">
    <form action="{{ route('currency.change') }}" method="POST">

        
        <select name="currency" id="currency" onchange="this.form.submit()">
            @foreach ($currencies as $currency)
                <option value="{{ $currency->code }}" {{ $currency->code == $selectedCurrency ? 'selected' : '' }}>
                    {{ $currency->title }} ({{ $currency->code }})
                </option>
            @endforeach
        </select>
    </form>
</div>


