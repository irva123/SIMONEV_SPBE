<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">E-MONEV SPBE <sup></sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="/home">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  @can('is_admin')
  <li class="nav-item">
    <a class="nav-link" href="/periode">
      <i class="fa fa-calendar"></i>
      <span>Periode</span></a>
  </li>


  <li class="nav-item">
    <a class="nav-link" href="/progress">
      <i class="fa fa-calendar"></i>
      <span>Progress</span></a>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Kebijakan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/domain">Domain</a>
                        <a class="collapse-item" href="/aspek">Aspek</a>
                        <a class="collapse-item" href="/indikator">Indikator</a>
                    </div>
                </div>
            </li>

  <li class="nav-item">
    <a class="nav-link" href="/user">
      <i class="fa fa-calendar"></i>
      <span>Manajemen Users</span></a>
  </li>
@endcan

@can('is_eksternal')
  <li class="nav-item">
    <a class="nav-link" href="/periode">
      <i class="fa fa-calendar"></i>
      <span>Periode</span></a>
  </li>


  <li class="nav-item">
    <a class="nav-link" href="/progress">
      <i class="fa fa-calendar"></i>
      <span>Progress</span></a>
  </li>

 <!-- Nav Item - Utilities Collapse Menu -->
 <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Kebijakan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/domain">Domain</a>
                        <a class="collapse-item" href="/aspek">Aspek</a>
                        <a class="collapse-item" href="/indikator">Indikator</a>
                    </div>
                </div>
            </li>

@endcan
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

 

</ul>