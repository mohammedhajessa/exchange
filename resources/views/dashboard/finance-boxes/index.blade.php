@extends('frontend.master.app')
@section('title', 'الصندوق المالي')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-4 mb-6">إدارة الصندوق المالي</h4>

            <div class="col-12 col-xl-12 order-1 order-lg-0 container-p-y">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title m-0">
                            <h5 class="mb-1">حالة الصندوق</h5>
                            <p class="card-subtitle">الأرصدة والعمليات المالية</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card bg-primary text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">إجمالي الأرصدة</h5>
                                        <p class="card-text display-6">{{ $financeBoxes->count() }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-info text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">العملات المتوفرة</h5>
                                        <p class="card-text display-6">{{ $financeBoxes->pluck('currency_id')->unique()->count() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Responsive Datatable -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">جدول العمليات المالية</h5>
                    <div>
                        <a href="{{ route('finance-boxes.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>
                            إضافة عملية مالية جديدة
                        </a>
                    </div>
                </div>

                <div class="card-datatable table-responsive">
                    <div class="table-responsive-lg">
                        <table class="dt-responsive table table-bordered table-striped table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">الفرع</th>
                                    <th class="text-center">العملة</th>
                                    <th class="text-center">الرصيد</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($financeBoxes as $financeBox)
                                    <tr>
                                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                        <td class="text-center align-middle">{{ $financeBox->branch->name }}</td>
                                        <td class="text-center align-middle">{{ $financeBox->currency->code }}</td>
                                        <td class="text-center align-middle">{{ $financeBox->balance }}</td>
                                        <td class="text-center align-middle">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item text-primary" href="{{ route('finance-boxes.edit', $financeBox) }}">
                                                            <i class="fas fa-edit me-2"></i>تعديل
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('finance-boxes.destroy', $financeBox) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger"
                                                                onclick="return confirm('هل أنت متأكد من حذف هذه العملية المالية؟')">
                                                                <i class="fas fa-trash me-2"></i>حذف
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">لا توجد عمليات مالية</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot class="bg-light">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Branch</th>
                                    <th class="text-center">Currency</th>
                                    <th class="text-center">Balance</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!--/ Responsive Datatable -->
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="text-body">
                        © {{ date('Y') }}, made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="footer-link">Pixinvent</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
