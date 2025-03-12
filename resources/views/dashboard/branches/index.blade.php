@extends('frontend.master.app')
@section('title', 'الفروع')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-4 mb-6">إدارة الفروع</h4>


            <div class="col-12 col-xl-12 order-1 order-lg-0 container-p-y">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title m-0">
                            <h5 class="mb-1">حالة الفروع</h5>
                            <p class="card-subtitle">الفروع الفعالة وغير الفعالة</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('branches.index') }}" class="mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="status" class="form-select">
                                        <option value="">كل الحالات</option>
                                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>فعال</option>
                                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>غير فعال</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="country" class="form-select">
                                        <option value="">كل الدول</option>
                                        @foreach($branches->pluck('country')->unique() as $country)
                                            <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>
                                                {{ $country }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="city" class="form-select">
                                        <option value="">كل المدن</option>
                                        @foreach($branches->pluck('city')->unique() as $city)
                                            <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>
                                                {{ $city }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">تصفية</button>
                                    <a href="{{ route('branches.index') }}" class="btn btn-secondary">إعادة تعيين</a>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card bg-primary text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">الفروع الفعالة</h5>
                                        <p class="card-text display-6">{{ $branches->where('status', 'active')->count() }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-danger text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">الفروع الغير فعالة</h5>
                                        <p class="card-text display-6">{{ $branches->where('status', 'inactive')->count() }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-info text-white mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">إجمالي الفروع</h5>
                                        <p class="card-text display-6">{{ $branches->count() }}</p>
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
                    <h5 class="m-0">جدول الفروع</h5>
                    <div>
                        <button accesskey="c" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                            aria-controls="offcanvasExample">
                            <i class="fas fa-plus me-2"></i>
                            إنشاء فرع جديد (Alt + C)
                        </button>
                        <button accesskey="ؤ" class="btn btn-primary d-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                            aria-controls="offcanvasExample">
                            إنشاء فرع جديد (Alt + C)
                        </button>
                    </div>
                </div>

                <div class="card-datatable table-responsive">
                    <div class="table-responsive-lg">
                        <table class="dt-responsive table table-bordered table-striped table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-center">الاسم</th>
                                    <th class="text-center d-none d-md-table-cell">الدولة</th>
                                    <th class="text-center d-none d-md-table-cell">المدينة</th>
                                    <th class="text-center d-none d-lg-table-cell">المنطقة</th>
                                    <th class="text-center d-none d-lg-table-cell">العنوان</th>
                                    <th class="text-center">الهاتف</th>
                                    <th class="text-center d-none d-xl-table-cell">الملاحظات</th>
                                    <th class="text-center d-none d-lg-table-cell">البداية</th>
                                    <th class="text-center d-none d-lg-table-cell">النهاية</th>
                                    <th class="text-center">الحالة</th>
                                    <th class="text-center">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($branches as $branch)
                                    <tr>
                                        <td class="text-center align-middle">{{ $branch->name }}</td>
                                        <td class="text-center align-middle d-none d-md-table-cell">{{ $branch->country }}</td>
                                        <td class="text-center align-middle d-none d-md-table-cell">{{ $branch->city }}</td>
                                        <td class="text-center align-middle d-none d-lg-table-cell">{{ $branch->town }}</td>
                                        <td class="text-center align-middle d-none d-lg-table-cell">{{ $branch->address }}</td>
                                        <td class="text-center align-middle">{{ $branch->phone }}</td>
                                        <td class="text-center align-middle d-none d-xl-table-cell">{{ $branch->note ?? 'لا يوجد ملاحظات' }}</td>
                                        <td class="text-center align-middle d-none d-lg-table-cell">{{ $branch->start_time }}</td>
                                        <td class="text-center align-middle d-none d-lg-table-cell">{{ $branch->end_time}}</td>
                                        <td class="text-center align-middle">
                                            <span class="badge {{ $branch->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                                {{ $branch->status == 'active' ? 'فعال' : 'غير فعال' }}
                                            </span>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item text-primary" href="#"
                                                            data-bs-toggle="offcanvas"
                                                            data-bs-target="#editcanva"
                                                            data-bs-branch-id="{{ $branch->id }}"
                                                            aria-controls="offcanvasExample">
                                                            <i class="fas fa-edit me-2"></i>تعديل
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-info" href="{{ route('branches.show', $branch->id) }}">
                                                            <i class="fas fa-eye me-2"></i>تفاصيل
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('branches.destroy', $branch->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger"
                                                                onclick="return confirm('هل أنت متأكد أنك تريد حذف الفرع')">
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
                                        <td colspan="11" class="text-center py-4">لا يوجد فروع</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot class="bg-light">
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center d-none d-md-table-cell">Country</th>
                                    <th class="text-center d-none d-md-table-cell">City</th>
                                    <th class="text-center d-none d-lg-table-cell">Town</th>
                                    <th class="text-center d-none d-lg-table-cell">Address</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center d-none d-xl-table-cell">Note</th>
                                    <th class="text-center d-none d-lg-table-cell">Start Time</th>
                                    <th class="text-center d-none d-lg-table-cell">End Time</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!--/ Responsive Datatable -->

            {{-- Create Tab --}}
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">إغلاق</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="row">
                        <div class="col-xl mb-6">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">أضف فرع جديد</h5>
                                    <small class="text-muted float-end">إضغط tab للتنقل </small>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('branches.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="mb-6">
                                            <x-front.input name="name" label="الاسم" />
                                        </div>
                                        <div class="mb-6">
                                            <x-front.input name="email" label="البريد الإلكتروني" />
                                        </div>
                                        <div class="mb-6">
                                            <x-front.input name="password" label="كلمة المرور" />
                                        </div>
                                        <div class="mb-6">
                                            <x-front.input name="country" label="الدولة" />
                                        </div>
                                        <div class="mb-6">
                                            <x-front.input name="city" label="المدينة" />
                                        </div>
                                        <div class="mb-6">
                                            <x-front.input name="town" label="المنطقة" />
                                        </div>
                                        <div class="mb-6">
                                            <x-front.input name="address" label="العنوان" />
                                        </div>
                                        <div class="mb-6">
                                            <x-front.input name="phone" label="الهاتف" />
                                        </div>
                                        <div class="mb-6">
                                            <x-front.input name="note" label="ملاحظات" />
                                        </div>
                                        <div class="mb-6">
                                            <label class="form-label" for="multicol-birthdate">البداية</label>
                                            <input name="start_time" type="datetime-local" id="multicol-birthdate" class="form-control dob-picker" placeholder="YYYY-MM-DD" />
                                        </div>
                                        <div class="mb-6">
                                            <label class="form-label" for="multicol-birthdate">النهاية</label>
                                            <input name="end_time" type="datetime-local" id="multicol-birthdate" class="form-control dob-picker" placeholder="YYYY-MM-DD" />
                                        </div>
                                        <div class="mb-6">
                                            <label for="status" class="form-label">الحالة</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="" disabled selected>اختر الحالة</option>
                                                <option value="active">فعال</option>
                                                <option value="inactive">غير فعال</option>
                                            </select>
                                        </div>
                                        <div class="mb-6">
                                            <label for="role" class="form-label">الدور</label>
                                            <select class="form-control" id="role" name="role" required>
                                                <option value="" disabled selected>اختر الدور</option>
                                                <option value="admin">مدير</option>
                                                <option value="user">مستخدم</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Create Tab --}}




            {{-- Edit Tab --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="editcanva" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">إغلاق</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row">
            <div class="col-xl mb-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">تعديل</h5>
                        <small class="text-muted float-end">إضغط tab للتنقل</small>
                    </div>
                    <div class="card-body">
                        <!-- Edit Form -->
                        <form action="{{ route('branches.update', $branch->id ?? '') }}" method="POST">
                            @csrf
                            @method('PUT') <!-- Specify the PUT method for updates -->
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <div class="mb-6">
                                <x-front.input-edit name="name" value="{{ old('name', $branch->name ?? '') }}" label="الاسم" />
                            </div>
                            <div class="mb-6">
                                <x-front.input-edit name="email" value="{{ old('email', $branch->user->email ?? '') }}" label="البريد الإلكتروني" />
                            </div>
                            <div class="mb-6">
                                <label for="password" class="form-label">كلمة المرور</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password', $branch->user->password ?? '') }}">
                                    <span class="input-group-text toggle-password" style="cursor: pointer">
                                        <i class="eye-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="eye-open">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="eye-slash" style="display: none;">
                                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                                <line x1="1" y1="1" x2="23" y2="23"></line>
                                            </svg>
                                        </i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-6">
                                <x-front.input-edit name="country" value="{{ old('country', $branch->country ?? '') }}" label="الدولة" />
                            </div>
                            <div class="mb-6">
                                <x-front.input-edit name="city" value="{{ old('city', $branch->city ?? '') }}" label="المدينة" />
                            </div>
                            <div class="mb-6">
                                <x-front.input-edit name="town" value="{{ old('town', $branch->town ?? '') }}" label="المنطقة" />
                            </div>
                            <div class="mb-6">
                                <x-front.input-edit name="address" value="{{ old('address', $branch->address ?? '') }}" label="العنوان" />
                            </div>
                            <div class="mb-6">
                                <x-front.input-edit name="phone" value="{{ old('phone', $branch->phone ?? '') }}" label="الهاتف" />
                            </div>
                            <div class="mb-6">
                                <x-front.input-edit name="note" value="{{ old('note', $branch->note ?? '') }}" label="ملاحظات" />
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="multicol-start-time">البداية</label>
                                <input name="start_time" type="datetime-local" id="multicol-start-time" class="form-control"
                                    value="{{ old('start_time', $branch->start_time ?? '') }}" />
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="multicol-end-time">النهاية</label>
                                <input name="end_time" type="datetime-local" id="multicol-end-time" class="form-control"
                                    value="{{ old('end_time', $branch->end_time ?? '') }}" />
                            </div>
                            <div class="mb-6">
                                <label for="status" class="form-label">الحالة</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="active" {{ isset($branch) && $branch->status == 'active' ? 'selected' : '' }}>فعال</option>
                                    <option value="inactive" {{ isset($branch) && $branch->status == 'inactive' ? 'selected' : '' }}>غير فعال</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="role" class="form-label">الدور</label>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="admin" {{ isset($branch) && $branch->role == 'admin' ? 'selected' : '' }}>مدير</option>
                                    <option value="user" {{ isset($branch) && $branch->role == 'user' ? 'selected' : '' }}>مستخدم</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">تحديث</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Edit Tab --}}






        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div
                    class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="text-body">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        , made with ❤️ by <a href="https://pixinvent.com" target="_blank"
                            class="footer-link">Pixinvent</a>
                    </div>
                    <div class="d-none d-lg-inline-block">
                        <a href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/" target="_blank"
                            class="footer-link me-4">Documentation</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('editcanva').addEventListener('show.bs.offcanvas', function(event) {
                const button = event.relatedTarget;
                const branchId = button.getAttribute('data-bs-branch-id');

                fetch(`/branches/${branchId}/edit`)
                    .then(response => response.json())
                    .then(data => {
                        const form = document.querySelector('#editcanva form');
                        form.action = `/branches/${branchId}`;

                        form.querySelector('[name="name"]').value = data.name;
                        form.querySelector('[name="country"]').value = data.country;
                        form.querySelector('[name="city"]').value = data.city;
                        form.querySelector('[name="town"]').value = data.town;
                        form.querySelector('[name="address"]').value = data.address;
                        form.querySelector('[name="phone"]').value = data.phone;
                        form.querySelector('[name="note"]').value = data.note || '';
                        form.querySelector('[name="start_time"]').value = data.start_time;
                        form.querySelector('[name="end_time"]').value = data.end_time;
                        form.querySelector('[name="status"]').value = data.status;
                        form.querySelector('[name="role"]').value = data.role;
                        form.querySelector('[name="user_id"]').value = data.user_id;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('حدث خطأ أثناء تحميل بيانات الفرع');
                    });
            });
        });
        </script>
@endsection
