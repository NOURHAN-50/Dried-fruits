@extends('admin.app')
@section('content')
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-4">
                <div class="col">
                  <h2 class="h5 page-title">نظام ادارة العملاء (Customer Intelligence)</h2>
                  <p class="text-muted">تحليل بيانات العملاء، تقسيمهم (Segmentation)، وتوجيه الحملات التسويقية بذكاء.</p>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-primary"><span class="fe fe-download fe-16 text-white mr-2"></span>تصدير (Export)</button>
                </div>
              </div>

              <!-- Metrics Cards -->
              <div class="row mb-4">
                <div class="col-md-3">
                  <div class="card shadow border-0 bg-primary text-white">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary-light">
                            <i class="fe fe-16 fe-users text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-light mb-0">إجمالي العملاء</p>
                          <span class="h3 mb-0 text-white">{{ $totalCustomers}}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card shadow border-0">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-success text-white">
                            <i class="fe fe-16 fe-star mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-muted mb-0">عملاء VIP</p>
                          <span class="h3 mb-0">{{ number_format($vipPercentage,2) }}%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card shadow border-0">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-warning text-white">
                            <i class="fe fe-16 fe-shopping-cart mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-muted mb-0">متوسط قيمة الطلب (AOV)</p>
                          <span class="h3 mb-0 text-success">{{ number_format($aov, 2) }} EGP </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card shadow border-0">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-danger text-white">
                            <i class="fe fe-16 fe-user-x mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                        <p class="small text-muted mb-0">عملاء مهددون (At Risk)</p>
                        <span class="h3 mb-0">{{$atRisk}}</span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                </div>

                <!-- Filters & Smart Segmentation -->
                <div class="card shadow mb-4">
                <div class="card-header border-0 bg-white pb-0">
                <h6 class="mb-0">الفلترة الذكية (Smart Segmentation)</h6>
                </div>
                <div class="card-body">
                <div class="row">
                    <form action="{{ route('admin.customers.index') }}" method="GET" class="form-row">
                    <div class="col-md-3 mb-3">
                    <label class="small text-muted">الشريحة (Segment)</label>
                <select name="segment" class="form-control" onchange="this.form.submit()">
                <option value="">الكل</option>
                <option value="vip" {{ request('segment') == 'vip' ? 'selected' : '' }}>VIP</option>
                <option value="active" {{ request('segment') == 'active' ? 'selected' : '' }}>نشط</option>
                <option value="lost" {{ request('segment') == 'lost' ? 'selected' : '' }}>خامل</option>
                </select>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label class="small text-muted">السلوك و التصنيف (Tags)</label>
                   <select name="tag" class="form-control" onchange="this.form.submit()">
    <option value="">الكل</option>
    <option value="discount" {{ request('tag') == 'discount' ? 'selected' : '' }}>Discount Hunters</option>
    <option value="abandoned" {{ request('tag') == 'abandoned' ? 'selected' : '' }}>Abandoned Cart</option>
</select>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label class="small text-muted">إجمالي الإنفاق (LTV)</label>
<select name="tag" class="form-control" onchange="this.form.submit()">
    <option value="">الكل</option>
    <option value="discount" {{ request('tag') == 'discount' ? 'selected' : '' }}>Discount Hunters</option>
    <option value="abandoned" {{ request('tag') == 'abandoned' ? 'selected' : '' }}>Abandoned Cart</option>
</select>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label class="small text-muted">المصدر والتسجيل</label>
<select name="ltv" class="form-control" onchange="this.form.submit()">
    <option value="">كل القيم</option>
    <option value="high" {{ request('ltv') == 'high' ? 'selected' : '' }}>أكثر من 10,000</option>
    <option value="medium" {{ request('ltv') == 'medium' ? 'selected' : '' }}>5,000 - 10,000</option>
    <option value="low" {{ request('ltv') == 'low' ? 'selected' : '' }}>أقل من 1,000</option>
