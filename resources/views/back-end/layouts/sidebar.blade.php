  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="{{URL::to('/back-end/dashboard')}}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <a href="{{URL::to('/logout-back-end')}}" class="nav-link">Logout</a>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('back-end/dist/img/user3.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Lê Quang Ngọc An</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{URL::to('/back-end/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas "></i>
              <p>
                Quản lí danh mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/back-end/list-category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/back-end/add-category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới danh mục</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa"></i>
              <p>
                Quản lí sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/back-end/list-product')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/back-end/add-product')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas"></i>
              <p>
                Quản lí tài khoản
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/back-end/list-user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tài khoản</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/back-end/add-user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới tài khoản</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{URL::to('/back-end/customer')}}" class="nav-link">
              <i class="nav-icon fas"></i>
              <p>
                Quản lí khách vãng lai
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{URL::to('/back-end/comment')}}" class="nav-link">
              <i class="nav-icon fas"></i>
              <p>
                Quản lí bình luận
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{URL::to('/back-end/order')}}" class="nav-link">
              <i class="nav-icon fas"></i>
              <p>
                Quản lí đơn hàng
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas "></i>
              <p>
                Quản lí mã giảm giá
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('back-end/list-coupon')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách mã giảm giá</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('back-end/add-coupon')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới mã giảm giá</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas "></i>
              <p>
                Quản lí slider
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/back-end/list-slide')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/back-end/add-slide')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới slider</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas "></i>
              <p>
                Quản lí tin tức
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/back-end/list-blog')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tin tức</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/back-end/add-blog')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới tin tức</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{URL::to('/back-end/contact')}}" class="nav-link">
              <i class="nav-icon fas "></i>
              <p>
                Quản lí liên hệ
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{URL::to('/back-end/setting')}}" class="nav-link">
              <i class="nav-icon fas "></i>
              <p>
                Quản lí setting
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>