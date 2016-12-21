<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Adsense Mobile</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{ Auth::user()->name }}</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
        <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
          <li><a><i class="fa fa-laptop"></i> Master <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ url('/applications') }}">Application</a></li>
              <li><a href="{{ url('/adunit') }}">Adsense Unit</a></li>
              <li><a href="{{ url('projects') }}">Project</a></li>
            </ul>
          </li>
          <br>
      
      <div class="menu_section">
        <h3>User Management</h3>
        <ul class="nav side-menu">
         <li><a href="{{ url('/users') }}"><i class="fa fa-users"></i> Users</a></li>
         <li><a><i class="fa fa-book"></i> Reports <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ url('/reports') }}">List Report</a></li>                  
              <li><a href="{{ route('importfile') }}">Import File</a></li>  
            </ul>
          </li>                                  
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->
  </div>
</div>
</li>
</ul>
</div>