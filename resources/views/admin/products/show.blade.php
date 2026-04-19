@extends('admin.app')

@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title mb-4">عرض المنتج: {{ $product->name }}</h2>

                <!-- Basic Info -->
                <div class="card shadow mb-4">
                    <div class="card-header"><strong>المعلومات الأساسية</strong></div>
                    <div class="card-body">
                        <p><strong>السعر الأساسي:</strong> {{ $product->price }} EGP</p>
                        <p><strong>السعر قبل التخفيض:</strong> {{ $product->sale_price ?? '-' }} EGP</p>
                        <p><strong>سعر التكلفة:</strong> {{ $product->cost_price ?? '-' }} EGP</p>
                        <p><strong>المخزون:</strong> {{ $product->main_stock }}</p>
                        <p><strong>الحالة:</strong> {{ $product->status }}</p>
                        <p><strong>التصنيف:</strong> {{ $product->category->name ?? '-' }}</p>
                        <p><strong>الوصف:</strong> {!! $product->description !!}</p>
                    </div>
                </div>

                <!-- Variations -->
                <div class="card shadow mb-4">
                    <div class="card-header"><strong>المتغيرات</strong></div>
                    <div class="card-body">
                        @if($product->variations->count())
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>اللون / المقاس</th>
                                        <th>السعر (إذا اختلف)</th>
                                        <th>المخزون</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product->variations as $variation)
                                        <tr>
                                            <td>{{ $variation->weight }}</td>
                                            <td>{{ $variation->price_override ?? '-' }}</td>
                                            <td>{{ $variation->stock }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>لا توجد متغيرات لهذا المنتج.</p>
                        @endif
                    </div>
                </div>

                <!-- Images -->
                <div class="card shadow mb-4">
                    <div class="card-header"><strong>صور المنتج</strong></div>
                    <div class="card-body">
                        @if($product->images->count())
                            <div class="row">
                                @foreach($product->images as $image)
                                    <div class="col-md-3 mb-2">
                                        <img src="{{ asset('storage/products/' . $image->path) }}" class="img-fluid" alt="صورة المنتج">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>لا توجد صور لهذا المنتج.</p>
                        @endif
                    </div>
                </div>

                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">عودة للمنتجات</a>
            </div>
        </div>
    </div>
</main>
@endsection
