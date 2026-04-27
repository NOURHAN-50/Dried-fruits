
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
              <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('admin.dashboard')}}">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">لوحة القيادة</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>إدارة المتجر</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('admin.products.index') }}">
                <i class="fe fe-shopping-bag fe-16"></i>
                <span class="ml-3 item-text">المنتجات</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('admin.categories.index') }}">
                <i class="fe fe-grid fe-16"></i>
                <span class="ml-3 item-text">التصنيفات</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="./bundles.html">
                <i class="fe fe-layers fe-16"></i>
                <span class="ml-3 item-text">الباقات المجمعة</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('admin.customers.index')}}">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text mb-0">العملاء <span class="badge badge-pill badge-info ml-1">قريباً</span></span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('admin.orders.index') }}">
                <i class="fe fe-shopping-cart fe-16"></i>
                <span class="ml-3 item-text">الطلبات</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('admin.reviews.index') }}">
                <i class="fe fe-star fe-16"></i>
                <span class="ml-3 item-text">التقييمات</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>التسويق والعروض</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('admin.discounts.index') }}">
                <i class="fe fe-percent fe-16"></i>
                <span class="ml-3 item-text">الخصومات والعروض</span>
              </a>
            </li>
                        <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('admin.ShippingZone.index') }}">
                <i class="fe fe-percent fe-16"></i>
                <span class="ml-3 item-text">
                    الشحن  </span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('admin.sliders.index') }}">
                <i class="fe fe-image fe-16"></i>
                <span class="ml-3 item-text"> السلايدر</span>
              </a>
            </li>
                        <li class="nav-item w-100">
              <a class="nav-link" href="{{ route('admin.banner.index') }}">
                <i class="fe fe-image fe-16"></i>
                <span class="ml-3 item-text"> البنرات</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>إعدادات النظام</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="./admins.html">
                <i class="fe fe-shield fe-16"></i>
                <span class="ml-3 item-text">المدراء والمشرفين</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="./telegram-settings.html">
                <i class="fe fe-message-circle fe-16"></i>
                <span class="ml-3 item-text">إعدادات تليجرام</span>
              </a>
            </li>
          </ul>
        </nav>
      </aside>
