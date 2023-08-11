<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - UCLF</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="public/assets/img/logo-rmbg.png" rel="icon">
  <link href="public/assets/img/logo-rmbg.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="public/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="public/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="public/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="public/assets/css/style.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
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

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" id="notify-comet">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number" id="noti-count"><?php
            
            echo $notCount;?></span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
            <!--div class="inbox fw-wrap">                
                <h3 class="flex--item js-inbox-header-all">Inbox (all)</h3>
                <form action="http://localhost/UCLF/updateNoti" method="post" name="UpdateNotiForm" enctype="multipart/form-data" accept-charset="utf-8"> 
                  <input type="hidden" name="user_id" value="</?php echo $userdata['user_id'];?>">                  
                <span><button type="submit" class="btn fs-notif jc-end" >Mark all as read</button></span>  
                <form>             
            </div-->
              New notifications here!
              <a href="notify"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

           
              <?php 
              //$notifications = array_slice($notif, 0 , 5);
              $recentnoti = array_reverse($notif);
              $recentnotifications = array_slice($recentnoti, 0 , 5);
              function getTimeDifferenceString($interval) {
                if ($interval->y > 0) {
                    return $interval->y . ' year' . ($interval->y > 1 ? 's' : '') . ' ago';
                } elseif ($interval->m > 0) {
                    return $interval->m . ' month' . ($interval->m > 1 ? 's' : '') . ' ago';
                } elseif ($interval->d > 0) {
                    return $interval->d . ' day' . ($interval->d > 1 ? 's' : '') . ' ago';
                } elseif ($interval->h > 0) {
                    return $interval->h . ' hour' . ($interval->h > 1 ? 's' : '') . ' ago';
                } elseif ($interval->i > 0) {
                    return $interval->i . ' minute' . ($interval->i > 1 ? 's' : '') . ' ago';
                } else {
                    return 'Just now';
                }
              }   
              foreach ($recentnotifications as $recentnotif): 
              ?>
               <li class="notification-item">
              
               <form action="http://localhost/UCLF/noti" method="post" name="UpdateNotifications" enctype="multipart/form-data" accept-charset="utf-8"> 
                  <input type="hidden" name="statusID" value="<?php echo $recentnotif['id'] ;?>">             
                  <button class="btn" type="submit"><i class="jc-end bi <?php echo ($recentnotif['status'] === '1') ? 'bi-envelope-open' : 'bi-envelope-fill'; ?>"></i></button>
                </form>
                <div class="fs-notif ">
              <?php 
              echo $recentnotif['msg'];
              ?>
              
              <div class="date-notif">
             
              
             <?php 
                  $formatDate = date('M jS, Y', strtotime($recentnotif['created_at']));                  
                 // echo $formatDate;
              ?>
              
              <?php 
              $createdAt = new DateTime($recentnotif['created_at']);
              //Getting the time difference
              $now = new DateTime(); // Current date and time
              $interval = $now->diff($createdAt);

              // Display the time difference as "X mins ago", "X hours ago", "X days ago," etc.
              $timeDifference = getTimeDifferenceString($interval);
              echo $timeDifference;
              ?>
              </div>
              </div>
              </li>
              
              <li>
                <hr class="dropdown-divider">
              </li>
              <?php endforeach; ?>
            
           


            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#"></a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        
    
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center justify-content-center pe-0" href="bi bi-person-circle" data-bs-toggle="dropdown">
          
              <img src="<?= base_url('public/uploads/' . $acc_board['Photo']) ?>"  class="rounded-circle obj">
            
              <span class="d-none d-md-block dropdown-toggle ps-2"><?= $userdata['FirstName']?> <?php echo $userdata['LastName']?></span>
            
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            <div class="icon">
              <!--i class="bi bi-person-circle "></i--> 
              <?php echo $userdata['FirstName']?> <?php echo $userdata['LastName']?>
            </div>
              <span><?php echo $userdata['Position']?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="userprofile">
                <i class="bi bi-person-circle"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="forum">
                <i class="bi bi-chat-quote"></i>
                <span>Forum</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
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

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->     
      

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
          <i class="bi bi-person-vcard"></i><span>Membership Directory</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="Indirectory" class="">
              <i class="bi bi-person-lock" style="font-size: 16px;"></i><span>Individual</span>
            </a>
          </li>
          <li>
            <a href="Instidirectory">
              <i class="ri ri-building-line" style="font-size: 16px;"></i><span>Institutional</span>
            </a>
          </li>
          <li>
            <a href="Fship">
              <i class="bi bi-people" style="font-size: 16px;"></i><span>Law Fellowship</span>
            </a>
          </li>
          <li>
            <a href="Life">
              <i class="ri ri-user-heart-line" style="font-size: 16px;"></i><span>Life</span>
            </a>
          </li>
          <li>
            <a href="Studirectory">
              <i class="bi bi-mortarboard" style="font-size: 16px;"></i><span>Student</span>
            </a>
          </li>
        </ul>
      </li><!-- End Directory Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="userprofile">
          <i class="bi bi-person-circle"></i>
          <span>Account Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-chat-quote"></i><span>Forum</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forum">
              <i class="bi bi-circle"></i><span>Start Discussion</span>
            </a>
          </li>
          <li>
            <a href="viewTopic">
              <i class="bi bi-circle"></i><span>Discussion Categories</span>
            </a>
          </li>          
        </ul>
      </li><!-- End Forum Nav -->  
      
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">Directory</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Directory columns -->
        <div class="col-lg-10">
          <div class="row d-flex">
                  <?php if(session()->getTempdata('success')): ?>
                  <div class='alert alert-success'><?= session()->getTempdata('success');?></div>
                  <?php endif; ?> 

                  <?php if(session()->getFlashdata('success')): ?>
                  <div class='alert alert-success'><?= session()->getFlashdata('success');?></div>
                  <?php endif; ?>

                  <?php if(session()->getFlashdata('error')): ?>
                  <div class='alert alert-danger'><?= session()->getFlashdata('error');?></div>
                  <?php endif; ?>
                  
                  <?php if(session()->getTempdata('error')): ?>
                  <div class='alert alert-danger'><?= session()->getTempdata('error');?></div>
                  <?php endif; ?>

                  <?php if(isset($validation)):?>
                      <div class="alert alert-danger"><?= $validation->listErrors();?></div>
                  <?php endif;?>
                  
                  <div class="row">
                    <?php foreach ($userdata1 as $index => $user): ?> 
                        <div class="col-xl-4">
                        <div class="card clickable"  class="openPopupBtn" id="openPopupBtn" data-popup="<?php echo $index; ?>" title="About Me!">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                              <?php if (!empty($user['Photo'] )) : ?>
                                  <!-- Display the user's photo -->
                                  <img src="<?= base_url('public/uploads/' . $user['Photo']) ?>" class="rounded-circle obj" height="100">
                              <?php else : ?>
                                  <!-- Display the icon or placeholder image -->
                                  <img src="public/assets/img/usercon.png"  height="100">
                              <?php endif; ?>
                              <h3 class="text-align-left"><strong><?php echo $user['FirstName']?> <?php echo $user['LastName']?></strong></h3><!--/a-->                              
                              <h3><?php echo $user['Email']?></h3>
                              <h3>0<?php echo $user['Tel']?></h3>
                              <button id="openPopupBtn" data-popup="<?php echo $index; ?>" class="btn btn-info btn-sm" title="About Me!"><i class="bi bi-info-circle"></i></button>
                            </div>
                        </div>
                        </div>
                        <div class="popup<?php echo $index; ?>" class="popupOverlay" id="popupOverlay">
                          <div class="popup card">
                            <div class="card-body profile-card pt-4 align-items-center">
                              <button type="button" class="closebtn" id="closebtn" data-dismiss="modal" aria-label="Close" data-popup="<?php echo $index; ?>">
                              <span aria-hidden="true">×</span>
                            </button>
                              <?php if (!empty($user['Photo'] )) : ?>
                                  <!-- Display the user's photo -->
                                  <img src="<?= base_url('public/uploads/' . $user['Photo']) ?>" class="rounded-circle obj " height="100">
                              <?php else : ?>
                                  <!-- Display the icon or placeholder image -->
                                  <img src="public/assets/img/usercon.png"  height="100">
                              <?php endif; ?>
                                  <div class="row">
                                    <div class="col-lg-3 col-md-4 label "><h5>Full Name<h5></div>
                                    <div class="col-lg-9 col-md-8"><?php echo $user['FirstName']?> <?php echo $user['LastName']?></div>
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-3 col-md-4 label"><h5>Company<h5></div>
                                    <div class="col-lg-9 col-md-8"><?php echo $user['Company']?></div>
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-3 col-md-4 label"><h5>Position<h5></div>
                                    <div class="col-lg-9 col-md-8"><?php echo $user['Position']?></div>
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-3 col-md-4 label"><h5>Practice area(s)<h5></div>
                                    <div class="col-lg-9 col-md-8"><?php echo $user['Practice_area']?></div>
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-3 col-md-4 label"><h5>Email<h5></div>
                                    <div class="col-lg-9 col-md-8"><?php echo $user['Email']?></div>
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-3 col-md-4"><h5>Phone<h5></div>
                                    <div class="col-lg-9 col-md-8">0<?php echo $user['Tel']?></div>
                                  </div>

                                  <div class="pull-right">
                                    <button class="closePopupBtn" data-popup="<?php echo $index; ?>" class="btn btn-secondary">Close</button>
                                  </div> 
                            </div>                           
                          </div>
                        </div>
                       <script>
                        const openPopupBtn = document.querySelectorAll('openPopupBtn');
                        //const popupOverlay = document.getElementById('.popupOverlay');
                        const closePopupBtn = document.querySelectorAll('closePopupBtn');
                        const closebtn = document.querySelectorAll('closebtn');
                        openPopupBtn.forEach(function(btn) {
                          btn.addEventListener('click', () => {
                          document.getElementById('popupOverlay').style.display = 'block';
                          });
                        });

                        closePopupBtn.forEach(function(btn) {
                          btn.addEventListener('click', () => {
                          document.getElementById('popupOverlay').style.display = 'none';
                           });
                        });

                        closebtn.forEach(function(btn) {
                          btn.addEventListener('click', () => {
                          document.getElementById('popupOverlay').style.display = 'none';
                          });
                        });
                      </script> 
                      <!-- <script>
                        // Get all elements with the class 'openPopupBtn'
                        const openPopupBtns = document.querySelectorAll('openPopupBtn');

                        // Attach click event listener to each button
                        openPopupBtns.forEach((btn) => {
                          btn.addEventListener('click', () => {
                            // Get the data-popup attribute value
                            const popupId = btn.getAttribute('data-popup');
                            // Display the respective popup using its ID
                            document.getElementById(`popup${popupId}`).style.display = 'block';
                          });
                        });

                        // Get all elements with the class 'closePopupBtn'
                        const closePopupBtns = document.querySelectorAll('closePopupBtn');

                        // Attach click event listener to each button
                        closePopupBtns.forEach((btn) => {
                          btn.addEventListener('click', () => {
                            // Get the data-popup attribute value
                            const popupId = btn.getAttribute('data-popup');
                            // Hide the respective popup using its ID
                            document.getElementById('popup${popupId}').style.display = 'none';
                          });
                        });
                      </script>                           -->
                    <?php endforeach; ?>  
                  </div>
          </div>       
        </div><!-- End Directory columns -->
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>UCLF-MIS</span></strong>. All Rights Reserved
    </div>
  </footer>
    

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="public/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="public/assets/vendor/echarts/echarts.min.js"></script>
  <script src="public/assets/vendor/quill/quill.min.js"></script>
  <script src="public/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="public/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="public/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="public/assets/js/main.js"></script>

</body>

</html>