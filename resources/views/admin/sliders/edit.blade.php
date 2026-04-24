@extends('admin.app')

@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <h2 class="h5 page-title mb-4">تعديل السلايدر</h2>

                <div class="card shadow">
                    <div class="card-body">

                        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- صورة حالية --}}
                            <div class="form-group">
                                <label>الصورة الحالية</label><br>

                                @if($slider->images->first())
                                    <img src="{{ asset('storage/sliders/' . $slider->images->first()->path) }}"
                                         width="120">
                                @else
                                    <span>لا توجد صورة</span>
                                @endif
                            </div>

                            {{-- تغيير الصورة --}}
                            <div class="form-group">
                                <label>تغيير الصورة</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            {{-- العنوان --}}
                            <div class="form-group">
                                <label>العنوان</label>
                                <input type="text" name="title" class="form-control"
                                       value="{{ $slider->title }}">
                            </div>

                            {{-- الرابط --}}
                            <div class="form-group">
                                <label>الرابط</label>
                                <input type="text" name="link" class="form-control"
                                       value="{{ $slider->link }}">
                            </div>

                            {{-- الحالة --}}
                            <div class="custom-control custom-switch">
                                <input type="checkbox"
                                       name="is_active"
                                       class="custom-control-input"
                                       id="activeSwitch"
                                       {{ $slider->is_active ? 'checked' : '' }}>
                                <label class="custom-control-label" for="activeSwitch">
                                    نشط
                                </label>
                            </div>

                            <br>

                            <button class="btn btn-primary">تحديث</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
