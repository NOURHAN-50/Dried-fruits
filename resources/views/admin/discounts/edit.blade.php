@extends('admin.app')
@section('content')
  <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-4">
                <div class="col">
                  <h2 class="h5 page-title">تعديل كود الخصم</h2>
                  <p class="text-muted">تحديث تفاصيل كود الخصم الحالي.</p>
                </div>
                <div class="col-auto">
                  <a href="{{ route('admin.discounts.index') }}" class="btn btn-secondary">
                    <span class="fe fe-arrow-left fe-16 mr-2"></span>العودة إلى القائمة
                  </a>
                </div>
              </div>
                <div class="card shadow">
                    <div class="card-body">
                    <form action="{{ route('admin.discounts.update', $discount->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="discountCode">كود الخصم</label>
                            <input type="text" name="code" class="form-control text-uppercase" id="discountCode" placeholder="مثال: SUMMER24" required value="{{ old('code', $discount->code) }}">
                            @error('code')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group      col-md-6">
                                <label for="discountType">نوع الخصم</label>
                                <select name="type" class="form-control" id="discountType" required>
                                    <option value="percentage" {{ old('type', $discount->type) == 'percentage' ? 'selected' : '' }}>نسبة مئوية</option>
                                    <option value="fixed" {{ old('type', $discount->type) == 'fixed' ? 'selected' : '' }}>قيمة ثابتة</option>
                                </select>
                                @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="discountValue">قيمة الخصم</label>
                                <input type="number" step="0.01" name="value" class="form-control" id="discountValue" placeholder="القيمة" min="1" required value="{{ old('value', $discount->value) }}">
                                @error('value')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="discountExpiry">تاريخ الانتهاء</label>
                      <input type="date" name="expires_at" class="form-control" id="discountExpiry" value="{{ old('expires_at', $discount->expires_at) }}">

                                @error('expires_at')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="discountUsage">الحد الأقصى للاستخدام (اختياري)</label>
                                <input type="number" name="usage_limit" class="form-control" id="discountUsage" placeholder="الحد الأقصى للاستخدام" min="1" value="{{ old('usage_limit', $discount->usage_limit) }}">
                                @error('usage_limit')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
<input type="hidden" name="active" value="0">

<div class="custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="discountActive"
    name="active" value="1"
    {{ old('active', $discount->active) ? 'checked' : '' }}>

    <label class="custom-control-label" for="discountActive">
        تفعيل الكود فوراً
    </label>
</div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">تحديث الكود</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </main>
@endsection
