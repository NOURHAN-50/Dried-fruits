@extends('admin.app')
@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h5 page-title">إدارة الطلبات</h2>
                <p class="text-muted">عرض وتحديث حالة طلبات العملاء.</p>

                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                                    <li><button class="btn btn-sm btn-dark filter-status" data-status="all">الكل</button></li>
                                    <li><button class="btn btn-sm btn-warning filter-status" data-status="pending">طلبات جديدة</button></li>
                                    <li><button class="btn btn-sm btn-info filter-status" data-status="processing">قيد التجهيز</button></li>
                                    <li><button class="btn btn-sm btn-primary filter-status" data-status="shipped">تم الشحن</button></li>
                                    <li><button class="btn btn-sm btn-success filter-status" data-status="completed">تم التوصيل</button></li>
                                    <li><button class="btn btn-sm btn-danger filter-status" data-status="cancelled">ملغي</button></li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <input type="text" class="form-control form-control-sm" id="search" placeholder="رقم الطلب أو اسم العميل...">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover table-borderless table-striped mt-n3 mb-n1">
                            <thead>
                                <tr>
                                    <th>رقم الطلب</th>
                                    <th>العميل</th>
                                    <th>التاريخ</th>
                                    <th>المبلغ الإجمالي</th>
                                    <th>طريقة الدفع</th>
                                    <th>الحالة</th>
                                    <th>إجراءات</th>
                                </tr>
                            </thead>
                            <tbody id="ordersTable">
                                @foreach ($orders as $order)
                                    @php
                                        switch($order->status){
                                            case 'pending': $class='warning'; break;
                                            case 'processing': $class='info'; break;
                                            case 'shipped': $class='primary'; break;
                                            case 'completed': $class='success'; break;
                                            case 'cancelled': $class='danger'; break;
                                            default: $class='secondary'; break;
                                        }
                                    @endphp
                                    <tr data-status="{{ $order->status }}">
                                        <td><strong>{{ $order->id }}</strong></td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                        <td>{{ number_format($order->total_price,2) }} EGP</td>
                                        <td>{{ $order->payment->payment_method ?? 'N/A' }}</td>
                                        <td>
                                            <span id="orderStatusText-{{ $order->id }}" class="badge badge-{{ $class }}">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-primary view-details"
                                            data-id="{{ $order->id }}">
                                                عرض التفاصيل
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <nav aria-label="Table Paging" class="mb-0 text-muted mt-4">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item disabled"><a class="page-link" href="#">السابق</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">التالي</a></li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Details Modal -->
    <div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="orderDetailsModalLabel" class="modal-title">تفاصيل الطلب</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="order-details-content">
                        جار التحميل...
                    </div>
                    <div class="form-group mt-4">
                        <label for="orderStatusSelect"><strong>تحديث حالة الطلب:</strong></label>
                        <select class="form-control" id="orderStatusSelect">
                            <option value="pending">طلب جديد</option>
                            <option value="processing">قيد التجهيز</option>
                            <option value="shipped">تم الشحن</option>
                            <option value="completed">تم التوصيل</option>
                            <option value="cancelled">ملغي</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="button" class="btn btn-primary" id="saveStatusBtn">حفظ التغييرات</button>
                </div>
            </div>
        </div>
    </div>
</main>

<meta name="csrf-token" content="{{ csrf_token() }}">
@push('scripts')
<script>


$(document).ready(function() {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    let currentOrder = null;

    // عرض تفاصيل الطلب
$('#ordersTable').on('click', '.view-details', function() {
    console.log('clicked');

    let orderId = $(this).data('id');

    $('#orderDetailsModal').modal('show');
    $('#order-details-content').html('جار التحميل...');

    $.get(`/admin/orders/${orderId}`, function(html){
        $('#order-details-content').html(html);
    });
});

    // حفظ الحالة
    $('#saveStatusBtn').click(function() {
        if(!currentOrder) return;

        const status = $('#orderStatusSelect').val();

$.post(`/admin/orders/${currentOrder.id}/update-status`, {status: status}, function(res){
            if(res.success){
                let badge = $(`#orderStatusText-${currentOrder.id}`);
                badge.text(res.status);
                badge.removeClass().addClass('badge badge-' + (function(s){
                    switch(s){
                        case 'pending': return 'warning';
                        case 'processing': return 'info';
                        case 'shipped': return 'primary';
                        case 'completed': return 'success';
                        case 'cancelled': return 'danger';
                        default: return 'secondary';
                    }
                })(res.status));

                $('#orderDetailsModal').modal('hide');
                currentOrder.status = status;
            } else {
                alert('حدث خطأ!');
            }
        });
    });

    // فلترة بدون Reload
    $('.filter-status').click(function() {
        let status = $(this).data('status');

        $('#ordersTable tr').each(function() {
            let rowStatus = $(this).data('status');
            if(status === 'all' || rowStatus === status) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    // بحث مباشر live
    $('#search').on('keyup', function() {
        let value = $(this).val().toLowerCase();
        $('#ordersTable tr:visible').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

});
</script>
@endsection
