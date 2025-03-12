@extends('frontend.master.app')
@section('title', 'عرض التحويل')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">تفاصيل التحويل</h5>
                    <a href="{{ route('transfers.index') }}" class="btn btn-secondary">عودة للقائمة</a>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="ti ti-user me-2"></span>
                                        <label class="form-label mb-0">اسم المستلم</label>
                                    </div>
                                    <h5 class="card-text">{{ $transfer->receiver_name }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="ti ti-phone me-2"></span>
                                        <label class="form-label mb-0">رقم هاتف المستلم</label>
                                    </div>
                                    <h5 class="card-text">{{ $transfer->receiver_phone }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="ti ti-map-pin me-2"></span>
                                        <label class="form-label mb-0">عنوان المستلم</label>
                                    </div>
                                    <h5 class="card-text">{{ $transfer->receiver_address }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">الفرع المرسل</label>
                            <p>{{ $transfer->branch->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">الفرع المستلم</label>
                            <p>{{ $transfer->toBranch->name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">المبلغ</label>
                            <p>{{ $transfer->amount }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">العملة</label>
                            <p>{{ $transfer->currency->name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">الرسوم</label>
                            <p>{{ $transfer->fees }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">الحالة</label>
                            <p>
                                @if($transfer->status == 'pending')
                                    <span class="badge bg-warning">قيد الانتظار</span>
                                @elseif($transfer->status == 'completed')
                                    <span class="badge bg-success">قبول التحويل</span>
                                @elseif($transfer->status == 'failed')
                                    <span class="badge bg-danger">رفض التحويل</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">موقع الفرع المرسل</label>
                            <p>{{ $transfer->branch->country }} - {{ $transfer->branch->city }} - {{ $transfer->branch->town }}</p>
                            <label class="form-label">العنوان</label>
                            <p>{{ $transfer->branch->address }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">موقع الفرع المستلم</label>
                            <p>{{ $transfer->toBranch->country }} - {{ $transfer->toBranch->city }} - {{ $transfer->toBranch->town }}</p>
                            <label class="form-label">العنوان</label>
                            <p>{{ $transfer->toBranch->address }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">تاريخ الإنشاء</label>
                            <p>{{ $transfer->created_at->format('Y-m-d H:i:s') }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">تاريخ التحديث</label>
                            <p>{{ $transfer->updated_at->format('Y-m-d H:i:s') }}</p>
                        </div>
                    </div>

                    @if( Auth::user()->id != $transfer->branch->user_id && $transfer->status == 'pending')
                    <div class="row mt-4">
                        <div class="col-12">
                            <form action="{{ route('transfers.updateStatus', [$transfer->id, 'completed']) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">قبول التحويل</button>
                            </form>

                            <form action="{{ route('transfers.updateStatus', [$transfer->id, 'failed']) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">رفض التحويل</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
