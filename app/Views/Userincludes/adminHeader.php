<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard" class="logo2 d-flex align-items-center">
        <img src="public/assets/img/logo-rmbg.png" alt="">
        <span class="d-none d-lg-block">UCLF-MiS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
      <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">1</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have new notifications
              <!--a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a-->
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

           
            <li>
              <hr class="dropdown-divider">
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        
    
        <li class="nav-item dropdown pe-3">

        

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="bi bi-person-circle" data-bs-toggle="dropdown">
          <img src="http://localhost/UCLF/public/uploads/1687989944_f8bfdc4f94d47574e0b7.jpeg" alt="Profile" class="rounded-circle align-self-center" style="max-width: 63px;">
             
            <div class="label">
                <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $userdata->username?></span>
            </div>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $userdata->username?></h6>
              <span><?php echo ("Admin")?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="adminProfile">
                <i class="bi bi-person-square"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users">
                <i class="bi bi-people"></i>
                <span>User Accounts</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-stickies"></i>
                <span>Forum</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            
            <li>
              <a class="dropdown-item d-flex align-items-center" href='dashboard/logout'>
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>