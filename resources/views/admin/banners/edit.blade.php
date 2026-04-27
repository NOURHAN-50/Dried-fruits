@extends('admin.app')

@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <h2 class="h5 page-title mb-4">تعديل البنر</h2>

                <div class="card shadow">
                    <div class="card-body">

                        <form action="{{ route('admin.banners.update', $banner->id) }}"
                              method="POST"
                              enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            {{-- الصورة الحالية --}}
                            <div class="form-group mb-3">
                                <label>الصورة الحالية</label><br>

                                @if($banner->images->first())
                                    <img src="{{ asset('storage/banners/' . $banner->images->first()->path) }}"
                                         width="120"
                                         class="rounded border">
                                @else
                                    <span class="text-muted">لا توجد صورة</span>
                                @endif
                            </div>

                            {{-- تغيير الصورة --}}
                            <div class="form-group mb-3">
                                <label>تغيير الصورة</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            {{-- العنوان --}}
                            <div class="form-group mb-3">
                                <label>العنوان</label>
                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       value="{{ $banner->title }}">
                            </div>

                            {{-- الرابط --}}
                            <div class="form-group mb-3">
                                <label>الرابط</label>
                                <input type="text"
                                       name="link"
                                       class="form-control"
                                       value="{{ $banner->link }}">
                            </div>

                            {{-- المكان --}}
                            <div class="form-group mb-3">
                                <label>مكان العرض</label>
                                <select name="location" class="form-control">
                                    <option value="header" {{ $banner->location == 'header' ? 'selected' : '' }}>أعلى الصفحة</option>
                                    <option value="middle" {{ $banner->location == 'middle' ? 'selected' : '' }}>منتصف الصفحة</option>
                                    <option value="footer" {{ $banner->location == 'footer' ? 'selected' : '' }}>أسفل الصفحة</option>
                                    <option value="sidebar" {{ $banner->location == 'sidebar' ? 'selected' : '' }}>سايد بار</option>
                                </select>
                            </div>

                            {{-- الحالة --}}
                            <div class="custom-control custom-switch mb-3">
                                <input type="checkbox"
                                       name="is_active"
                                       class="custom-control-input"
                                       id="bannerActive"
                                       {{ $banner->is_active ? 'checked' : '' }}>
                                <label class="custom-control-label" for="bannerActive">
                                    نشط
                                </label>
                            </div>

                            <button class="btn btn-primary w-100">
                                حفظ التعديلات
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

@endsection
