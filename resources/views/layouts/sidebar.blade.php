<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset('adminlte/dist/img/app-logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    {{-- <span class="brand-text font-weight-light"> {{ Auth::user()->name }}</span> --}}
    <span class="brand-text font-weight-light">Capex</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        @if (Auth::user()->is_admin == 1)
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-cogs fa-fw"></i>
            <p>
              Master Data
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="company" class="nav-link">
                <i class="fas fa-angle-double-right"></i>
                <p>Company</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="objective" class="nav-link">
                <i class="fas fa-angle-double-right"></i>
                <p>Objective</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="description" class="nav-link">
                <i class="fas fa-angle-double-right"></i>
                <p>Description</p>
              </a>
            </li> --}}
            <li class="nav-item">
              <a href="fixassetgroup" class="nav-link">
                <i class="fas fa-angle-double-right"></i>
                <p>Fixassetgroup</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="progress_breakdown" class="nav-link">
                <i class="fas fa-angle-double-right"></i>
                <p>Stat Rate</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="progress_breakdown" class="nav-link">
                <i class="fas fa-angle-double-right"></i>
                <p>Project</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="department" class="nav-link">
                <i class="fas fa-angle-double-right"></i>
                <p>Department BP</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="DepartmentTrans" class="nav-link">
                <i class="fas fa-angle-double-right"></i>
                <p>Department Transfer</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
        <li class="nav-item">
          <a href="/capex_new" class="nav-link">
            <i class="nav-icon fas fa-file-signature"></i>
            <p>
              New BP
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/capex_tranfer_bp" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Transfer BP 
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


