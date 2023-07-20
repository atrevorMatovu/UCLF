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
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              New notifications here!
              <!--a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a-->
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        
    
        <li class="nav-item dropdown pe-3">     

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="bi bi-person-circle" data-bs-toggle="dropdown">
          <div class="icon">
          <i class="bi bi-person-circle"></i> 
            <img src="" alt="" class="rounded-circle">
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
              <a class="dropdown-item d-flex align-items-center" href="adminProfile">
                <i class="bi bi-person-square"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="forum">
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">MemberRequest</li>
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
            <div class="card-body profile-card pt-4  flex-column align-items-center">
            <h5 class="card-title align-middle pb-1" style="font-size: larger;">User Account Details</h5>
            <img src="#" style="max-width:50%" class="mb-1 rounded-circle">             
                <div class="row mb-1">
                    <div class="col-lg-3 col-md-5 text-dark ">Full Name</div>
                    <div class="col-lg-9 col-md-8 text-dark"></div>
                </div>

                <div class="row mb-1">
                    <div class="col-lg-3 col-md-5 text-dark">Email</div>
                    <div class="col-lg-9 col-md-8 text-dark"></div>
                </div>

                <div class="row mb-1">
                    <div class="col-lg-3 col-md-5 text-dark">Company</div>
                    <div class="col-lg-9 col-md-8 text-dark"></div>
                </div>

                <div class="row mb-1">
                    <div class="col-lg-3 col-md-5 text-dark">Position</div>
                    <div class="col-lg-9 col-md-8 text-dark"></div>
                </div>

                <div class="row mb-1">
                    <div class="col-lg-4 col-md-5 text-dark">Membership</div>
                    <div class="col-lg-9 col-md-8 text-dark"></div>
                </div>

                <div class="row mb-1">
                    <div class="col-lg-3 col-md-5 text-dark">District</div>
                    <div class="col-lg-9 col-md-8 text-dark"></div>
                </div>
                <div class="row mb-1">
                    <div class="col-lg-3 col-md-5 text-dark">City</div>
                    <div class="col-lg-9 col-md-8 text-dark"></div>
                </div>
              </div>
          </div>

        </div>

        <div class="col-xl-6">

          <div class="card">
            <div class="card-body pt-3">             
              <div class=" profile-edit pt-3" id="profile-edit">
                <div class="justify-content-center align-middle"><h5>Request Review</h5></div>
              <script>
                  function displayComments() {
                      var comment = document.getElementById("comment").value;
                      var commentDisplay = document.getElementById("commentDisplay");
                      var approveBtn = document.getElementById("approveBtn");
                      var rejectBtn = document.getElementById("rejectBtn");
                      
                      if (comment.trim() !== "") 
                      {
                        commentDisplay.innerHTML = comment;
                        commentDisplay.style.display = "block";
                        approveBtn.style.display = "inline-block";
                        rejectBtn.style.display = "inline-block";
                        document.getElementById("comment").value = "";
                      }

                      function approveUser() {
                        var userId = document.getElementById("userId").value;

                          $.ajax({
                              url: "approve_user.php",
                              type: "POST",
                              data: { userId: userId },
                              success: function(response) {
                                  alert("User approved!");
                              },
                              error: function(xhr, status, error) {
                                  alert("Error approving user: " + error);
                              }
                          });
                      }

                      function rejectUser() {
                          var userId = document.getElementById("userId").value;

                          $.ajax({
                              url: "suspend_user.php",
                              type: "POST",
                              data: { userId: userId },
                              success: function(response) {
                                  alert("User suspended!");
                              },
                              error: function(xhr, status, error) {
                                  alert("Error suspending user: " + error);
                              }
                          });
                        }
                  }
              </script>

              <form>
                  <label for="comment" >Comments:</label><br>
                  <input type="textbox" id="comment" class="form-control pt-2" name="comment" placeholder="Information review comment is necessary."><br><br>
                  <button type="button" class="btn btn-primary w-100 pb-2" onclick="displayComments()">Submit</button>
                  <p class="font-italic"><i>**Review Comments**</i></p>  
                  <div id="commentDisplay"class="text-dark" style="display: none;"></div>
                  <input type="hidden" id="userId" value="">
                  <button id="approveBtn"class="btn btn-primary align-middle" style="display: none;" onclick="approveUser()">Approve</button>
                  <button id="rejectBtn" class="btn btn-danger align-middle" style="display: none;" onclick="rejectUser()">Reject</button>

                </form>
              
                  
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