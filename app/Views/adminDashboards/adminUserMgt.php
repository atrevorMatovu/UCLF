<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Accounts - UCLF</title>
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
      <a href="admin" class="logo2 d-flex align-items-center">
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

            <?php if (session()->getFlashdata('notification')) : ?> 
            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div class='alert alert-success'>
              <?= session()->getFlashdata('notification');?>
              </div>
            </li>
            <?php endif; ?>          

            <li>
              <hr class="dropdown-divider">
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

    
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="bi bi-person-circle" data-bs-toggle="dropdown">
          <div class="icon">
          <!-- <i class="bi bi-person-circle"></i> -->
            <img src= alt="bi bi-person-circle" class="rounded-circle">
            <div class="label">
                <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $userdata->username?></span>
            </div>
          </div>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $userdata->username?></h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person-square"></i>
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
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
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
  

        <li class="nav-heading">Account Management</li>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
            <i class="bi bi-person-vcard"></i><span>Account Management</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" >
            
            <li class="nav-item">
              <a class="nav-link collapsed" href="adminProfile">
                <i class="bi bi-person-circle" style="font-size: 16px"></i>
                <span>Account Profile</span>
              </a>
            </li><!-- End Profile Page Nav --> 

            <li class="nav-item">
              <a class="nav-link collapsed" href="users">
                <i class="bi bi-people" style="font-size: 16px"></i>
                <span>#Member Accounts</span>
              </a>
            </li><!-- End Forum Nav -->
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

        <li class="nav-item"><!-- Upcoming Events page -->
          <a class="nav-link collapsed" href="#">
            <i class="bi bi-stickies"></i>
            <span>#Forum</span>
          </a>
        </li><!-- End Forum Page Nav -->       
        

        <li class="nav-item">
          <a class="nav-link collapsed" href="#">
            <i class="bi bi-chat-square"></i>
            <span>#Support</span>
          </a>
        </li><!-- End Contact Page Nav -->   

    </ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>User Accounts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">Member Accounts</li>
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
                

            <!-- Events -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <p class="card-title pt-1 pb-2">
                    <h5><strong>Members</strong><a href="#" class="btn btn-primary float-end" style="width: 15%;">ADD Member</a></h5>                            
                  </p>
                    

                  <div class="card-body">
                    <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Photo</th>                       
                        <th scope="col">Email</th>  
                        <th scope="col">Membership</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Gender</th>                      
                        <th scope="col">AccountStatus</th> 
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user) : ?>
                      <tr>
                        <th scope="row"><a href="#"><?php echo $user['id'];?></a></th>
                        <td><?php echo $user['FirstName'];?> <?php echo $user['LastName'];?></td>
                        <td ><img src="<?= base_url('public/uploads/' . $user['Photo']) ?>" class="rounded-circle align-items-center" style="max-width:20%"</td>
                        <td><a href="#" class="text-primary"><?php echo $user['Email'];?></a></td>
                        <!--td></td-->
                        <td><?php echo ucfirst($user['Membership_type']);?></td>
                        <td><span class="badge bg-success">0<?php echo $user['Tel'];?></span></td>
                        <td><?php echo $user['Gender'];?></td>
                        <td><?php echo $user['Account_status'];?></td>
                        <!--td>
                          <form method="POST" action="http://localhost/UCLF/users/status_update">
                            <input type="hidden" name="user_id" value="<//?php echo $user['user_id']; ?>">
                            <label class="switch">
                                <input type="checkbox" name="status" <//?php echo ($user['Account_status'] === 'Approved') ? 'checked' : ''; ?>>
                                <span class="slider round"></span>
                            </label>
                          </form> 
                          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                          <script>
                            $(document).ready(function() {
                              $('#statusCheckbox').change(function() {
                                if ($(this).is(':checked')) {
                                  // Set the Account_status to "Approved"
                                  $('[name="status"]').val('Approved');
                                } else {
                                  // Set the Account_status to "Pending"
                                  $('[name="status"]').val('Pending');
                                }
                                
                                // Submit the form asynchronously
                                $('#statusForm').submit();
                              });
                            });
                          </script>
                        </td-->                 
                        <?php endforeach; ?>
                      </tr>
                     </tbody>
                  </table>
                  </div>

                </div>

              </div>
            </div><!--End Users-->         
            
          </div>
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