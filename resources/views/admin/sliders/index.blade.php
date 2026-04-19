@extends('admin.app')
@section('content')
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-4">
                <div class="col">
                  <h2 class="h5 page-title">السلايدرات والبنرات</h2>
                  <p class="text-muted">إدارة الصور المتحركة والبنرات الترويجية في واجهة المتجر.</p>
                </div>
              </div>

              <!-- Sliders & Banners -->
              <div class="row">
                <!-- Main Sliders -->
                <div class="col-md-6 mb-4">
                  <div class="card shadow">
                    <div class="card-header border-0 pb-0">
                      <div class="d-flex justify-content-between align-items-center">
                        <strong class="card-title mb-0">السلايدر الرئيسي (أعلى الصفحة)</strong>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addSliderModal">إضافة شريحة</button>
                      </div>
                    </div>
                    <div class="card-body">



                      <div class="list-group list-group-flush my-n3">
                          @foreach ($sliders as $slider )
                        <div class="list-group-item bg-transparent">
                          <div class="row align-items-center">
                            <div class="col-auto">
    @if($slider->images->first())
        <img src="{{ asset('storage/slider/' . $sliser->images->first()->path) }}}" alt="{{ $slider->title }}" width="50">
    @else
        <span>لا توجد صورة</span>
    @endif
    </div>
                            <div class="col">
                              <small><strong> {{ $slider->title }} </strong></small>
                              <div class="my-0 text-muted small"> {{ $slider->link }}</div>
                            </div>
                            <div class="col-auto">
                              <span class="badge badge-success">{{ $slider->is_active ? 'نشط' : 'غير نشط' }}</span>
                              <button class="btn btn-sm btn-link text-muted"><span class="fe fe-trash-2"></span></button>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item bg-transparent">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <img src="./assets/products/p2.jpg" alt="..." class="avatar-img rounded" style="width: 60px; height: 30px; object-fit: cover;">
                            </div>
                            <div class="col">
                              <small><strong>تخفيضات نهاية العام تصل لـ 50%</strong></small>
                              <div class="my-0 text-muted small">رابط: /offers</div>
                            </div>
                            <div class="col-auto">
                              <span class="badge badge-success">نشط</span>
                              <button class="btn btn-sm btn-link text-muted"><span class="fe fe-trash-2"></span></button>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                       <!-- / .list-group -->
                    </div>

                  </div>
                </div> <!-- /.col -->

                <!-- Promotional Banners -->
                <div class="col-md-6 mb-4">
                  <div class="card shadow">
                    <div class="card-header border-0 pb-0">
                      <div class="d-flex justify-content-between align-items-center">
                        <strong class="card-title mb-0">البنرات الجانبية والإعلانية</strong>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addBannerModal">إضافة بنر</button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="list-group list-group-flush my-n3">
                        @foreach ($banners as $banner )


                        <div class="list-group-item bg-transparent">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <div class="avatar avatar-sm bg-light text-muted d-flex align-items-center justify-content-center border rounded" style="width: 60px;">
                                <span class="fe fe-image"></span>
                              </div>
                            </div>
                            <div class="col">
                              <small><strong> {{ $banner->title }}</strong></small>
                              <div class="my-0 text-muted small"> {{ $banner->location }}</div>
                            </div>
                            <div class="col-auto">
                              <span class="badge badge-success">{{ $slider->is_active ? 'نشط' : 'غير نشط' }}</span>
                              <button class="btn btn-sm btn-link text-muted"><span class="fe fe-trash-2"></span></button>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item bg-transparent">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <div class="avatar avatar-sm bg-light text-muted d-flex align-items-center justify-content-center border rounded" style="width: 60px;">
                                <span class="fe fe-image"></span>
                              </div>
                            </div>
                            <div class="col">
                              <small><strong>شحن مجاني للطلبات فوق 500</strong></small>
                              <div class="my-0 text-muted small">المكان: تحت القائمة (Header Banner)</div>
                            </div>
                            <div class="col-auto">
                              <span class="badge badge-secondary">معطل</span>
                              <button class="btn btn-sm btn-link text-muted"><span class="fe fe-trash-2"></span></button>
                            </div>
                          </div>
                        </div>
 @endforeach


                    </div> <!-- / .list-group -->
                    </div>
                  </div>
                </div> <!-- /.col -->
              </div> <!-- .row -->

            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->

        <!-- Add Slider Modal -->
        <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="addSliderModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">

                <h5 class="modal-title" id="addSliderModalLabel">إضافة شريحة (سلايدر)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('admin.sliders.store') }}"  method="post" enctype="multipart/form-data">
                    @csrf
                 <div class="form-group">
    <label for="categoryImage">صورة التصنيف</label>
    <input type="file" name="image" class="form-control" >
</div>
                    <small class="form-text text-muted">الأبعاد المفضلة: 1920x600 بكسل</small>
                  </div>
                  <div class="form-group">
                    <label for="sliderTitle">العنوان الرئيسي (اختياري)</label>
                    <input type="text" name="title" class="form-control" id="sliderTitle" placeholder="مثال: خصومات الصيف!">
                    @error('title')
                     <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="sliderSubtitle">النص الفرعي (اختياري)</label>
                    <input type="text" name="subtitle" class="form-control" id="sliderSubtitle" placeholder="تفاصيل إضافية للمشتري">
                 @error('subtitle')
                     <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="sliderLink">الرابط الموجه إليه</label>
                    <input type="url" name="link" class="form-control" id="sliderLink" placeholder="https://example.com/offers">
                            @error('link')
                     <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="custom-control custom-switch">
                    <input type="checkbox"  name="is_active" class="custom-control-input" id="sliderActive" checked>
                    <label class="custom-control-label" for="sliderActive">تفعيل فوري</label>
                        @error('is_active')
                     <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="modal-footer">
                <a href="{{ route('admin.sliders.index') }}">إلغاء</a>
                <button type="submit" class="btn btn-primary">إضافة وبدء العرض</button>
              </div>
                </form>
              </div>

            </div>
          </div>
        </div>

        <!-- Add Banner Modal -->
        <div class="modal fade" id="addBannerModal" tabindex="-1" role="dialog" aria-labelledby="addBannerModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addBannerModalLabel">إضافة بنر إعلاني</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group mb-3">
                    <label for="bannerImage">صورة البنر</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="bannerImage">
                      <label class="custom-file-label" for="bannerImage">اختر صورة...</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="bannerLocation">مكان العرض المتوقع</label>
                    <select class="form-control" id="bannerLocation">
                      <option>أعلى الصفحة (تحت القائمة)</option>
                      <option>بين الأقسام الرئيسية في الصفحة الأولى</option>
                      <option>قبل الفوتر (نهاية الموقع)</option>
                      <option>شريط جانبي في صفحات المنتجات</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="bannerLink">الرابط الموجه</label>
                    <input type="url" class="form-control" id="bannerLink" placeholder="https://example.com/...">
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <label for="bannerStart">تاريخ بدء العرض</label>
                      <input type="date" class="form-control" id="bannerStart">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="bannerEnd">تاريخ الإنتهاء الإفتراضي</label>
                      <input type="date" class="form-control" id="bannerEnd">
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary">حفظ البنر</button>
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->

@endsection
