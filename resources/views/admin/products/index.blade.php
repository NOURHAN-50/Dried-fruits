
@extends('admin.app')
@section('content')
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-2">
                <div class="col">
                  <h2 class="h5 page-title">المنتجات</h2>
                </div>
                <div class="col-auto">
                  <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><span class="fe fe-plus fe-16 text-white mr-2"></span>إضافة منتج</a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <!-- table -->
                      <table class="table table-hover table-borderless table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th>الصورة</th>
                            <th>اسم المنتج</th>
                            <th>السعر الأساسي</th>
                            <th>سعر التخفيض</th>
                            <th>سعر التكلفه</th>
                            <th>الربح </th>
                            <th>المخزون</th>
                            <th>التصنيف</th>
                            <th>الحالة</th>
                            <th>إجراء</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                          <tr>
                            <td><div class="avatar avatar-sm">
@php $image = $product->images->first(); @endphp

@if($image)
    <img
        src=" {{ asset('storage/' . $image->path) }} "
        width="50">
@else
    <span>لا توجد صورة</span>
@endif
                                </div>
                        </td>

                            <td> {{ $product->name }} </td>
                            <td> {{ $product->price }} </td>
                            <td> {{ $product->sale_price }} </td>
                            <td>
                                {{$product->cost_price   }}
                            </td>
                            <td> {{ $product->price - $product->cost_price }} </td>
                            <td> {{ $product->main_stock }} </td>
                            <td> {{ $product->category->name ?? '---' }} </td>
                            <td><span class="badge badge-success">{{ $product->status }}</span></td>
                            <td>
                              <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">إجراء</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="{{ route('admin.products.edit', $product->id) }}">تعديل</a>
                                  <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm('هل أنت متأكد من حذف هذا المنتج؟')">حذف</button>
                                  </form>
                                   <a class="dropdown-item" href="{{ route('admin.products.show', $product->id) }}">عرض</a>
                                </div>
                              </div>
                            </td>
                          </tr>
 @endforeach
                        </tbody>

                      </table>
                      <nav aria-label="Table Paging" class="mb-0 text-muted">
                        <ul class="pagination justify-content-center mb-0">
                          <li class="page-item"><a class="page-link" href="#">السابق</a></li>
                          <li class="page-item active"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">التالي</a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->
@endsection
