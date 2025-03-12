@extends('frontend.master.app')
@section('title', 'تفاصيل العملية المالية')
@section('content')
<div class="container">
    <h1>تفاصيل العملية المالية</h1>

    <div class="card">
        <div class="card-header">
            <h3>معلومات العملية المالية</h3>
        </div>
        <div class="card-body">
            <p><strong>الفرع:</strong> {{ $financeBox->branch->name }}</p>
            <p><strong>العملة:</strong> {{ $financeBox->currency->code }}</p>
            <p><strong>القيمة:</strong> {{ $financeBox->balance }}</p>
            <p><strong>تاريخ الإنشاء:</strong> {{ $financeBox->created_at->format('Y-m-d H:i:s') }}</p>
            <p><strong>آخر تحديث:</strong> {{ $financeBox->updated_at->format('Y-m-d H:i:s') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('finance-boxes.index') }}" class="btn btn-primary">العودة لصفحة العمليات المالية</a>
            <a href="{{ route('finance-boxes.edit', $financeBox) }}" class="btn btn-warning">تعديل</a>
            <form action="{{ route('finance-boxes.destroy', $financeBox) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
            </form>
        </div>
    </div>
</div>
@endsection
