@extends('admin.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Promotional Banners -->
            <div class="card shadow mt-5">
                <div class="card-header border-0 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <strong class="card-title mb-0">البنرات الجانبية والإعلانية</strong>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addBannerModal">
                            إضافة بنر
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="list-group list-group-flush my-n3">

                        @foreach ($banners as $banner)

                        <div class="list-group-item bg-transparent">
                            <div class="row align-items-center">

                                <div class="col-auto">
    @if($banner->images->first())
        <img src="{{ asset('storage/banner/' . $banner->images->first()->path) }}" alt="{{ $banner->title }}" width="50">
    @else
        <span>لا توجد صورة</span>
    @endif
                                </div>

                                <div class="col">
                                    <small><strong>{{ $banner->title }}</strong></small>
                                    <div class="my-0 text-muted small">{{ $banner->location }}</div>
                                </div>

                                <div class="col-auto">
                                    <span class="badge badge-success">
                                        {{ $banner->is_active ? 'نشط' : 'غير نشط' }}
                                    </span>

                                    <form action="{{ route('admin.banners.destroy', $banner->id) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-link text-muted"
                                                onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                            <span class="fe fe-trash-2"></span>
                                        </button>
                                    </form>

                                    <a href="{{ route('admin.banners.edit', $banner->id) }}"
                                       class="btn btn-sm btn-link text-primary">
                                        <span class="fe fe-edit"></span>
                                    </a>
                                </div>

                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

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
                <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group mb-3">
                    <label for="bannerImage">صورة البنر</label>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="bannerImage" required>
                      <label class="custom-file-label" for="bannerImage">اختر صورة...</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="bannerTitle">عنوان البنر</label>
                    <input type="text" name="title" class="form-control" id="bannerTitle" placeholder="العنوان...">
                  </div>
                  <div class="form-group">
                    <label for="bannerLocation">مكان العرض المتوقع</label>
                    <select name="location" class="form-control" id="bannerLocation" required>
                      <option value="header">أعلى الصفحة (تحت القائمة)</option>
                      <option value="middle">بين الأقسام الرئيسية في الصفحة الأولى</option>
                      <option value="footer">قبل الفوتر (نهاية الموقع)</option>
                      <option value="sidebar">شريط جانبي في صفحات المنتجات</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="bannerLink">الرابط الموجه</label>
                    <input type="url" name="link" class="form-control" id="bannerLink" placeholder="https://example.com/...">
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <label for="bannerStart">تاريخ بدء العرض</label>
                      <input type="date" name="start_date" class="form-control" id="bannerStart">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="bannerEnd">تاريخ الإنتهاء الإفتراضي</label>
                      <input type="date" name="end_date" class="form-control" id="bannerEnd">
                    </div>
                  </div>
                  <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" name="is_active" class="custom-control-input" id="bannerActive" checked>
                    <label class="custom-control-label" for="bannerActive">تفعيل فوري</label>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ البنر</button>
                  </div>
                </form>
            </div>
          </div>
        </div>

@endsection
