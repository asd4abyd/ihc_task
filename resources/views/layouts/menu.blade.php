<ul class="metismenu left-sidenav-menu">
  <li class="menu-label mt-0">Main</li>
  <li><a href="{{ url('/') }}"><i data-feather="home" class="align-self-center menu-icon"></i><span>Home</span></a></li>
  @admin()
  <li><a href="javascript: void(0);"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Dashboard</span><span class="menu-arrow"><i
          class="mdi mdi-chevron-right"></i></span></a>
    <ul class="nav-second-level" aria-expanded="false">
      <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.non_selected') }}"><i class="ti-control-record"></i>Non-selected Products</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.count_active_products') }}"><i class="ti-control-record"></i>Count active products</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.summarized_prices_products') }}"><i class="ti-control-record"></i>Summarized prices of products</a></li>
    </ul>
  </li>
  <li><a href="{{ route('product.index') }}"><i data-feather="box" class="align-self-center menu-icon"></i><span>Products</span></a></li>
  @else
  <li><a href="{{ route('product_customer') }}"><i data-feather="box" class="align-self-center menu-icon"></i><span>Products</span></a></li>
  @endadmin()
</ul>