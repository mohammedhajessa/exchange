@extends('frontend.master.app')
@section('title', 'تفاصيل الفرع')
@section('content')
<div class="container">
    <h1>تفاصيل الفرع</h1>

    <div class="card">
        <div class="card-header">
            <h3>معلومات الفرع</h3>
        </div>
        <div class="card-body">
            <p><strong>اسم الفرع:</strong> {{ $branch->name }}</p>
            <p><strong>الدولة:</strong> {{ $branch->country }}</p>
            <p><strong>المدينة:</strong> {{ $branch->town }}</p>
            <p><strong>العنوان:</strong> {{ $branch->address }}</p>
            <p><strong>رقم الهاتف:</strong> {{ $branch->phone }}</p>
            <p><strong>البريد الإلكتروني:</strong> {{ $branch->user->email }}</p>
            <p class="badge bg-label-{{ $branch->status == 'active' ? 'success' : ($branch->status == 'inactive' ? 'danger':'') }}">{{ $branch->status == 'active' ? 'مفعل' : ($branch->status == 'inactive' ? 'معطل' : '') }}</p>
            <p><strong>تاريخ الإنشاء:</strong> {{ $branch->created_at->format('Y-m-d H:i:s') }}</p>
            <p><strong>آخر تحديث:</strong> {{ $branch->updated_at->format('Y-m-d H:i:s') }}</p>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">إجمالي صرف العملات</h5>
                            <p class="card-text display-6">{{ $branch->exchanges()->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h5 class="card-title">إجمالي التحويلات</h5>
                            <p class="card-text display-6">{{ $branch->transfers()->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h5 class="card-title">الرصيد الحالي</h5>
                            <p class="card-text display-6">{{ $branch->finance_box->balance ?? 0}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('branches.index') }}" class="btn btn-primary">العودة لصفحة الفروع</a>
        </div>
    </div>
</div>
@endsection
