@extends('frontend.master.app')
@section('title', 'تعديل التحويل')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">تعديل التحويل</h5>
                    <a href="{{ route('transfers.index') }}" class="btn btn-secondary">عودة للقائمة</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('transfers.update', $transfer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">الفرع المستلم</label>
                                <select name="to_branch_id" class="form-select">
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}" {{ $transfer->to_branch_id == $branch->id ? 'selected' : '' }}>
                                            {{ $branch->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">العملة</label>
                                <select name="currency_id" class="form-select">
                                    @foreach($currencies as $currency)
                                        <option value="{{ $currency->id }}" {{ $transfer->currency_id == $currency->id ? 'selected' : '' }}>
                                            {{ $currency->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">المبلغ</label>
                                <input type="number" class="form-control" name="amount" value="{{ $transfer->amount }}" step="0.01">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">الرسوم</label>
                                <input type="number" class="form-control" name="fees" value="{{ $transfer->fees }}" step="0.01">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
