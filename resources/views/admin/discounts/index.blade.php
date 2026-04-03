
@extends('admin.app')
@section('content')
  <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-4">
                <div class="col">
                  <h2 class="h5 page-title">الخصومات والعروض</h2>
                  <p class="text-muted">إدارة أكواد الخصم، كوبونات التخفيض، والعروض الترويجية.</p>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDiscountModal">
                    <span class="fe fe-plus fe-16 mr-2"></span>إضافة كود خصم
                  </button>
                </div>
              </div>

              <!-- Discounts Table -->
              <div class="card shadow">
                <div class="card-body">
                  <table class="table table-hover table-borderless table-striped mt-n3 mb-n1">
                    <thead>
                      <tr>
                        <td>الاسم</td>
                        <th>الكود</th>
                        <th>النوع</th>
                        <th>القيمة</th>
                        <th>تاريخ الانتهاء</th>
                        <th>مرات الاستخدام</th>
                        <th>تطبيق على</th>
                        <th>الحالة</th>
                        <th>إجراءات</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($discounts as $discount)
                      <tr>
                        <td>{{ $discount->name }}</td>
                        <td><strong>{{ $discount->code }}</strong></td>
                        <td>{{ $discount->type }}</td>
                        <td>{{ $discount->value }}</td>
                        <td>{{ $discount->expires_at }}</td>
                        <td>{{ $discount->times_used  }} / {{ $discount->usage_limit ?? 'غير محدود' }}</td>
                        <td>
                        @if($discount->target_type == 'order')
                        على الطلب
                        @else
                        على منتج
                        @endif
                        </td>
                        <td>@if($discount->active)
<span class="badge badge-success">نشط</span>
@else
<span class="badge badge-danger">غير نشط</span>
@endif
</td>
                        <td>
                          <a href="{{ route('admin.discounts.edit', $discount->id) }}" class="btn btn-sm btn-outline-primary"><span class="fe fe-edit-2"></span></a>
                          <form action="{{ route('admin.discounts.destroy', $discount->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"><span class="fe fe-trash-2"></span></button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div> <!-- .card-body -->
              </div> <!-- .card -->

            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->

        <!-- Add Discount Modal -->
        <div class="modal fade" id="addDiscountModal" tabindex="-1" role="dialog" aria-labelledby="addDiscountModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addDiscountModalLabel">إضافة كود خصم جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{ route('admin.discounts.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                <div class="form-group">
    <label>اسم الخصم</label>
    <input type="text" name="name" class="form-control" required  value="{{ old('name') }}">
</div>
                <div class="form-group">
                    <label for="discountCode">كود الخصم</label>
                    <input type="text" name="code" class="form-control text-uppercase" id="discountCode" placeholder="مثال: SUMMER24" required value="{{ old('code') }}">
                    @error('code')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="discountType">نوع الخصم</label>
                        <select class="form-control" id="discountType" name="type">
                            <option value="percentage">نسبة مئوية</option>
                            <option value="fixed">قيمة ثابتة</option>
                        </select>
                        @error('type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                    <label for="discountValue">قيمة الخصم</label>
                    <input type="number" name="value" class="form-control" id="discountValue" placeholder="القيمة" min="1" required value="{{ old('value') }}">
                        @error('value')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group">
<label>نوع التطبيق</label>

<select name="target_type" class="form-control">
<option value="order">على الطلب بالكامل</option>
<option value="product">على منتج معين</option>
</select>

</div>
<div class="form-group">
<label>المنتج</label>

<select name="target_id" class="form-control">
<option value="">كل المنتجات</option>

@foreach($products as $product)
<option value="{{ $product->id }}">
{{ $product->name }}
</option>
@endforeach

</select>

</div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="discountExpiry">تاريخ الانتهاء</label>
                    <input type="date" name="expires_at" class="form-control" id="discountExpiry" value="{{ old('expires_at') }}">
@error('expires_at')
                        <small class="text-danger">{{ $message }}</small>
@enderror
                    </div>
                    <div class="form-group col-md-6">
                    <label for="discountUsage">الحد الأقصى للاستخدام (اختياري)</label>
                    <input type="number" name="usage_limit" class="form-control" id="discountUsage" placeholder="غير محدود" value="{{ old('usage_limit') }}">
                    @error('usage_limit')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                </div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="discountActive" name="active" checked>
                    <label class="custom-control-label" for="discountActive">تفعيل الكود فوراً</label>
                    </div>

                </div>
              <div class="modal-footer">
                <a href="{{ route('admin.discounts.index') }}" class="btn btn-secondary">إلغاء</a>
                <button type="submit" class="btn btn-primary">حفظ الكود</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </main>
      @endsection
