@extends('frontend.master.app')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-4 mb-6">إدارة التحويلات</h4>

            <!-- Responsive Datatable -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">جدول التحويلات</h5>
                    <div>
                        <a href="{{ route('exchanges.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>
                            تحويل جديد
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
                                    <th class="text-center">العملة </th>
                                    <th class="text-center">العملة المستلمة</th>
                                    <th class="text-center">المبلغ المرسل</th>
                                    <th class="text-center">المبلغ المستلم</th>
                                    <th class="text-center">الرسوم</th>
                                    <th class="text-center">التاريخ</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($exchanges as $exchange)
                                    <tr>
                                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                        <td class="text-center align-middle">{{ $exchange->branch->name }}</td>
                                        <td class="text-center align-middle">{{ $exchange->fromCurrency->name }}</td>
                                        <td class="text-center align-middle">{{ $exchange->toCurrency->name }}</td>
                                        <td class="text-center align-middle">{{ number_format($exchange->amount_from, 2) }}</td>
                                        <td class="text-center align-middle">{{ number_format($exchange->amount_to, 2) }}</td>
                                        <td class="text-center align-middle">{{ number_format($exchange->fees, 2) }}</td>
                                        <td class="text-center align-middle">{{ $exchange->created_at->format('Y-m-d H:i') }}</td>
                                        <td class="text-center align-middle">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    {{-- <li>
                                                        <a class="dropdown-item text-info" href="{{ route('exchanges.show', $exchange->id) }}">
                                                            <i class="fas fa-eye me-2"></i>تفاصيل
                                                        </a>
                                                    </li> --}}
                                                    <li>
                                                        <form action="{{ route('exchanges.destroy', $exchange->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger"
                                                                onclick="return confirm('هل أنت متأكد أنك تريد حذف التحويل؟')">
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
                                        <td colspan="9" class="text-center py-4">لا يوجد تحويلات</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    {{ $exchanges->links() }}
                </div>
            </div>
            <!--/ Responsive Datatable -->
        </div>
        <!-- / Content -->
    </div>
    <!-- Content wrapper -->
@endsection
