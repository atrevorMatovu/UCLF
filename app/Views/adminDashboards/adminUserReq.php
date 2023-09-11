<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Requests - UCLF</title>
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

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="admin">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-heading">Accounts</li>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
            <i class="bi bi-card-list"></i><span>Account Management</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" >
            
            <li class="nav-item">
              <a class="nav-link collapsed" href="adminProfile">
                <i class="bi bi-person-circle" style="font-size: 16px;"></i>
                <span>Account Profile</span>
              </a>
            </li><!-- End Profile Page Nav --> 

            <li class="nav-item">
              <a class="nav-link collapsed" href="users">
                <i class="bi bi-people" style="font-size: 16px;"></i>
                <span>User Accounts</span>
              </a>
            </li><!-- End User Accounts Nav -->
          </ul>
        </li>             
              
        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Staff Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
          <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            
            <li class="nav-item">
              <a class="nav-link collapsed" href="newStaff">
                <i class="bi bi-people-fill" style="font-size: 16px;"></i>
                <span>Staff Personnel</span>
              </a>
            </li><!-- End Staff Page Nav -->

            <li class="nav-item">
              <a class="nav-link collapsed" href="#">
                <i class="bi bi-building" style="font-size: 16px;"></i>
                <span>Personnel Roles</span>
              </a>
            </li><!-- End Roles Page Nav -->
         
          </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="#">
            <i class="bi bi-stickies" ></i>
            <span>#Forum</span>
          </a>
        </li><!-- End Forum Page Nav -->

    </ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>User Account Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item "><a href="users">User Accounts</a></li>
          <li class="breadcrumb-item active">MemberRequest</li>
          <li class="breadcrumb-item"><?php echo $user['FirstName']?> <?php echo $user['LastName']?></li>
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

        <div class="col-xl-6">

          <div class="card">
            <div class="card-body profile-card pt-2  flex-column align-items-center">
            <h5 class="card-title pb-1" style="font-size: larger; text-align:center;">User Account Details</h5>
            <div class="modal-img">
                          <?php if (!empty($user['Photo'])): ?>
                            <img src="<?= base_url('public/uploads/' . $user['Photo']) ?>" class="mb-1 modal-img" >
                          <?php else: ?>
                            <img src="<?= base_url('public/assets/img/usercon.png') ?>" class="mb-1 modal-img" alt="Default User Image">
                          <?php endif; ?>

                          </div>              
                          <div class=" table-striped">            
                              <div class="row spacing striped-row">
                                  <div class="col-lg-4 col-md-5 text-dark "><h3>Full Name</h3></div>
                                  <div class="col-lg-8 col-md-8 text-dark"><?php echo $user['FirstName'];?> <?php echo $user['LastName'];?></div>
                              </div>

                              <div class="row spacing striped-row">
                                  <div class="col-lg-4 col-md-5 text-dark"><h3>Email</h3></div>
                                  <div class="col-lg-8 col-md-8 text-dark"><?php echo $user['Email'];?></div>
                              </div>

                              <div class="row spacing striped-row">
                                  <div class="col-lg-4 col-md-5 text-dark"><h3>Company</h3></div>
                                  <div class="col-lg-8 col-md-8 text-dark"><?php echo $user['Company'];?></div>
                              </div>

                              <div class="row spacing striped-row">
                                  <div class="col-lg-4 col-md-5 text-dark"><h3>Position</h3></div>
                                  <div class="col-lg-8 col-md-8 text-dark"><?php echo ucfirst($user['Position']);?></div>
                              </div>

                              <div class="row spacing striped-row">
                                  <div class="col-lg-4 col-md-5 text-dark"><h3>Membership</h3></div>
                                  <div class="col-lg-8 col-md-8 text-dark"><?php echo ucfirst($user['Membership_type']);?></div>
                              </div>

                              <div class="row spacing striped-row">
                                  <div class="col-lg-4 col-md-5 text-dark"><h3>Status</h3></div>
                                  <div class="col-lg-8 col-md-8 text-dark"><?php echo ucfirst($user['Account_status']);?></div>
                              </div>

                              <div class="row spacing striped-row">
                                  <div class="col-lg-4 col-md-5 text-dark"><h3>Practice Areas</h3></div>
                                  <div class="col-lg-8 col-md-8 text-dark"><?php echo ucfirst($user['Practice_area']);?></div>
                              </div>

                              <div class="row spacing striped-row">
                                  <div class="col-lg-4 col-md-5 text-dark"><h3>District</h3></div>
                                  <div class="col-lg-8 col-md-8 text-dark"><?php echo ucfirst($user['State']);?></div>
                              </div>
                              <div class="row spacing striped-row">
                                  <div class="col-lg-4 col-md-5 text-dark"><h3>City</h3></div>
                                  <div class="col-lg-8 col-md-8 text-dark"><?php echo ucfirst($user['City']);?></div>
                              </div>
                              <div class="row spacing striped-row">
                                  <div class="col-lg-4 col-md-5 text-dark"><h3>Address</h3></div>
                                  <div class="col-lg-8 col-md-8 text-dark"><?php echo ucfirst($user['Address']);?></div>
                              </div>
                          </div>
              </div>
          </div>

        </div>

        <div class="col-xl-6">

          <div class="card">
            <div class="card-body pt-1">             
              <div class=" profile-edit pt-1" id="profile-edit">
                <div class="justify-content-center ">
                  <h5 class="card-title pb-1" style="font-size: larger; text-align:center;">Request Review</h5>
                </div>
              
                
                  <?php if (!empty($review)):?> 
                  <?php 
                    $now = time(); //In seconds
                    $reviewTimestamp = strtotime($review['created_at']); 
                   if($now - $reviewTimestamp < 5):?> 
                  <div id="commentDisplay"class="text-dark commentDisplay " >
                    <h3><?php echo $review['comment'];?></h3>                  
                  </div>
                  <div class="row pt-2 ">
                    <div class="col-md-6">
                    <form method="POST" action="<?= base_url()?>/Updatestatus">
                        <input type="hidden" id="userId<?php echo $user['id']?>" name="userId" value="<?php echo $user['user_id']?>">
                        <button id="approveBtn<?php echo $user['id']?>" class="btn btn-primary approv" type="submit" >Approve</button>
                    </form>
                  </div>
                  <div class="col-md-6">
                    <form method="POST" action="<?= base_url()?>/Susstatus">
                      <input type="hidden" id="userId<?php echo $user['id']?>" name="userId" value="<?php echo $user['user_id']?>">
                      <button id="rejectBtn<?php echo $user['id']?>" class="btn btn-danger " type="submit" >Reject</button>
                    </form>
                  </div>
                  </div>
                 <?php else:?>
                  <form method="POST" id="reviewForm"  action="http://localhost/UCLF/reviewComm/<?php echo $user['id']?>">
                  <input type="hidden" id="user_id" name="user_id" value="<?php echo $user['user_id']?>">
                  <input type="hidden" id="admin"  name="admin" value="<?php echo $userdata->id?>" >
                  
                  <label for="comment" >Comments:</label><br>
                  <textarea id="comment<?php echo $user['id']?>" class="form-control pt-2" name="comment" placeholder="Information review comment is necessary." rows="2" required></textarea><br>
                  <button type="submit" class="btn btn-primary w-100 pb-2" id="submitRemark<?php echo $user['id']?>" >Submit</button>
                </form>

                  <p class="font-italic"><i>**Review Comments**</i></p><hr>
                    <div id="commentDisplay"class="text-dark commentDisplay" style="display:none;" >                    
                  </div>
                  <?php endif;?>
                  <?php else:?>
                    <form method="POST" id="reviewForm"  action="http://localhost/UCLF/reviewComm/<?php echo $user['id']?>">
                  <input type="hidden" id="user_id" name="user_id" value="<?php echo $user['user_id']?>">
                  <input type="hidden" id="admin"  name="admin" value="<?php echo $userdata->id?>" >
                  
                  <label for="comment" >Comments:</label><br>
                  <textarea id="comment<?php echo $user['id']?>" class="form-control pt-2" name="comment" placeholder="Information review comment is necessary." rows="2" required></textarea><br>
                  <button type="submit" class="btn btn-primary w-100 pb-2" id="submitRemark<?php echo $user['id']?>" >Submit</button>
                </form>

                  <p class="font-italic"><i>**Review Comments**</i></p><hr>
                    <div id="commentDisplay"class="text-dark commentDisplay" style="display:none;" >                    
                  </div>
                  <?php endif;?>
                  <script src="public/assets/plugins/toastr/toastr.min.js"></script>
                  <script>
                    $(document).ready(function() {
                    $('#submitRemark<?php echo $user['id']?>').on('click', function(e) {
                      e.preventDefault();
                      //var form = $('#reviewForm')[0].reset();
                      var comment = $('[name="comment"]').val();
                      var user_id = $('#user_id').val();
                      var admin = $('#admin').val();
                      console.log(comment);
                      if (comment.trim() === '') {
                          toastr.error('Please enter an approval remark.');
                          return; // Don't proceed if the textarea is empty
                       }                                                              
                                                                                                                  
                      $.ajax({
                        url: 'http://localhost/UCLF/reviewComment', // Replace with your controller method
                        type: 'POST',
                        data: {
                            comment: comment,
                            user_id: user_id,
                            admin: admin                               
                        },
                        success: function(response) {
                        // Handle success response 
                        if (response.status === 'success') {                                                                                                                                              
                        // Clear the textarea after successful submission
                        // Display comment in the designated <div> section
                        $('#commentDisplay').html(comment).show();
                                                                              
                         // Clear the input field after successful submission
                        $('[name="comment"]').val('');
                                                                              
                        // Show "Approve" and "Reject" buttons
                        $('#approveBtn').show();
                        $('#rejectBtn').show();
                        //$('#comment').val('');
                        toastr.info(response.message);                                                                            
                      }else{
                        toastr.error(response.message);
                      }
                    },
                    error: function(response) {
                     // Handle error response 
                    toastr('Error: ' + response.responseText);
                  }
                });
              });
                                                            
            });
           </script>
                    
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End main -->

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