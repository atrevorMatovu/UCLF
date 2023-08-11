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

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number" id="noti_number"><?php
            
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
                  //echo $formatDate;
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

            <!--li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-chat-square"></i>
                <span>#Support</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li-->

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
      <h1>Notifications</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Dashboard">Home</a></li>
          <li class="breadcrumb-item">Account</li>
          <li class="breadcrumb-item active">Notification</li>
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

        

        <div class="col-xl-10">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Notification List -->
              <div class="notification-container">
              <div class="row pb-2">
                <div class="col-md-4">
                <select class="form-control" name="state" id="entriesPerPage" onchange="updateEntriesPerPage()" placeholder="Select Rows">
                <option value="">Select Rows/Entries</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="5000">Show ALL Rows</option>
                 </select>
                 <script>
                  // JavaScript part
                  function updateEntriesPerPage() {
                    const selectElement = document.getElementById('entriesPerPage');
                    const selectedValue = selectElement.value;

                    // You can use AJAX to fetch data from the server-side (e.g., CodeIgniter) with the selectedValue
                    // and then update the displayed entries accordingly.
                    // For simplicity, let's assume you already have the data in a JavaScript array named "dataRows".
                    const dataRows = []; // Your data rows as an array of objects

                    // Calculate the number of pages based on the selected value
                    const numPages = Math.ceil(dataRows.length / selectedValue);

                    // Get the current page (You can manage pagination on your own)
                    const currentPage = 1; // Replace this with the current page number

                    // Calculate the starting and ending indexes for the displayed entries
                    const startIndex = (currentPage - 1) * selectedValue;
                    const endIndex = Math.min(startIndex + selectedValue, dataRows.length);

                    // Slice the dataRows array to get the entries to display on the current page
                    const displayedRows = dataRows.slice(startIndex, endIndex);

                    // Display the entries on the page
                    const dataContainer = document.getElementById('notification-container');
                    dataContainer.innerHTML = ''; // Clear existing data
                    displayedRows.forEach((row) => {
                      // Create and append HTML elements to display the data
                      const rowElement = document.createElement('div');
                      rowElement.textContent = JSON.stringify(row); // Customize this based on your data structure
                      dataContainer.appendChild(rowElement);
                    });
                  }

                 </script>
                </div>
                <div class="col-md-7 marked">                
                  <!--h3 class="flex--item js-inbox-header-all">Inbox (all)</h3-->
                  <form action="http://localhost/UCLF/updateNoti" method="post" name="UpdateNotiForm" enctype="multipart/form-data" accept-charset="utf-8"> 
                    <input type="hidden" name="user_id" value="<?php echo $userdata['user_id'];?>">                  
                  <span><button type="submit" class="btn btn-primary fs-notif " >Mark all as read</button></span>  
                  <form>             
                </div>
              </div>
                          <li class="pt-2" style="list-style: none;" id= "table-id">
                            <?php                           
                            $recentnotifications = array_reverse($notif);
                             
                            foreach ($recentnotifications as $recentnotif):                              
                            ?>
                                <div class="row d-flex">
                                    <div class="col-md-1">
                                    <i class ="bi bi-info-circle-fill text-success"></i>
                                    </div>
                                    <div class="col-md-5 notif"><?php echo $recentnotif['msg'];?>
                                    </div>
                                    <div class="col-md-3 date-notif">
                                        <?php 
                                            $formatDate = date('M jS, Y', strtotime($recentnotif['created_at']));                  
                                            echo $formatDate;
                                        ?>
                                        <?php 
                                        $createdAt = new DateTime($recentnotif['created_at']);
                                        //Getting the time difference
                                        $now = new DateTime(); // Current date and time
                                        $interval = $now->diff($createdAt);

                                        // Display the time difference as "X mins ago", "X hours ago", "X days ago," etc.
                                        $timeDifference = getTimeDifferenceString($interval);
                                        echo '('.$timeDifference.')';
                                        ?>
                                        
                                    </div>
                                    <div class="col-md-2 mx-4">
                                      <form action="http://localhost/UCLF/noti" method="post" name="UpdateNotifications" enctype="multipart/form-data" accept-charset="utf-8"> 
                                        <input type="hidden" name="statusID" value="<?php echo $recentnotif['id'] ;?>">             
                                        <button class="btn" type="submit"><i class="jc-end bi <?php echo ($recentnotif['status'] === '1') ? 'bi-envelope-open' : 'bi-envelope-fill'; ?>"></i></button>
                                      </form>
                                    </div>
                                    <hr>
                                </div>
                                <?php endforeach; ?>
                                                         
                            </li>
                            <div class="pagination">
                            <button class="btn1" onclick="backBtn()"><i class="bi bi-arrow-left-short"></i>prev</button>
                            <ul class="pag">
                              <li class="pag link active" onclick="activeLink" value="1">1</li>
                              <li class="pag link" onclick="activeLink" value="2">2</li>
                              <li class="pag link" onclick="activeLink" value="3">3</li>
                              <li class="pag link" onclick="activeLink" value="4">4</li>
                            </ul> 
                            <button class="btn1" onclick="nextBtn()">next<i class="bi bi-arrow-right-short"></i></button>
                          </div>
                            <script>
                                let link = document.getElementsByClassName("link");
                                let currentValue = 1;
                                function activeLink(){
                                  for(l of link){
                                    l.classList.remove("active");
                                  }
                                  event.target.classList.add("active");
                                  currentValue = event.target.value;
                                }
                                function backBtn(){
                                  if (currentValue > 1){
                                    for(l of link){
                                    l.classList.remove("active");
                                  }
                                }
                                  currentValue--;
                                  link[currentValue-1].classList.add("active");
                                }
                                function nextBtn(){
                                  if (currentValue > 4){
                                    for(l of link){
                                    l.classList.remove("active");
                                  }
                                }
                                  currentValue++;
                                  link[currentValue+1].classList.add("active");
                                }
                              </script>            
              </div>         

            </div><!-- End Notification List -->

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