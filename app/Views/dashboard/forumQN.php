<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forum - UCLF</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="public/assets/img/logo-ico.png" rel="icon">
  <link href="public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="public/assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <link rel="stylesheet" href="public/assets/plugins/toastr/toastr.min.css">
  <script src="public/assets/plugins/toastr/toastr.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!-- Include toastr CSS -->
  <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/dist/toastr.min.css" rel="stylesheet" />

  <!-- Include toastr JS -->
  <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/dist/toastr.min.js"></script>

  <!-- Add this JavaScript code in your HTML or in a separate script file -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- <script src="https://cdn.tiny.cloud/1/sdveile2wsrk90g540a76zejs0q0uxuhbgki3k3mn5h4phcp/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
  <script src="public/assets/vendor/tinymce/tinymce.min.js"></script>

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

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" id="notify-comet">
            <i class="bi bi-bell"></i>
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
            
            
            <script>
              function fetchNotifications() {
                // AJAX request to fetch notifications
                // Fetch new notifications from the server
                $.ajax({
                  url: 'notifications/fetchRealtimeNotifications', // Replace with your server-side URL to fetch new notifications
                  type: 'GET',
                  dataType: 'json',
                  headers: {'X-Requested-With': 'XMLHttpRequest'},
                  success: function(data) {
                    // Update the notification dropdown with the new notifications
                    updateNotifications(data);
                  },
                  error: function(error) {
                    console.error('Error fetching notifications:', error);
                  }
                });
                // Fetch the notification count from the server
                $.ajax({
                  url: '/notifications/getNotificationCount', // Replace with your server-side URL to get the notification count
                  type: 'GET',
                  dataType: 'json',
                  headers: {'X-Requested-With': 'XMLHttpRequest'},
                  success: function(data) {
                    // Update the notification count on the bell icon
                    $('#noti-count').text(data.count);
                  },
                  error: function(error) {
                    console.error('Error fetching notification count:', error);
                  }
                });
              }

              
            </script>


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
          
            <img src="<?= base_url('public/uploads/' . $userdata['Photo']) ?>" class="rounded-circle" alt="">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $userdata['FirstName']?> <?= $userdata['LastName']?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $userdata['FirstName']?> <?php echo $userdata['LastName']?></h6>
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
              <a class="dropdown-item d-flex align-items-center" href="dashboard/logout">
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
          <span>My Profile</span>
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
      <h1>Discussion Categories</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Dashboard">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active"><a href="viewTopic">Forum</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
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
                  
                

            <div class="container-forum">
            <div class="row">
                <div class="col-xl-14">
                    <div class="forcard">
                        <div class="forcard-body">
                            <div class="row">
                            <div class="col-md-5 pt-2">
                            <a style="color: white; font-size: 18px;  cursor: pointer;" href="#">
                            <span class="badge bg-light badge-no" ><?php    
                                echo $qnc;?></span>Queries</a>
                            </div>
                            <div class="col-md-7">
                            <h4 style="color:#1a3359;"><a class="btn bg-light xtreme" title="Create New Query/Announcement" href="forum">Start Discussion!</a></h4>
                            </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
                  <div class="col-xl-14">
                    <div class="row">
                        <?php foreach($category as $c):?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body " style="min-height: 200px;">
                                <div class="row gx-2 py-2">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-2 align-self-center">
                                <?php if ($c['category'] == 'Announcement'): ?>
                                    <i class="bi bi-megaphone-fill rounded-circle catImg fs-2"></i>
                                <?php else: ?>
                                    <img src="public/assets/img/lawping.png" class="rounded-circle catImg">
                                <?php endif; ?>
                                            </div>
                                            <div class="col-lg-10 align-self-center">
                                <form method="POST" action="http://localhost/UCLF/discuss">
                                <input type="hidden" name="category" value="<?php echo $c['category'];?>">
                                <span><button type="submit" id="cat-button" class="styled-link-button"><h5 class="pt-2" style="font-weight:600;text-align:left;"><?php echo $c['category'];?></h5></button></span></form>
                                <p class="descr elip"><?php echo $c['descr'];?></p>
                                <div class="row">
                                    <small > 
                                    <div class="col-md-3 align-items-center">                                
                                        <b class="badge bg-query rounded-pill fw-pal fs-pill clickable" id="cat-button" onclick="submitForm('<?php echo $c['category']; ?>')">
                                        <?php $foundCategory = false; ?>
                                        <?php foreach ($qnCountperTopic as $categ): ?>
                                            <?php if ($c['category'] == $categ['category']):?>
                                            <small style="font-size: 0.7rem!important;"><?php echo $categ['question_count']?>
                                                <?php if ($categ['category'] == 'Announcement'):?>
                                                    <span> Announcements</span>
                                                <?php else: ?>
                                                    <span> Queries</span>
                                                <?php endif;?>
                                                <?php $foundCategory = true; ?>
                                            </small>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php if (!$foundCategory): ?>
                                        <!-- If category was not found, display 0 -->
                                        <small style="font-size: 0.7rem!important;">0 Queries</small>
                                    <?php endif; ?>
                                        </b>
                                        <script>
                                            function submitForm(category) {
                                                var form = document.createElement('form');
                                                form.method = 'POST';
                                                form.action = 'http://localhost/UCLF/discuss';
                                                
                                                var input = document.createElement('input');
                                                input.type = 'hidden';
                                                input.name = 'category';
                                                input.value = category;
                                                form.appendChild(input);
                                                
                                                document.body.appendChild(form);
                                                form.submit();
                                            }
                                        </script>                                      
                                    </div>
                                    </small>
                                </div>
                                    <!--div class="col-md-3 align-items-center"> 
                                        <b class="badge bg-info rounded-pill fw-normal fs-6">
                                            <small>7</small>
                                        </b><span> Answers</span>                                     
                                    </small>
                                    </div-->
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                </div>
                            </div>
                        </div>  
                        <?php endforeach; ?>                      
                    </div>                    
                  </div>
            </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>UCLF-MIS</span></strong>. All Rights Reserved.
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