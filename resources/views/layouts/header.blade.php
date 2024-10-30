<?php 
$notification = 0;
 ?>

<div class="wrapper">

  <!-- Preloader -->
<!--   <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> -->
      <li class="nav-item d-none d-sm-inline-block">
        <a wire:navigate href="/dashboard" class="nav-link">Home</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin/view-contacts" class="nav-link">Contacted Us</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->

      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-show" id="remove_class" onclick="show()" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php if($notification>0) { echo $notification; } ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right drop-notification" id="drop-noti">
          <span class="dropdown-item dropdown-header"> <?php if($notification>0) { echo $notification." Notification"; } ?></span>
          <?php if($notification>0){ ?>
          <div class="dropdown-divider"></div>
          <a href="/admin/view-contacts" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?php echo @$notification; ?> new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
            <?php } ?>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a wire:navigate href="/" class="brand-link" style="text-align:center;">
      <!-- <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">PRATIK CODE CLUB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        @if(auth()->user()->remember_token == 'admin')
          <img src="{{asset('admin/dist/img/admin-profile-pic.webp')}}" class="img-circle elevation-2" alt="User Image">
        @else
          <img src="{{asset('admin/dist/img/no-profile-pic.webp')}}" class="img-circle elevation-2" alt="User Image">
        @endif
        </div>
        <div class="info">
          <a sytle="pointer-event:none;" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Dashboard -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a wire:navigate href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
        </ul>
      </nav>

      <nav>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a wire:navigate href="/technology" class="nav-link {{ Request::is('technology') ? 'active' : '' }}"> 
            <i class="nav-icon fas fa-globe"></i>
              <p>Technology</p>
            </a>
          </li>
        </ul>
      </nav>

      <nav>
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item has-treeview menu-open">
            <div href="#" class="nav-link {{ Request::is('code/search', 'code/detail/*', 'code/store', 'code/manage', 'code/store/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-solid fa-code"></i>
              <p>
                Code
                <i class="right fas fa-angle-left"></i>
              </p>
          </div>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a wire:navigate href="/code/search" class="nav-link {{ Request::is('code/search', 'code/detail/*') ? 'active' : '' }}">
                  <i class="nav-icon fa-solid fa-magnifying-glass ml-2"></i>
                  <p>Search Your Code</p>
                </a>
              </li>
              <li class="nav-item">
                <a wire:navigate href="/code/store" class="nav-link {{ Request::is('code/store') ? 'active' : '' }}">
                  <i class="nav-icon fa-solid fa-square-plus ml-2"></i>
                  <p>Store Your Code</p>
                </a>
              </li>
              <li class="nav-item">
                <a wire:navigate href="/code/manage" class="nav-link {{ Request::is('code/manage') || Request::is('code/store/*') ? 'active' : '' }}">
                  <i class="nav-icon fa-solid fa-list-check ml-2"></i>
                  <p>Manage Your Code</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>

      <!-- Log-out -->
      <nav>
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="/log-out" class="nav-link">
              <i class="nav-icon fas fa-solid fa-right-from-bracket"></i>
              <p>
                Log-out
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

