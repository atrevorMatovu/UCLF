<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UserProfile - UCLF</title>
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
            
            <!-- Add this JavaScript code in your HTML or in a separate script file -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-stickies"></i>
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
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-stickies"></i>
          <span>Forum</span>
        </a>
      </li><!-- End Forum Page Nav -->     
      

      <!--li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-chat-square"></i>
          <span>#Support</span>
        </a>
      </li--><!-- End Contact Page Nav -->   

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Dashboard">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
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

        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            
              <img src="<?= base_url('public/uploads/' . $userdata['Photo']) ?>" class="rounded-circle" alt="">
            <!--//?php else : ?>
              <img src="public/assets/img/usercon.png" class="rounded-circle">
            <--?php endif; ?-->
              <h2><?php echo $userdata['FirstName']?> <?php echo $userdata['LastName']?></h2>
              <h3><?php echo $userdata['Company']?></h3>
              <h3><?php echo $userdata['Position']?></h3>
              <h3><?php echo $userdata['Email']?></h3>              
              <h3>0<?php echo $userdata['Tel']?></h3>
              </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $userdata['FirstName']?> <?php echo $userdata['LastName']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8"><?php echo $userdata['Company']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Position</div>
                    <div class="col-lg-9 col-md-8"><?php echo $userdata['Position']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">UGANDA</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $userdata['Address']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">0<?php echo $userdata['Tel']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $userdata['Email']?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="http://localhost/UCLF/update" method="post" name="UpdateUserForm" enctype="multipart/form-data" accept-charset="utf-8">
                    <input type="hidden" name="id" value="<?php echo $userdata['user_id']; ?>">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <div id="image-container">
                        
                          <img id="profile-image" src="<?= base_url('public/uploads/' . $userdata['Photo']) ?>" class="rounded-circle mx-2" alt="">
                         
                          <div class="pt-2 col-md-3 ">
                            <div class="justify-content-center">
                              <!--Button for image upload -->
                              <label for="upload-input" class="btn btn-primary btn-sm mx-5" title="Upload new profile image">
                                <i class="bi bi-upload"></i>
                              </label>
                            <?php if (empty($userdata['photo'])) : ?>
                              <input id="upload-input" type="file" name="photo" style="display: none;">
                             
                            <?php else : ?>
                              <input id="upload-input" type="text" name="photo" style="display: none;" value="<?php echo $userdata['Photo']?>">
                              <input id="upload-input" type="text" name="photo" style="display: none;" value="public/assets/img/usercon.png">
                            <?php endif; ?>
                            </div>
                          </div>                        
                        </div>
                       
                        <script>
                          function handleFileInputChange(event) {
                            var fileInput = event.target;
                            var imageContainer = document.getElementById("image-container");
                            var profileImage = document.getElementById("profile-image");
                            var imagePlaceholder = document.getElementById("image-placeholder");

                            if (fileInput.files && fileInput.files[0]) {
                              var reader = new FileReader();

                              reader.onload = function(e) {
                                profileImage.src = e.target.result;
                                imagePlaceholder.style.display = "none";
                                imageContainer.classList.add("has-image");
                              };

                              reader.readAsDataURL(fileInput.files[0]);
                            } else {
                              profileImage.src = "";
                              imagePlaceholder.style.display = "block";
                              imageContainer.classList.remove("has-image");
                            }
                          }

                          var uploadInput = document.getElementById("upload-input");
                          uploadInput.addEventListener("change", handleFileInputChange);

                        </script>
                      </div>
                    </div>

                    <div class="row mb-2 d-flex">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name:</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="row">
                        <div class="col-md-6 mb-1">
                          <div class="form-floating">
                            <input type="text" name="fname" class="form-control" id="firstname" value="<?php echo $userdata['FirstName']?>">
                            <label for="firstname">First Name:</label>
                          </div>
                        </div>

                          <div class="col-md-6">
                            <div class="form-floating">
                              <input type="text" name="lname" class="form-control" id="lastname" value=<?php echo $userdata['LastName']?>>
                              <label for="lastname">Last Name:</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                   

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="<?php echo $userdata['Company'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="position" class="col-md-4 col-lg-3 col-form-label">Position</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="position" type="text" class="form-control" id="position" value=<?php echo $userdata['Position'];?>>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value=<?php echo $userdata['Address']?>>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value=<?php echo $userdata['Tel']?>>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value=<?php echo $userdata['Email']?>>
                      </div>
                    </div>

                    
                    <div class="text-center">
                      <button type="submit" id="btn_update" class="btn btn-primary">Save Changes</button>
                    </div>
                                <script>
                                 $('#btn_update').on('click',function()
                                  {
                                    var url = base_url + 'update';
                                    
                                    const formData = $('#UpdateUserForm');
                                    
                                    $.ajax({
                                        type: "post",
                                        url: url,
                                        dataType: "JSON",
                                        data: FormData(formData),
                                        processData: false,
                                        contentType: false,
                                        headers: {'X-Requested-With': 'XMLHttpRequest'},
                                        success: function(data) 
                                        {
                                        // Handle the response data here
                                          if (data.success == true)
                                          {
                                            toastr.success('Account information updated successfully.');
                                          }
                                          else
                                          {
                                            toastr.error('Profile information update failed.');
                                          }                              
                                        },
                                      });
                                  });
                                </script>
                                <!--toastr.options = {
                                    "closeButton": false,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": false,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                  }
                                  toastr.success("Account information updated successfully.");
                                      -->
                  </form><!-- End Profile Edit Form -->

                </div>

                

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="http://localhost/UCLF/updatePwd" method="post" name="updatePwd" accept-charset="utf-8">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Old Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword" required>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                    <script>
                                  function updatePassword()
                                  {
                                    var url = base_url + 'updatePwd';

                                    $('#updatePwd').submit(function(event) {
                                    event.preventDefault();
                                    const formData = $(this).serialize();
                                    
                                    $.ajax({
                                        type: "post",
                                        url: url,
                                        dataType: "JSON",
                                        data: FormData(formData),
                                        processData: false,
                                        contentType: false,
                                        headers: {'X-Requested-With': 'XMLHttpRequest'},
                                        success: function(data) 
                                        {
                                        // Handle the response data here
                                          if (data.success == true)
                                          {
                                            toastr.success('Account password updated successfully.');
                                          }                                        
                                        },
                                          error: function(error) 
                                          {
                                            console.error('Error:', error);
                                          }
                                        });
                                      });
                                  }
                                </script>
                  </form><!-- End Change Password Form -->
                  <script>
                  var passwordForm = document.getElementById("passwordForm");

                  passwordForm.addEventListener("submit", function(event) {
                    event.preventDefault();

                    var currentPassword = document.getElementById("currentPassword").value;
                    var newPassword = document.getElementById("newPassword").value;
                    var renewPassword = document.getElementById("renewPassword").value;

                    if (newPassword !== renewPassword) {
                      alert("New password and re-entered password do not match.");
                    } else if (newPassword === currentPassword) {
                      alert("New password must be different from the old password.");
                    } else {
                      // Perform password change logic here
                      alert("Password changed successfully.");
                      passwordForm.reset();
                    }
                  });
                </script>

                </div>

              </div><!-- End Bordered Tabs -->

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