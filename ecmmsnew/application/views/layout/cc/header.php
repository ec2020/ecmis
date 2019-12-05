<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="far fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3">EC-MMS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>password">
          <i class="fas fa-key"></i>
          <span>Change Password</span></a>
      </li>

      <!---add complain-->

      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>complain">
        <i class="fa fa-question-circle" aria-hidden="true"></i>
          <span>Complain</span></a>
      </li>



       <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>logout">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout </span></a>
      </li>


           <!-- Divider -->
           <hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

    </ul>