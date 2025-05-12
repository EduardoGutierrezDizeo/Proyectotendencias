<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4" style="background-color: #d0bdf4; color: white;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center" style="background-color: #c2a8f0; color: white;">
      <img src="img/logo.jpeg" alt="Distribuciones Jayu Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">Distribuciones Jayu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline mt-3">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search"
          style="background-color: #c2a8f0; color: black; border: none; font-weight: bold;">
          <div class="input-group-append">
            <button class="btn btn-sidebar" style="background-color: #ff66b2; color: white;">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="{{route('productos.index')}}" class="nav-link" style="color: white;">
              <i class="nav-icon fas fa-box"></i>
              <p>Producto</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('clientes.index')}}" class="nav-link" style="color: white;">
             <i class="nav-icon fas fa-user-tie" style="color: white;"></i>
              <p>Clientes</p>
            </a>
          </li>
         <li class="nav-item">
            <a href="{{ route('proveedores.index') }}" class="nav-link" style="color: white;">
              <i class="nav-icon fas fa-truck" style="color: white;"></i>
                 <p>Proveedores</p>
             </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('facturas.index') }}" class="nav-link" style="color: white;">
              <i class="nav-icon fas fa-file-invoice" style="color: white;"></i>
                <p>Facturas</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="{{ route('compras.index') }}" class="nav-link" style="color: white;">
              <i class="nav-icon fas fa-shopping-cart" style="color: white;"></i>
                <p>Compras</p>
            </a>
        </li>




          <li class="nav-item">
            <a href="#" class="nav-link" style="color: white;">
              <i class="nav-icon fas fa-copy" style="color: #ff66b2;"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link" style="color: white;">
                  <i class="far fa-circle nav-icon" style="color: #ff66b2;"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link" style="color: white;">
                  <i class="far fa-circle nav-icon" style="color: #ff66b2;"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link" style="color: white;">
                  <i class="far fa-circle nav-icon" style="color: #ff66b2;"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link" style="color: white;">
                  <i class="far fa-circle nav-icon" style="color: #ff66b2;"></i>
                  <p>Fixed Sidebar</p>
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
