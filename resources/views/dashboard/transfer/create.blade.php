@extends('frontend.master.app')
@section('title', 'تحويل جديد')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">تحويل جديد</h5>
                    <a href="{{ route('transfers.index') }}" class="btn btn-secondary">عودة للقائمة</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('transfers.store') }}" method="POST">
                        @csrf
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">الفرع المستلم</label>
                                <select name="to_branch_id" class="form-select">
                                    <option value="">اختر الفرع المستلم</option>
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}" {{ old('to_branch_id') == $branch->id ? 'selected' : '' }}>
                                            {{ $branch->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('to_branch_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">العملة</label>
                                <select name="currency_id" class="form-select">
                                    <option value="">اختر العملة</option>
                                    @foreach($currencies as $currency)
                                        <option value="{{ $currency->id }}" {{ old('currency_id') == $currency->id ? 'selected' : '' }}>
                                            {{ $currency->code }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('currency_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">المبلغ</label>
                                <input type="number" class="form-control" name="amount" value="{{ old('amount') }}" step="0.01">
                                @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">الرسوم</label>
                                <input type="number" class="form-control" name="fees" value="{{ old('fees', 0) }}" step="0.01">
                                @error('fees')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">المستلم</label>
                                <input type="text" class="form-control" name="receiver_name" value="{{ old('receiver_name') }}">
                            </div>
                                <div class="col-md-6">
                                    <label class="form-label">الهاتف</label>
                                    <input type="text" class="form-control" name="receiver_phone" value="{{ old('receiver_phone') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">العنوان</label>
                                <textarea class="form-control" name="receiver_address" value="{{ old('receiver_address') }}"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <span class="ti ti-send me-1"></span>
                                    إرسال التحويل
                                </button>
                            </div>
                        </div>

                        @if(session()->has('success'))
                            <div class="alert alert-success mt-3">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
