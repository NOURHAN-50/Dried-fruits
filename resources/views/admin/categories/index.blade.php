@extends('admin.app')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-2">
                <div class="col">
                  <h2 class="h5 page-title">التصنيفات</h2>
                </div>
                <div class="col-auto">
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal"><span class="fe fe-plus fe-16 text-white mr-2"></span>إضافة تصنيف</a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <table class="table table-hover table-borderless table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th> الصوره</th>
                            <th>الاسم</th>
                            <th>التصنيف الأب</th>
                            <th>عدد المنتجات</th>
                            <th>إجراء</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                          <tr>
                          <td>
@php $image = $category->images->first(); @endphp

@if($image)
    <img src="{{ asset('storage/categories/' . $image->path) }}"
     width="50">
@else
    <span>لا توجد صورة</span>
@endif
</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->parent ? $category->parent->name : '-' }}</td>
                            <td>{{ $category->products->count() }}</td>
                            <td>
                              <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">إجراء</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="{{ route('admin.categories.edit', $category->id) }}">تعديل</a>
                                  <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm('هل أنت متأكد من حذف هذا التصنيف؟')">حذف</button>
                                  </form>
                                </div>
                              </div>
                            </td>
                          </tr>

                           @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Add Category Modal -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">إضافة تصنيف جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('admin.categories.store') }}" method="POST"  enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
    <label for="categoryImage">صورة التصنيف</label>
    <input type="file" name="image" class="form-control" >
</div>
                  <div class="form-group">
                    <label for="catName">اسم التصنيف</label>
                    <input type="text" name="name" class="form-control" id="catName" value="{{ old('name') }}" required>
                  </div>
 @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="catParent">التصنيف الأب</label>
                    <select name="parent_id" class="form-control select2" id="catParent">
                      <option value="">بدون تصنيف أب</option>
                        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('parent_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
                    </select>
                    @error('parent_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror


                  </div>



              </div>
              <div class="modal-footer">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">إلغاء</a>
                <button type="submit" class="btn btn-primary">حفظ التصنيف</button>
              </div>
            </div>
        </form>
          </div>
        </div>
      </main>
@endsection
