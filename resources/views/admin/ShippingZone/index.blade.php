@extends('admin.app')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-2">
                <div class="col">
                  <h2 class="h5 page-title"> اماكن الشحن   </h2>
                </div>
                <div class="col-auto">
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal"><span class="fe fe-plus fe-16 text-white mr-2"></span>إضافة  محافظه شحن </a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <table class="table table-hover table-borderless table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th>المحافظه </th>
                            <th> السعر</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($zones as $shipping_zones)
                          <tr>
                            <td>{{ $shipping_zones->name }}</td>
                            <td>{{ $shipping_zones->price }}</td>
                            <td>
                              <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">إجراء</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <form action="{{ route('admin.ShippingZone.destroy', $shipping_zones->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm('هل أنت متأكد من حذف هذا الشحن')">حذف</button>
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
                <h5 class="modal-title" id="addCategoryModalLabel">إضافة محافظه  جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('admin.ShippingZone.store') }}" method="POST"  enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="catName">اسم المحافظه</label>
                    <input type="text" name="name" class="form-control" id="catName" value="{{ old('name') }}" required>
                  </div>
 @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="catName"> سعر الشحن </label>
                    <input type="text" name="price" class="form-control" id="catName" value="{{ old('price') }}" required>
                  </div>
 @error('price')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror



              </div>
              <div class="modal-footer">
                <a href="{{ route('admin.ShippingZone.index') }}" class="btn btn-secondary">إلغاء</a>
                <button type="submit" class="btn btn-primary">حفظ الشحن</button>
              </div>
            </div>
        </form>
          </div>
        </div>
      </main>
@endsection
