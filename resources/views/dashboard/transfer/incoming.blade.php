@extends('frontend.master.app')
@section('title', 'الحوالات الواردة')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-4 mb-6">إدارة الحوالات الواردة</h4>

            <div class="col-12 col-xl-12 order-1 order-lg-0 container-p-y">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title m-0">
                            <h5 class="mb-1">حالة الحوالات الواردة</h5>
                            <p class="card-subtitle">الحوالات والعمليات المالية</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card bg-primary text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">إجمالي الحوالات الواردة</h5>
                                        <p class="card-text display-6">{{ $transfers->count() }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-info text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">العملات المستخدمة</h5>
                                        <p class="card-text display-6">{{ $transfers->pluck('currency_id')->unique()->count() }}</p>
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
                    <h5 class="m-0">جدول الحوالات الواردة</h5>
                </div>

                <div class="card-datatable table-responsive">
                    <div class="table-responsive-lg">
                        <table class="dt-responsive table table-bordered table-striped table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">الفرع المرسل</th>
                                    <th class="text-center">المبلغ</th>
                                    <th class="text-center">العملة</th>
                                    <th class="text-center">الرسوم</th>
                                    <th class="text-center">المستلم</th>
                                    <th class="text-center">الحالة</th>
                                    <th class="text-center">التاريخ</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transfers as $transfer)
                                    <tr>
                                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                        <td class="text-center align-middle">{{ $transfer->branch->name }}</td>
                                        <td class="text-center align-middle">{{ $transfer->amount }}</td>
                                        <td class="text-center align-middle">{{ $transfer->currency->code }}</td>
                                        <td class="text-center align-middle">{{ $transfer->fees }}</td>
                                        <td class="text-center align-middle">{{ $transfer->receiver_name }}</td>
                                        <td class="text-center align-middle">
                                            @if($transfer->status == 'pending')
                                                <span class="badge bg-warning">قيد المراجعة</span>
                                            @elseif($transfer->status == 'completed')
                                                <span class="badge bg-success">قبول التحويل</span>
                                            @else
                                                <span class="badge bg-danger">رفض التحويل</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">{{ $transfer->created_at->format('Y-m-d') }}</td>
                                        <td class="text-center align-middle">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('transfers.show', $transfer) }}">
                                                            <i class="fas fa-eye me-2"></i>عرض
                                                        </a>
                                                    </li>
                                                    @if($transfer->status == 'pending' && Auth::user()->id != $transfer->branch->user_id)
                                                        <li>
                                                            <form action="{{ route('transfers.updateStatus', [$transfer->id, 'completed']) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="dropdown-item text-success">
                                                                    <i class="fas fa-check me-2"></i>قبول
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('transfers.updateStatus', [$transfer->id, 'failed']) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="dropdown-item text-danger">
                                                                    <i class="fas fa-times me-2"></i>رفض
                                                                </button>
                                                            </form>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-4">لا توجد حوالات واردة</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot class="bg-light">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">الفرع المرسل</th>
                                    <th class="text-center">المبلغ</th>
                                    <th class="text-center">العملة</th>
                                    <th class="text-center">الرسوم</th>
                                    <th class="text-center">المستلم</th>
                                    <th class="text-center">الحالة</th>
                                    <th class="text-center">التاريخ</th>
                                    <th class="text-center">العمليات</th>
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
