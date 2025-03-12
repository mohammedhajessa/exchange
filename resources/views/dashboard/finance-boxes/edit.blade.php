@extends('frontend.master.app')
@section('title', 'الفروع')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">تعديل العملية المالية</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('finance-boxes.update', $financeBox->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label" for="branch_id">اسم الفرع</label>
                            <select class="form-select" id="branch_id" name="branch_id">
                                <option value="" disabled>اختر الفرع</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ $financeBox->branch_id == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="currency_id">العملة</label>
                            <select class="form-select" id="currency_id" name="currency_id">
                                <option value="" disabled>اختر العملة</option>
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}" {{ $financeBox->currency_id == $currency->id ? 'selected' : '' }}>
                                        {{ $currency->code }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="balance">القيمة</label>
                            <input type="number"
                                   step="0.0001"
                                   id="balance"
                                   name="balance"
                                   class="form-control"
                                   value="{{ $financeBox->balance }}"
                                   required>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <span class="ti ti-device-floppy me-1"></span>
                                حفظ التغييرات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
