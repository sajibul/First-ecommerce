<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item has-treeview">
      <a href="{{route('home')}}" class="nav-link {{Request::is('home') ? 'active' : ''}}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <!-- <i class="right fas fa-angle-left"></i> -->
        </p>
      </a>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Management
          <i class="fas fa-angle-left right"></i>
          <span class="badge badge-info right"></span>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('category.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>All Category</p>
          </a>
        </li>
        <li class="nav-item">
        <a href="{{route('subcategory.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>All SubCategory</p>
          </a>
        </li>
        <li class="nav-item">
        <a href="{{route('brand.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Brand</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="{{url('Productes')}}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Productes
          <!-- <i class="right fas fa-angle-left"></i> -->
        </p>
      </a>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Manage User
          <i class="fas fa-angle-left right"></i>
          <span class="badge badge-info right"></span>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>All Users</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>User Profile</p>
          </a>
        </li>
      </ul>
    </li>

</nav>
