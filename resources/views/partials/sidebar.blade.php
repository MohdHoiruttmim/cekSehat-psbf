<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item sidebar-category">
      <p>Navigation</p>
      <span></span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/">
        <i class="mdi mdi-view-quilt menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">User</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('data-user') }}">Data User</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('add-user') }}">Add User</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('checkup') }}">
        <i class="mdi mdi-content-paste menu-icon"></i>
        <span class="menu-title">Checkup Log</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('log-activity') }}">
        <i class="mdi mdi-run menu-icon"></i>
        <span class="menu-title">Log Activity</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://www.bootstrapdash.com/demo/spica/template/">
        <button class="btn bg-danger btn-sm menu-title">Sign Out</button>
      </a>
    </li>
  </ul>
</nav>