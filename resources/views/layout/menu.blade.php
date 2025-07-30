<style type="text/css" media="screen">
  .nav ul li p !important {
    font-size: 12px;
  }
  .infoku {
    margin-left: 20px; 
    text-transform: uppercase;
    color: yellow;
    font-size: 11px;
  }
</style>
<style>
.custom-sidebar {
        background: linear-gradient(rgba(215, 45, 33, 0.85), rgba(228, 145, 51, 0.85)), 
        url("{{ asset('img/bg.png') }}") no-repeat center bottom;
        background-size: cover;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        border-bottom: 4px solid rgba(255, 255, 255, 0.3); /* Garis border bawah */
        margin: 5px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease-in-out;
    }

  .custom-sidebar:hover {
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
  }
</style>


<!-- Main Sidebar Container -->
  {{-- <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgba(50, 83, 194, 0.746); border-top-right-radius: 15px; border-top-left-radius: 15px; margin: 2px 2px 2px 2px;"> --}}
    <aside class="main-sidebar sidebar-dark-primary elevation-4 custom-sidebar">
    <a href="{{ route('dashboard') }}" class="brand-link d-flex flex-column align-items-center" style="height: auto;">
      <img id="logo_wrap"   src="{{ asset('img/qms_1.png') }}" style="width: 200px; height: 70px;">
    </a>

    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


            <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
             @php
                $menus = DB::table('mst.mst_menu')
                    ->leftJoin('mst.mst_role_menu', 'mst.mst_menu.id', '=', 'mst.mst_role_menu.mst_menu_id')
                    ->leftJoin('mst.mst_user_role', 'mst.mst_role_menu.mst_user_role_id', '=', 'mst.mst_user_role.id')
                    ->where('mst_user_role.role_name', session()->get('modules')['role'] ?? '')
                    ->where('mst_menu.is_active', true)
                    ->orderBy('mst.mst_menu.menu_order', 'asc')
                    ->select('mst.mst_menu.*', 'mst.mst_role_menu.mst_user_role_id', 'mst.mst_user_role.role_name')
                    ->get();

                $menuTree = $menus->groupBy('menu_parent');
                @endphp

              @if(isset($menuTree[0]) && count($menuTree[0]) > 0)
                @foreach ($menuTree[0] as $parent)
                    @php
                        $hasChildren = isset($menuTree[$parent->id]) && count($menuTree[$parent->id]) > 0;
                        $isParentActive = Request::is(ltrim($parent->menu_url, '/') . '*');
                    @endphp

                  
                    <li class="nav-item {{ $hasChildren ? 'has-treeview' : '' }} {{ $isParentActive ? 'menu-is-opening menu-open' : '' }}">
                        <a href="{{ $hasChildren ? '#' : route($parent->menu_url) }}" class="nav-link">
                            <i class="{{ $parent->menu_icon }} nav-icon"></i>
                            <p>
                                {{ $parent->menu_name }}
                                @if ($hasChildren)
                                    <i class="fas fa-angle-left right"></i>
                                @endif
                            </p>
                        </a>

                     
                        @if ($hasChildren)
                            <ul class="nav nav-treeview">
                                @foreach ($menuTree[$parent->id] as $child)
                                    @php
                                        $isChildActive = Request::is(ltrim($child->menu_url, '/') . '*');
                                    @endphp
                                    <li class="nav-item ml-4 {{ $isChildActive ? 'active' : '' }}">
                                        <a href="{{ route($child->menu_url) }}" class="nav-link">
                                            <i class="{{ $child->menu_icon }} nav-icon"></i>
                                            <p>{{ $child->menu_name }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
                @else
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-exclamation-triangle"></i>
                        <p>No Menu Available</p>
                    </a>
                </li>
              @endif


                <div style="margin-top: 80px;"></div>




          
        </ul>
      </nav>

    </div>

  </aside>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const logoWrap = document.getElementById('logo_wrap');
      const logoTitle = document.getElementById('logo_title');
      const sidebarToggle = document.querySelector('[data-widget="pushmenu"]'); 
  
      sidebarToggle.addEventListener('click', function () {
        const isSidebarCollapsed = document.body.classList.contains('sidebar-collapse');
  
        if (isSidebarCollapsed) {
          // Sidebar collapsed: ganti logo dan tampilkan title
          logoWrap.src = "{{ asset('img/qms_1.png') }}";
          logoWrap.style.width = "200px";
          logoWrap.style.height = "70px";
          logoTitle.style.display = "block";
        } else {
          // Sidebar expanded: kembalikan ke logo default dan sembunyikan title
          logoWrap.src = "{{ asset('img/qms_logo.png') }}";
          logoWrap.style.width = "100px";
          logoWrap.style.height = "100px";
          logoTitle.style.display = "none"; 

         
        }
      });
    });
  </script>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <section class="content">



              