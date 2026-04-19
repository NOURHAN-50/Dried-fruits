@extends('admin.app')
@section('content')
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-4">
                <div class="col">
                  <h2 class="h5 page-title">التقييمات والمراجعات</h2>
                  <p class="text-muted">مراجعة تقييمات العملاء للمنتجات والموافقة عليها لتظهر في المتجر.</p>
                </div>
              </div>

              <!-- Reviews Table -->
              <div class="card shadow">
                <div class="card-body">
                  <table class="table table-hover table-borderless table-striped mt-n3 mb-n1">
                    <thead>
                        <tr>
                        <th>المنتج</th>
                        <th>العميل</th>
                        <th>التقييم</th>
                        <th style="width: 35%;">التعليق</th>
                        <th>التاريخ</th>
                        <th>الحالة</th>
                        <th>إجراءات</th>
                      </tr>
                    </thead>
                    <tbody>
                         @foreach ($reviews as $review)
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-sm mr-2">
                              <img src="./assets/products/p1.jpg" alt="..." class="avatar-img rounded">
                            </div>
                            <span> {{ $review->product->name }} </span>
                          </div>
                        </td>
                        <td> {{ $review->customer->name }} </td>
            <td>
@for($i = 1; $i <= 5; $i++)
    <span class="fe fe-star {{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}"></span>
@endfor
</td>
                        <td><p class="mb-0 small text-truncate" style="max-width: 250px;"> {{ $review->comment }} </p></td>
                        <td>{{ $review->created_at->format('d/m/Y') }}</td>
                        <td><span class="badge badge-warning">{{ $review->approved ? 'موافق عليه' : 'بانتظار الموافقة' }} </span></td>
<td>
@if(!$review->approved)
<form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST" class="d-inline">
    @csrf
    @method('PATCH')
    <button class="btn btn-sm btn-success">
        <span class="fe fe-check mr-1"></span>موافقة
    </button>
</form>
@endif

    <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger"><span class="fe fe-x mr-1"></span>رفض</button>
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
      </main> <!-- main -->
    </div>

@endsection