</select>
                    </div>
                </form>
                  </div>

                </div>
              </div>

              <!-- Customers Table -->
              <div class="card shadow">
                <div class="card-body p-0">
                  <table class="table table-hover table-borderless table-striped mb-0">
                    <thead class="thead-dark">
                      <tr>
                        <th>العميل (الأساسيات)</th>
                        <th>القيمة (Customer Value)</th>
                        <th>السلوك والتصنيفات (Behavior)</th>
                        <th>مؤشرات الإجراءات</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        @foreach($customers as $customer)
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="avatar avatar-sm mr-3">
                              <img src="./assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
                            </div>
                            <div>
                              <strong>{{ $customer->name }}</strong>
                              <p class="small text-muted mb-0">{{ $customer->email }} <br> {{ $customer->phone }}</p>
                              <p class="small text-muted mb-0">{{ $customer->city }} (Facebook)</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <strong class="text-success">{{ $customer->orders_sum_total_price ?? 0 }}</strong> <span class="small text-muted">(LTV)</span><br>
                          <span class="small">الطلبات: {{ $customer->orders_count ?? 0 }} طلب</span><br>
                          <span class="small">المتوسط: EGP {{ $customer->orders->avg('total_price') ?? 0 }} / طلب</span>
                        </td>
                        <td>
                          <div>
                            @if (($customer->orders_sum_total_price ?? 0) > 10000)
                              <span class="badge badge-success mb-1">VIP Customer</span>
                            @endif
                            <span class="badge badge-info mb-1">Tech Lover</span>
                          </div>
                          @if (($customer->order))

                          @endif
                          <p class="small text-muted mb-0">آخر طلب: منذ 5 أيام</p>
                        </td>
                        <td>
                          <button class="btn btn-sm btn-primary mb-1" data-toggle="modal" data-target="#customerTimelineModal">سجل العميل (Timeline)</button><br>
                          <div class="dropdown inline">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown">تسويق</button>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item text-success" href="#"><i class="fe fe-message-circle mr-2"></i> WhatsApp Message</a>
                              <a class="dropdown-item text-primary" href="#"><i class="fe fe-mail mr-2"></i> Send Email</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                          @endforeach
                    </tbody>
                  </table>
                  <nav aria-label="Table Paging" class="mb-0 text-muted mt-4 p-3">
                    <ul class="pagination justify-content-end mb-0">
                      <li class="page-item disabled"><a class="page-link" href="#">السابق</a></li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">التالي</a></li>
                    </ul>
                  </nav>
                </div>
              </div>

            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->

        <!-- Customer Timeline Modal -->
        <div class="modal fade" id="customerTimelineModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header bg-light">
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-md mr-3">
                    <img src="./assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
                  </div>
                  <div>
                    <h5 class="modal-title mb-0">أحمد محمود <span class="badge badge-success small">VIP Rank</span></h5>
                    <p class="small text-muted mb-0">ahmed@example.com | انضم منذ: 01 يناير 2026</p>
                  </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body p-4 text-right">

                <h6 class="text-muted mb-3">سجل وسلوك العميل (Customer Timeline)</h6>
                <div class="timeline">
                  <div class="pb-3 timeline-item item-success">
                    <div class="pl-4">
                      <div class="mb-1"><strong>إتمام طلب جديد (#ORD-1099)</strong></div>
                      <p class="small text-muted mb-0">قام بشراء "ساعة ذكية" بقيمة 2000 ج.م <span class="badge badge-light">منذ يومين</span></p>
                    </div>
                  </div>
                  <div class="pb-3 timeline-item item-primary">
                    <div class="pl-4">
                      <div class="mb-1"><strong>فتح رسالة بريد (Marketing Email)</strong></div>
                      <p class="small text-muted mb-0">تفاعل مع حملة "عروض الربيع 2026" <span class="badge badge-light">منذ 3 أيام</span></p>
                    </div>
                  </div>
                  <div class="pb-3 timeline-item item-warning">
                    <div class="pl-4">
                      <div class="mb-1"><strong>عربة متروكة (Abandoned Cart)</strong></div>
                      <p class="small text-muted mb-0">تخلى عن 3 منتجات في السلة بقيمة 1500 ج.م <span class="badge badge-light">منذ أسبوع</span></p>
                    </div>
                  </div>
                  <div class="pb-3 timeline-item item-info">
                    <div class="pl-4">
                      <div class="mb-1"><strong>استخدام كوبون خصم (NEW20)</strong></div>
                      <p class="small text-muted mb-0">حصل على خصم 20% في طلبه الأول <span class="badge badge-light">يناير 2026</span></p>
                    </div>
                  </div>
                </div>

                <div class="row mt-4 border-top pt-4">
                  <div class="col-md-6 text-right">
                    <h6 class="text-muted text-right">نظام التتبع (Integrations)</h6>
                    <ul class="list-unstyled small text-muted text-right">
                      <li><i class="fe fe-facebook mr-2 text-primary"></i> مسجل عبر إعلان Facebook (fbc_id: 1982...)</li>
                      <li><i class="fe fe-monitor mr-2 text-secondary"></i> يتصفح من هاتف موبايل (iOS)</li>
                    </ul>
                  </div>
                  <div class="col-md-6 text-right">
                    <h6 class="text-muted text-right">مؤشرات الخطر (Risk Indicators)</h6>
                    <ul class="list-unstyled small text-muted text-right">
                      <li><i class="fe fe-check-circle mr-2 text-success"></i> عنوان التسليم ثابت لتاريخه</li>
                      <li><i class="fe fe-check-circle mr-2 text-success"></i> نسبة استلام الطلبات النقدية 100%</li>
                    </ul>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <div class="dropdown inline">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">إجراءات ذكية (Actions)</button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item text-success" href="#"><i class="fe fe-message-circle mr-2"></i> رسالة WhatsApp</a>
                    <a class="dropdown-item text-primary" href="#"><i class="fe fe-mail mr-2"></i> إعادة استهداف (Email)</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

@endsection
