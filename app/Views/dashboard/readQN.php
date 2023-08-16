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
  

  <link href="public/assets/plugins/toastr/toastr.min.css" rel="stylesheet" >
  <script src="public/assets/plugins/toastr/toastr.min.js"></script>
  
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
      <h1><?php echo $qn['topic']?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="Dashboard">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active"><a href="viewTopic">Forum</a></li>
          <li class="breadcrumb-item active"><?php echo $qn['topic']?></li>
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
                <div class="col-xl-12">
                    <div class="forcard">
                        <div class="forcard-body">
                            <div class="row">
                                <div class="col-md-5 pt-2">
                                <a style="color: white; font-size: 18px;  cursor: pointer;" href="#"><span class="badge bg-light badge-no" ><?php    
                                    echo $comCount;?></span>Comments</a>
                                </div>
                                <div class="col-md-7">
                                    <h4><a class="btn bg-light xtreme" title="Create New Query/Announcement" href="forum"><i class="fa fa-plus" aria-hidden="true"></i>Start Discussion!</a></h4>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
                  <div class="col-xl-12">
                    <div class="row" style="height: auto!important;">
                        <div class="col-lg-12">
                            <div class="carddisc shadow-sm mb-3">
                                <div class="card-disc text-dark">
                                    <div class="row">
                                        <div class="col-md 12">
                                            <div class="row">
                                                <div class="col-lg-2 align-self-center">
                                                    <img src="<?= base_url('public/uploads/' . $qn['photo']) ?>" class="rounded-circle " style="max-width: 110px;" alt="<?php echo strtoupper(substr($qn['askedby'], 0, 1));?> ">
                                                </div>
                                                <div class="col-lg-9">
                                                <h5 class="qn-pal "><?php echo $qn['topic']?></h5>
                                                <p>
                                                    <small>
                                                <span class="badge bg-query text-white" value="5">Asked By:
                                                    <i><?php echo $qn['askedby']?></i>
                                                </span> |
                                                <span> Created: 
                                                    <i><small class="text-danger"><?php $dat=date("d/M/Y h:i A", strtotime($qn['created_at'])); echo $dat?></small></i>
                                                </span> &nbsp;| 
                                                <span class="badge bg-primary text-white ml-2"><i class="fa fa-comments"></i><?php echo $comCount?> Comments</span>
                                                </small>
                                                </p>
                                                <p class="pt-1 pb-1"><?php echo $qn['question']?></p>
                                                
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 py-1">
                                            <h5><b> <i class="bi bi-chat-text"></i> Comments</b></h5>
                                        </div>
                                        <div class="">
                                        <?php 
                                        foreach($com as $com):?>                                                   
                                            <div class="row g-0">
                                                <div class="col-md-2">
                                                <?php if (!empty($com['photo'])):?>
                                                    <img src="<?= base_url('public/uploads/' . $com['photo']) ?>" class="rounded-circle catImg profile-image" alt="<?php echo strtoupper(substr($com['commentedBy'], 0, 1));?> ">
                                                    <!-- <//? else:?>
                                                        <img src="<//?php echo strtoupper(substr($com['commentedBy'], 0, 1));?>" class="rounded-circle catImg profile-image"> -->
                                                    <?php endif;?>
                                                </div>
                                                
                                                
                                                <!-- Comments Display-->
                                                <div class="col-md-10 pl-10">
                                                    <?php if (!empty($com)):?>
                                                        <p class="card-text" id="new-comment"><?php echo $com['comment']?></p>
                                                        <p class="card-text ">By: <h7 style="color: #113f98;"><small><?php echo$com['commentedBy'] ?></small> <i><small class="text-dark"><?php $dat=date("d/M/Y h:i A", strtotime($com['created_at'])); echo $dat?></small></i></h7>
                                                         <small><span class="badge bg-primary text-white ml-2"><i class="fa fa-comments"></i><?php $replies = 0;echo $replies?> Replies</span></small>
                                                        <small style="padding-left:5px;"><h7 class="badge bg-query text-white reply-button clickable"><i class="bi bi-reply"></i>Reply</h7></small>
                                                         </p>

                                                        <!-- REply Display-->
                                                        <p></p>
                                                         <div class="reply-input" style="display: none;">
                                                        <form action="http://localhost/UCLF/reply" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                            <input type="hidden" name="qn_id" id="qn_id" value="<?php echo $qn['qn_id']?>">
                                                            <input type="hidden" name="comment_id" id="reply_id" value="<?php echo $com['comment_id']?>">
                                                            <input type="hidden" name="repliedBy" value="<?php echo $userdata['FirstName']?> <?php echo $userdata['LastName']?>">
                                                            <input type="hidden" name="photo" value="<?php echo $userdata['Photo']?>">
                                                            <input type="text" name="reply" class="form-control" placeholder="Your reply..." required>
                                                            <button class="btn bg-query text-white btn-sm mt-2 " id="reply-submit" type="submit">Submit Reply</button>
                                                        </form>
                                                        </div>
                                                         <hr>
                                                    <?php else:?>
                                                        <p>You're Welcome to share your opinion below.</p>
                                                    <?php endif;?> 
                                                    <!-- Making Replies to Comments-->
                                             <script src="public/assets/plugins/toastr/toastr.min.js"></script>
                                                <script>
                                                    $(document).ready(function() {
                                                        $(".reply-button").click(function() {
                                                            // Find the parent div of the clicked "Reply" button
                                                            var parentDiv = $(this).closest(".col-md-10");

                                                            // Toggle the visibility of the reply input field within the parent div
                                                            parentDiv.find(".reply-input").toggle();
                                                        });

                                                        // Additional JavaScript for submitting replies (similar to your AJAX function)
                                                        $("#reply-submit").click(function(e) {
                                                            e.preventDefault();
                                                            var parentDiv = $(this).closest(".col-md-10");                                                            
                                                            var commentId = parentDiv.find(".reply-button").data("comment-id");
                                                            var reply = $('[name="reply"]').val();//parentDiv.find("input").val();
                                                            var photo = $('[name="photo"]').val();
                                                            var repliedBy = $('[name="repliedBy"]').val();
                                                            var comment_id = $('#comment_id').val();
                                                            var qn_id = $('#qn_id').val();
                                                            // Perform AJAX request to submit the reply
                                                            $.ajax({
                                                                    url: 'http://localhost/UCLF/makereply', // Replace with your controller method
                                                                    type: 'POST',
                                                                    data: {
                                                                        reply: reply,
                                                                        qn_id: qn_id,
                                                                        comment_id: comment_id,
                                                                        repliedBy: repliedBy,
                                                                        photo: photo
                                                                    },
                                                                    success: function(response) {
                                                                        // Handle success response (e.g., show a success message)
                                                                        if (response.status === 'success') {                                                                     
                                                                            //toastr.success(response.message);

                                                                            // Clear the input field and hide the input section
                                                                            parentDiv.find("input").val("");
                                                                            parentDiv.find(".reply-input").hide();
                                                                            location.reload();
                                                                        }else{
                                                                            toastr.error(response.message);
                                                                        }
                                                                    },
                                                                    error: function(response) {
                                                                        // Handle error response (e.g., show an error message)
                                                                        toastr('Error: ' + response.responseText);
                                                                    }
                                                                });
                                                            });
                                                        });
                                                </script>
                                                  
                                                </div>                                               
                                            </div> <?php endforeach;?>

                                             

                                            <!-- Making Comments-->
                                            <div class="row" style="background-color: #d9d9d9;">
                                                <div class="col-lg-11 offset-lg-1 " style="border-left: 2px solid #EEEEEE;">                                                                 
                                                    <p><small style="font-weight: 500; font-size: 12px; color: #555;"></small>  
                                                    </p>
                                                    <hr style="border-bottom: 1px dotted #999; background: none; border-top: 0px;">
                                                            
                                                    <div class="col-md-12">
                                                    <form action="http://localhost/UCLF/comment" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                    <div class="form-group">
                                                    <input type="hidden" name="qn_id" id="qn_id" value="<?php echo $qn['qn_id']?>">
                                                    <input type="hidden" name="userReplyid" id="userReplyid" value="<?php echo $userdata['user_id']?>">
                                                    <input type="hidden" name="commentedBy" value="<?php echo $userdata['FirstName']?> <?php echo $userdata['LastName']?>">
                                                    <input type="hidden" name="photo" value="<?php echo $userdata['Photo']?>">
                                                    <div class="form-floating">
                                                    <textarea class="form-control" name="comment" id="floatingTextarea"  style="height:76px;overflow-y:hidden;" required></textarea>
                                                    <label for="floatingTextarea" class="text-muted">Add Comment</label>
                                                    </div>
                                                    <button type="submit" id="submitComment" class="btn btn-primary btn-sm mt-2 float-end">Comment</button>
                                                    </div>
                                                   </form>
                                                   <script src="public/assets/plugins/toastr/toastr.min.js"></script>
                                                   <script>
                                                        $(document).ready(function() {
                                                            $('#submitComment').on('click', function(e) {
                                                                e.preventDefault();
                                                                
                                                                var comment = $('#floatingTextarea').val();
                                                                if (comment.trim() === '') {
                                                                    toastr.error('Please enter a comment.');
                                                                    return; // Don't proceed if the textarea is empty
                                                                }

                                                                var qn_id = $('#qn_id').val();
                                                                var userReplyid = $('#userReplyid').val();
                                                                var commentedBy = $('[name="commentedBy"]').val();
                                                                var photo = $('[name="photo"]').val();
                                                                
                                                                $.ajax({
                                                                    url: 'http://localhost/UCLF/makeComment', // Replace with your controller method
                                                                    type: 'POST',
                                                                    data: {
                                                                        comment: comment,
                                                                        qn_id: qn_id,
                                                                        userReplyid: userReplyid,
                                                                        commentedBy: commentedBy,
                                                                        photo: photo
                                                                    },
                                                                    success: function(response) {
                                                                        // Handle success response (e.g., show a success message)
                                                                        if (response.status === 'success') {                                                                     
                                                                            //toastr.success(response.message);

                                                                            // Clear the textarea after successful submission
                                                                            $('#floatingTextarea').val('');
                                                                            location.reload();
                                                                            var nearestComment = $('#new-comment').closest('.col-lg-11');
                                                                            if (nearestComment.length > 0) {
                                                                                nearestComment[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                                                                            }
                                                                        }else{
                                                                            toastr.error(response.message);
                                                                        }
                                                                    },
                                                                    error: function(response) {
                                                                        // Handle error response (e.g., show an error message)
                                                                        toastr('Error: ' + response.responseText);
                                                                    }
                                                                });
                                                            });

                                                             $(document).ready(function() {
                                                                 // Scroll to the new comment element after page load
                                                                 var nearestComment = $('.col-lg-11').first(); // You can use .last() if you want the last one
                                                                  if (nearestComment.length > 0) {
                                                                      nearestComment[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                                                                  }
                                                            });
                                                        });
                                                    </script>				
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                      
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