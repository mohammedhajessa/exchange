@extends('frontend.master.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">تصريف العملات</h5>
                <div class="card-body">
                    <form action="{{ route('exchanges.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">العملة المرسلة</label>
                                <select name="from_currency" id="from_currency" class="form-select" required>
                                    <option value="">اختر العملة</option>
                                    @foreach($currencies as $currency)
                                        <option value="{{ $currency->id }}" data-rate="{{ $currency->exchange_rate }}" data-name="{{ $currency->name }}">
                                            {{ $currency->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">العملة المستلمة</label>
                                <select name="to_currency" id="to_currency" class="form-select" required>
                                    <option value="">اختر العملة</option>
                                    @foreach($currencies as $currency)
                                        <option value="{{ $currency->id }}" data-rate="{{ $currency->exchange_rate }}" data-name="{{ $currency->name }}">
                                            {{ $currency->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">المبلغ المرسل</label>
                                <input type="number" step="0.0" name="amount_from" id="amount_from" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">المبلغ المستلم</label>
                                <input type="number" step="0.0" name="amount_to" id="amount_to" class="form-control" readonly>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                            <input type="hidden" name="fees" id="fees">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fromCurrency = document.getElementById('from_currency');
    const toCurrency = document.getElementById('to_currency');
    const amountFrom = document.getElementById('amount_from');
    const amountTo = document.getElementById('amount_to');

    async function getExchangeRate(from, to) {
        try {
            const response = await fetch(`https://api.exchangerate-api.com/v4/latest/${from}`);
            const data = await response.json();
            return data.rates[to];
        } catch (error) {
            console.error('Error fetching exchange rate:', error);
            return null;
        }
    }

    async function calculateExchange() {
        if (fromCurrency.value && toCurrency.value && amountFrom.value) {
            const fromRate = parseFloat(fromCurrency.selectedOptions[0].dataset.rate);
            const toRate = parseFloat(toCurrency.selectedOptions[0].dataset.rate);
            const amount = parseFloat(amountFrom.value);
            const fromCurrencyName = fromCurrency.selectedOptions[0].dataset.name;
            const toCurrencyName = toCurrency.selectedOptions[0].dataset.name;

            if (fromCurrency.value === toCurrency.value) {
                alert('لا يمكن التحويل لنفس العملة');
                toCurrency.value = '';
                amountTo.value = '';
                return;
            }

            const amountInUSD = amount / fromRate;
            let convertedAmount = amountInUSD * toRate;
            let fee = 0;

            // Calculate fee based on buy/sell rules
            if (fromCurrencyName === 'USD') {
                // Selling USD
                fee = amount * 0.02; // 2% fee for selling USD
                convertedAmount = (amountInUSD - fee) * toRate;
            } else if (toCurrencyName === 'USD') {
                // Buying USD
                fee = (convertedAmount * 0.015); // 1.5% fee for buying USD
                convertedAmount = convertedAmount - fee;
            } else {
                // Cross currency exchange
                fee = convertedAmount * 0.025; // 2.5% fee for cross currency
                convertedAmount = convertedAmount - fee;
            }

            amountTo.value = convertedAmount.toFixed(2);

            // Add hidden input for fees if it doesn't exist
            let feesInput = document.querySelector('input[name="fees"]');
            if (!feesInput) {
                feesInput = document.createElement('input');
                feesInput.type = 'hidden';
                feesInput.name = 'fees';
                document.querySelector('form').appendChild(feesInput);
            }
            feesInput.value = fee.toFixed(2);
        } else {
            amountTo.value = '';
        }
    }

    fromCurrency.addEventListener('change', calculateExchange);
    toCurrency.addEventListener('change', calculateExchange);
    amountFrom.addEventListener('input', calculateExchange);
});
</script>
@endpush
@endsection
