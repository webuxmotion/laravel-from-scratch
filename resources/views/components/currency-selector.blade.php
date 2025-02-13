<div class="box">
    <form action="{{ route('currency.change') }}" method="POST">
        <select class="dropdown drop" name="currency" id="currency" onchange="this.form.submit();">
            @foreach ($currencies as $currency)
                <option value="{{ $currency->code }}" {{ $currency->code == $selectedCurrency->code ? 'selected' : '' }}>
                    {{ $currency->code }}: {{ $currency->symbol_left }}
                </option>
            @endforeach
        </select>
    </form>
</div>


