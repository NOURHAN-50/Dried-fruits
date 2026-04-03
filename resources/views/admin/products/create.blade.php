

@extends('admin.app')
@section('content')
      <main role="main" class="main-content">
        <div class="container-fluid">
            <form action="{{ route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="h5 page-title mb-4">إضافة / تعديل منتج</h2>

              <div class="row">
                <!-- Left column: Main Info -->
                <div class="col-md-8">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">المعلومات الأساسية</strong>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                          <label for="productName">اسم المنتج</label>
                          <input type="text" name="name" class="form-control" id="productName" placeholder="مثال: حذاء رياضي نايك" value="{{ old('name') }}">
                            @error('name')
                                <small style="color:red">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="form-group">
                          <label for="description">الوصف التفصيلي</label>
                          <div id="editor" style="height: 150px;">
                            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                            @error('description')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="price">السعر الأساسي</label>
                            <div class="input-group">
                              <input type="number" name="price" class="form-control" id="price" placeholder="0.00" value="{{ old('price') }}">
                              @error('price')
                                <small style="color:red">{{ $message }}</small>
                              @enderror
                              <div class="input-group-append">
                                <span class="input-group-text">EGP</span>
                              </div>
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="comparePrice">السعر قبل التخفيض (اختياري)</label>
                            <div class="input-group">
                              <input type="number" name="sale_price" class="form-control" id="comparePrice" placeholder="0.00" value="{{ old('sale_price') }}">
                                @error('sale_price')
                                    <small style="color:red">{{ $message }}</small>
                                @enderror

                              <div class="input-group-append">
                                <span class="input-group-text">EGP</span>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>
                  </div>

                  <!-- Variations Card -->
                  <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <strong class="card-title mb-0">المتغيرات (Variations)</strong>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="hasVariations" checked>
                        <label class="custom-control-label" for="hasVariations">هذا المنتج يحتوي على مقاسات/ألوان</label>
                      </div>
                    </div>
                    <div class="card-body" id="variationsSection">
                      <p class="text-muted small">أضف متغيرات المنتج مثل الألوان والمقاسات. يمكنك تحديد سعر مختلف أو مخزون لكل متغير.</p>

                      <!-- Variation Item -->
<div >

<div class="variation-item border rounded p-3 mb-3 bg-light">
<div class="form-row align-items-center">

<div class="col-md-3">
<label class="small">اللون / المقاس</label>
<input type="text" name="weight[]" class="form-control form-control-sm">
</div>

<div class="col-md-3">
<label class="small">السعر</label>
<input type="number" name="price_override[]" class="form-control form-control-sm">
</div>

<div class="col-md-3">
<label class="small">المخزون</label>
<input type="number" name="stock[]" class="form-control form-control-sm">
</div>

<div class="col-md-3 mt-4 text-center">
<button type="button" class="btn btn-sm btn-danger removeVariation">
حذف
</button>
</div>

</div>
</div>

</div>

                      <!-- Add New Variation Button -->
<button type="button" id="addVariation" class="btn btn-sm btn-outline-primary mb-2">
<span class="fe fe-plus mr-1"></span> إضافة متغير جديد
</button>
                    </div>
                  </div>
                </div> <!-- /.col-md-8 -->

                <!-- Right column: Sidebar Info -->
                <div class="col-md-4">
                  <!-- Organization -->
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">التنظيم</strong>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="productStatus">الحالة</label>
                        <select name="status" class="form-control select2" id="productStatus">
                          <option value="متاح" {{ (old('status') == 'متاح') ? 'selected' : '' }}>متاح</option>
                          <option value="غير متاح" {{ (old('status') == 'غير متاح') ? 'selected' : '' }}>غير متاح</option >
                        </select>
                        @error('status')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="category">التصنيف</label>
                   <select name="category_id" class="form-control" >
        <option value="">-- Choose Category --</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}"
                {{ (old('category_id') == $cat->id) ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
    <small style="color:red">{{ $message }}</small>
@enderror
                      </div>
                    </div>
                  </div>

                  <!-- Images -->
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">صور المنتج</strong>
                    </div>
       <div class="card-body">

<input type="file"name="images[]" class="form-control" multiple>

<small class="text-muted mt-2 d-block">
سيتم استخدام الصورة الأولى كصورة رئيسية للمنتج.
</small>

</div>
                  </div>

                </div> <!-- /.col-md-4 -->
              </div> <!-- /.row -->

              <div class="row">
                <div class="col-12 mt-3 text-right">


                  <button type="submit" class="btn btn-primary">حفظ المنتج</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mr-2">إلغاء</a>

            </div>
              </div>
              </form>

            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
      </main>
<script>

document.getElementById('addVariation').addEventListener('click', function(){

let variation = `
<div class="variation-item border rounded p-3 mb-3 bg-light">
<div class="form-row align-items-center">

<div class="col-md-3">
<input type="text" name="variation_name[]" class="form-control form-control-sm" placeholder="أحمر - وسط">
</div>

<div class="col-md-3">
<input type="number" name="variation_price[]" class="form-control form-control-sm" placeholder="السعر">
</div>

<div class="col-md-3">
<input type="number" name="variation_stock[]" class="form-control form-control-sm" placeholder="المخزون">
</div>

<div class="col-md-3 text-center">
<button type="button" class="btn btn-sm btn-danger removeVariation">
حذف
</button>
</div>

</div>
</div>
`;

document.getElementById('variationsSection').insertAdjacentHTML('beforeend', variation);

});


// حذف المتغير

document.addEventListener('click', function(e){

if(e.target.classList.contains('removeVariation')){
e.target.closest('.variation-item').remove();
}

});

</script>
@endsection
