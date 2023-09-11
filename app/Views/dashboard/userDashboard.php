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

  <script type='importmap'>
      {
        "imports": {
          "@fullcalendar/core": "https://cdn.skypack.dev/@fullcalendar/core@6.1.8",
          "@fullcalendar/daygrid": "https://cdn.skypack.dev/@fullcalendar/daygrid@6.1.8"
        }
      }
    </script>
    <script type='module'>
      import { Calendar } from '@fullcalendar/core'
      import dayGridPlugin from '@fullcalendar/daygrid'
      
      document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('fullcalendar')
        const calendar = new Calendar(calendarEl, {
          plugins: [dayGridPlugin],
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listWeek'
          },
          events: <?php echo $EV; ?>,
        })
        calendar.render()
      })
    </script>
  

  <!-- Template Main CSS File -->
  <link href="public/assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="
    background-color: #01296f;">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard" class="logo2 d-flex align-items-center" >
        <img src="public/assets/img/logo-rmbg.png" alt="" style="
    filter: brightness(0) invert(1);">
        <span class="d-none d-lg-block text-white">UCLF-MiS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn text-white"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
          
      <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" id="notify-comet">
            <i class="bi bi-bell text-white"></i>
            <span class="badge bg-primary badge-number" id="noti-count"><?php
            
            echo $notCount;?></span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
            
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
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= base_url('public/uploads/' . $userdata['Photo']) ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-white"><?php echo $userdata['FirstName']?> <?php echo $userdata['LastName']?></span>
        </a>
        <!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
            <div class="icon">
              <img src="<?= base_url('public/uploads/' . $userdata['Photo']) ?>"  class="rounded-circle" height="30">
            </div>
              <span><?php echo $userdata['FirstName']?> <?php echo $userdata['LastName']?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="userprofile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="userprofile">
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
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" >
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
              <i class="bi bi-circle"></i><span>Start Discussion!</span>
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
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

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

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">                
           
            
            <!-- Calendar -->
            <div class="col-12">
              <div class="card">

                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->

                <div class="card-body">
                  <h5 class="card-title">Events |<span> Calendar</span></h5>
                  <div id="fullcalendar"></div>

                  

                </div>

              </div>
            </div><!-- End Calendar -->
            
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
          <!-- User Info -->
          <div class="col-xxl-4 col-xl-12">
          <div class="row">
          <div class="card pb-4 mb-2" style="color: #012970;">
                <h5 class="card-title text-center border-bottom">User Details</h5>
                
                  <div class="row d-flex">
                    <div class="col-lg-5 col-md-4  ">Full Name:</div>
                    <div class="col-lg-6 col-md-10"><?php echo $userdata['FirstName']?> <?php echo $userdata['LastName']?></div>
                  </div>
                    <hr>
                  <div class="row d-flex">
                    <div class="col-lg-5 col-md-4 ">Membership:</div>
                    <div class="col-lg-6 col-md-8 "><?php echo ucfirst($userdata['Membership_type'])?></div>
                  </div>
                  <hr>
                  <div class="row d-flex">
                    <div class="col-lg-5 col-md-4 ">Company:</div>
                    <div class="col-lg-6 col-md-8"><?php echo $userdata['Company']?></div>
                  </div>
                  <hr>
                  <div class="row d-flex">
                    <div class="col-lg-5 col-md-4 ">Position:</div>
                    <div class="col-lg-6 col-md-8"><?php echo $userdata['Position']?></div>
                  </div>
                
                  
          </div>
          </div>
          
            <!-- End User Info -->

            <!-- Upcoming Events Card -->
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Upcoming <span> Events</span></h5>
              </div>
              <div class="d-flex align-items-center justify-content-center pt-0">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-information-line"></i>
                    </div>
                    <div class="ps-3">
                  
                      <h6><//?php echo $userdata['Account_status']?></h6>
                   
                    </div>
                  </div>

              </div>
            </div><!-- End Upcoming Events Card -->

          <!-- Calendar -->
            <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" >
              <div class="softcard">
                <h5 class="calendar-title fs-4 text-center pt-1">Calendar </h5>
                  <div class="calendar-bar">
                    <button class="prev soft-btn"><i class="fas fa-chevron-left"></i></button>
                    <div class="current-month"></div>
                    <button class="next soft-btn"><i class="fas fa-chevron-right"></i></button>
                  </div>
                  <div class="calendar">
                    <div class="weekdays-name">
                      <div class="days-name">Mo</div>
                      <div class="days-name">Tu</div>
                      <div class="days-name">We</div>
                      <div class="days-name">Th</div>
                      <div class="days-name">Fr</div>
                      <div class="days-name">Sa</div>
                      <div class="days-name">Su</div>
                    </div>
                    <div class="calendar-days"></div>
                  </div> -->
                  <!--div class="goto-buttons">
                    <button type="button" class="btn1 prev-year">Prev Year</button>
                    <button type="button" class="btn1 today">Today</button>
                    <button type="button" class="btn1 next-year">Next Year</button>
                  </div>
              </div-->
            <!-- End Calendar -->           

          </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>UCLF-MIS</span></strong>. All Rights Reserved
    </div>
   
  </footer><!-- End Footer -->

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