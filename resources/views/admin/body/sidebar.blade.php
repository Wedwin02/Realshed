<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        Noble<span>UI</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item nav-category">RealEstate</li>
        
        @if(Auth::user()->can('type.menu'))
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Property Type</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="emails">
            <ul class="nav sub-menu">
              @if(Auth::user()->can('type.all'))
              <li class="nav-item">
                <a href="{{route('all.type')}}" class="nav-link">All Type</a>
              </li>
              @endif
              @if(Auth::user()->can('type.add'))
              <li class="nav-item">
                <a href="{{route('add.type')}}" class="nav-link">Add Type</a>
              </li>
              @endif
            </ul>
          </div>
        </li>
        @endif

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#amenitie" role="button" aria-expanded="false" aria-controls="amenitie">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Amenities Type</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="amenitie">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('all.amenities')}}" class="nav-link">All Amenitie</a>
              </li>
              <li class="nav-item">
                <a href="{{route('add.amenities')}}" class="nav-link">Add Amenitie</a>
              </li>
          
            </ul>
          </div>
        </li>
        

        <li class="nav-item nav-category">Admin User</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#manageAdmin" role="button" aria-expanded="false" aria-controls="manageAdmin">
            <i class="link-icon" data-feather="book"></i>
            <span class="link-title">Manage Admin User</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="manageAdmin">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('all.admin')}}" class="nav-link">All Admin</a>
              </li>
              <li class="nav-item">
                <a href="{{route('add.admin')}}" class="nav-link">Add Admin</a>
              </li>
            </ul>
          </div>
        </li>


        <li class="nav-item nav-category">Roles & Permision</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#roles-pages" role="button" aria-expanded="false" aria-controls="roles-pages">
            <i class="link-icon" data-feather="book"></i>
            <span class="link-title">Roles & Permision</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="roles-pages">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('all.permission')}}" class="nav-link">All Permission</a>
              </li>
              <li class="nav-item">
                <a href="{{route('all.role')}}" class="nav-link">All Role</a>
              </li>
              <li class="nav-item">
                <a href="{{route('add.role.permission')}}" class="nav-link">Role in Permission</a>
              </li>
              <li class="nav-item">
                <a href="{{route('all.role.permission')}}" class="nav-link">All Role in Permission</a>
              </li>
            </ul>
          </div>
        </li>


      </ul>
    </div>
  </nav>
