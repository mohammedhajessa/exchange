@extends('frontend.master.app')
@section('title', 'تقارير صندوق التصريف')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-4 mb-6">تقارير صندوق التصريف</h4>

            <div class="col-12 col-xl-12 order-1 order-lg-0 container-p-y">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title m-0">
                            <h5 class="mb-1">إحصائيات التصريف</h5>
                            <p class="card-subtitle">تقارير حركة الصندوق</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('box-transition.exchange') }}" class="mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="branch_id" class="form-select">
                                        <option value="">كل الفروع</option>
                                        @foreach($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="currency_id" class="form-select">
                                        <option value="">كل العملات</option>
                                        @foreach($currencies as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">تصفية</button>
                                    <a href="{{ route('box-transition.exchange') }}" class="btn btn-secondary">إعادة تعيين</a>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card bg-primary text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">إجمالي عمليات التصريف</h5>
                                        <p class="card-text display-6">{{ $transitions->count() }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-info text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">إجمالي المبالغ</h5>
                                        <p class="card-text display-6">{{ $transitions->sum('amount') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Responsive Datatable -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="m-0"><i class="bx bx-transfer me-2"></i>سجل التصريف</h5>
                </div>

                <div class="card-datatable table-responsive p-3">
                    <div class="table-responsive-lg">
                        <table class="dt-responsive table table-bordered table-striped table-hover">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center py-3">#</th>
                                    <th class="text-center py-3">الفرع</th>
                                    <th class="text-center py-3">العملة</th>
                                    <th class="text-center py-3">المبلغ</th>
                                    <th class="text-center py-3">الرسوم</th>
                                    <th class="text-center py-3">المبلغ بعد الرسوم</th>
                                    <th class="text-center py-3">الملاحظات</th>
                                    <th class="text-center py-3">التاريخ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transitions as $transition)
                                    <tr class="border-bottom">
                                        <td class="text-center align-middle fw-bold">{{ $loop->iteration }}</td>
                                        <td class="text-center align-middle">
                                            <span class="badge bg-label-primary">{{ $transition->branch->name }}</span>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="badge bg-label-info">{{ $transition->currency->name }}</span>
                                        </td>
                                        <td class="text-center align-middle fw-semibold">{{ $transition->amount }}</td>
                                        <td class="text-center align-middle fw-semibold text-danger">{{ $transition->fees }}</td>
                                        <td class="text-center align-middle fw-semibold text-success">{{ $transition->amount_after_fees }}</td>
                                        <td class="text-center align-middle">
                                            <span class="text-muted">{{ $transition->note ?? 'لا يوجد ملاحظات' }}</span>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="badge bg-label-secondary">
                                                {{ $transition->created_at->format('Y-m-d H:i') }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-5">
                                            <div class="text-center">
                                                <i class='bx bx-folder-open display-4 text-secondary mb-3'></i>
                                                <p class="text-muted mb-0">لا يوجد عمليات تصريف</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/ Responsive Datatable -->

        </div>
    </div>
@endsection
