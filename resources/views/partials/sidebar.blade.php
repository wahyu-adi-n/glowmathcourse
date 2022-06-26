<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="/dist/img/AdminLTELogo.png" alt="Glomathcourse Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Glowmath Course</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}"
            class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('tentor.index') }}"
            class="nav-link {{ request()->is('admin/tentor*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>Tentor</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('student.index') }}"
            class="nav-link {{ request()->is('admin/siswa*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>Siswa</p>
          </a>
        </li>
        <li class="nav-item">
          <a
            href="{{ route('subject.index') }}"class="nav-link {{ request()->is('admin/subjects*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>Mata Pelajaran</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('level.index') }}"
            class="nav-link {{ request()->is('admin/tingkat*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>Tingkat</p>
          </a>
        </li>
        <li class="nav-item">
          @if (request()->user()->level == 'admin')
            <form method="POST" action="{{ route('admin.logout') }}">
              @csrf
              <button type="submit" class="btn btn-danger">Logout</button>
            </form>
          @elseif(request()->user()->level == 'tentor')
            <a href="{{ route('tentor.logout') }}" class="nav-link"><i class="nav-icon fas fa-users"></i>
              <p>Logout</p>
            </a>
          @elseif(request()->user()->level == 'siswa')
            <a href="{{ route('siswa.logout') }}" class="nav-link"><i class="nav-icon fas fa-users"></i>
              <p>Logout</p>
            </a>
          @endif
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
