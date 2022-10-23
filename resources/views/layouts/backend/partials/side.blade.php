<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TAP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/admin" class="d-block">Dashboard</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview ">
            <a href="/admin" class="nav-link {{{ (Request::is('admin') ? 'active' : '') }}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD

              </p>
            </a>

          </li>



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               TRAINING
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/trainings" class="nav-link {{{ (Request::is('admin/trainings') ? 'active' : '') }}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Event List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/admin/users" class="nav-link {{{ (Request::is('admin/users') ? 'active' : '') }}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               ORDERS
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/orders" class="nav-link {{{ (Request::is('admin/orders') ? 'active' : '') }}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               APPLICANTS
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/applicants" class="nav-link  {{{ (Request::is('admin/applicants') ? 'active' : '') }}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>


            </ul>
          </li>



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               CONTACTS
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/contacts" class="nav-link  {{{ (Request::is('admin/contacts') ? 'active' : '') }}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{{ (Request::is('admin/industries') ? 'menu-open' : '') }}}  {{{ (Request::is('admin/categories') ? 'menu-open' : '') }}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               INDUSTRY
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/categories" class="nav-link  {{{ (Request::is('admin/categories') ? 'active' : '') }}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/industries" class="nav-link  {{{ (Request::is('admin/industries') ? 'active' : '') }}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview {{{ (Request::is('admin/posts') ? 'menu-open' : '') }}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               BLOG
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/posts" class="nav-link {{ Request::path() ==  'admin/posts' ? 'active' : ''  }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               COURSE
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/courses" class="nav-link  {{{ (Request::is('admin/courses') ? 'active' : '') }}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>

                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/exams" class="nav-link  {{{ (Request::is('admin/exams') ? 'active' : '') }}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Exams</p>
                  </a>
                </li>
              </ul>


          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               CONFIGURATIONS
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/configs" class="nav-link  {{{ (Request::is('admin/configs') ? 'active' : '') }}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Config</p>
                </a>
              </li>
            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
