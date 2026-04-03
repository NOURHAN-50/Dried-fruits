
@extends('admin.app')
@section('content')
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="h5 page-title mb-4">تعديل تصنيف</h2>

              <div class="row">
                <!-- Left column: Main Info -->
                <div class="col-md-8">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">المعلومات الأساسية</strong>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
    <label for="categoryImage">صورة التصنيف</label>
    <input type="file" name="images" class="form-control" multiple>
    <small class="text-muted">يمكن رفع صورة واحدة أو أكثر.</small>
</div>
                        <div class="form-group">
                          <label for="catName">اسم التصنيف</label>
                          <input type="text" name="name" class="form-control" id="catName" value="{{ old('name', $category->name) }}" required>
                            @error('name')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="catParent">التصنيف الأب</label>
                          <select name="parent_id" class="form-control select2" id="catParent">
                            <option value="">بدون تصنيف أب</option>
                              @foreach ($categories as $cat)
                                  <option value="{{ $cat->id }}"
                                      {{ old('parent_id', $category->parent_id) == $cat->id ? 'selected' : '' }}>
                                      {{ $cat->name }}
                                  </option>
                              @endforeach
                          </select>
                            @error('parent_id')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

              </div>
              <div class="modal-footer">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">إلغاء</a>
                <button type="submit" class="btn btn-primary"> تعديل </button>
              </div>
            </div>
        </form>
          </div>
        </div>

        </main>
        @endsection
