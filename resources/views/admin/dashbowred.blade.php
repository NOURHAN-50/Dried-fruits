
@extends('admin.app')
@section('content')
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-2">
                <div class="col">
                  <h2 class="h5 page-title">إدارة المديرين والمشرفين</h2>
                  <p class="text-muted">عرض وحذف وتعديل صلاحيات مديري النظام.</p>
                </div>
                <div class="col-auto">
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addAdminModal"><span class="fe fe-plus fe-16 text-white mr-2"></span>إضافة مدير جديد</a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <table class="table table-hover table-borderless table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th>الاسم</th>
                            <th>البريد الإلكتروني</th>
                            <th>الصلاحية</th>
                            <th>تاريخ الإضافة</th>
                            <th>الحالة</th>
                            <th>إجراء</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>أحمد محمود</td>
                            <td>ahmed@example.com</td>
                            <td>مدير عام (Super Admin)</td>
                            <td>01/01/2026</td>
                            <td><span class="badge badge-success">نشط</span></td>
                            <td>
                              <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">إجراء</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">تعديل البيانات</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>سارة محي</td>
                            <td>sara@example.com</td>
                            <td>محرر منتجات (Editor)</td>
                            <td>15/02/2026</td>
                            <td><span class="badge badge-success">نشط</span></td>
                            <td>
                              <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">إجراء</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">تعديل البيانات</a>
                                  <a class="dropdown-item text-danger" href="#">إيقاف الحساب</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>خالد علي</td>
                            <td>khaled@example.com</td>
                            <td>مدير طلبات (Orders Manager)</td>
                            <td>20/03/2026</td>
                            <td><span class="badge badge-warning">موقوف</span></td>
                            <td>
                              <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">إجراء</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">تعديل البيانات</a>
                                  <a class="dropdown-item text-success" href="#">تفعيل الحساب</a>
                                  <a class="dropdown-item text-danger" href="#">حذف نهائي</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Add Admin Modal -->
        <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addAdminModalLabel">إضافة حساب مدير جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group text-right">
                    <label for="adminName">الاسم بالكامل</label>
                    <input type="text" class="form-control" id="adminName" required>
                  </div>
                  <div class="form-group text-right">
                    <label for="adminEmail">البريد الإلكتروني</label>
                    <input type="email" class="form-control" id="adminEmail" required>
                  </div>
                  <div class="form-group text-right">
                    <label for="adminPass">كلمة المرور</label>
                    <input type="password" class="form-control" id="adminPass" required>
                  </div>
                  <div class="form-group text-right">
                    <label for="adminRole">الصلاحية (Role)</label>
                    <select class="form-control select2" id="adminRole">
                      <option value="superadmin">مدير عام (Super Admin)</option>
                      <option value="editor">محرر منتجات (Products Editor)</option>
                      <option value="orders">مدير طلبات (Orders Manager)</option>
                    </select>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary">حفظ البيانات</button>
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->
      @endsection
