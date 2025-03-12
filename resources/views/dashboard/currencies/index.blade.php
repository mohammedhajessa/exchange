@extends('frontend.master.app')
@section('title', 'الفروع')



@section('content')
<div class="container">
    <h1>قائمة العملات</h1>
    <div class="row mb-3">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex">
                <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search by currency name or code..." value="{{ request('search') }}">
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Code</th>
                <th class="text-center">Exchange Rate USD</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($currencies as $currency)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $currency->name }}</td>
                    <td class="text-center">{{ $currency->code }}</td>
                    <td class="text-center">{{ $currency->exchange_rate }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('scripts')
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let searchValue = this.value.toLowerCase();
        let tableRows = document.querySelectorAll('tbody tr');
        tableRows.forEach(row => {
            let name = row.children[1].textContent.toLowerCase();
            let code = row.children[2].textContent.toLowerCase();
            if (name.includes(searchValue) || code.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endpush
