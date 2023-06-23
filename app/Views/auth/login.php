<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UCLF-MIS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="public/assets/img/logo-rmbg.png" rel="icon">
  <link href="public/assets/img/logo-rmbg.png" rel="logo-rmbg">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

  <!--  Main CSS File -->
  <link href="public/assets/css/style.css" rel="stylesheet">
  <style>
    .banner-bg {
    background: linear-gradient(180deg, rgb(71 112 190), rgba(255, 255, 255, 0)), url(public/assets/img/hammer2.jpg) no-repeat center center;
    min-height: 200px;
    background-size: cover;
    }
  </style>


</head>

<body>

  <main>
    <div class="banner-bg">
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-3">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <!--div class="d-flex justify-content-center py-1">
                  <h2 class="d-none d-lg-block"><strong>UCLF-MIS</strong></h2>
                </a>
              </div--><!-- End Logo -->

              <div class="card mb-8">

                <div class="card-body">
                <div class="justify-content-center py-3">
                  <a href="#" class="logo1 d-flex align-items-center w-auto">
                    <img src="public/assets/img/logo-rmbg.png" alt="">
                 </a>
                  <div class="pt-0 pb-1">
                    <h5 class="card-title text-center pb-0 fs-4">Log into Your Account</h5>
                    <p class="text-center small">Enter your email address & password to login</p>
                  
                  
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

                  
                  <form action="http://localhost/UCLF/login" method="post" accept-charset="utf-8">
                  <div class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">
                          <div class="icon">
                            <i class="bi bi-envelope-fill"></i>
                          </div>
                        </span>
                        <input type="email" name="email" class="form-control" id="yourEmail" placeholder="Enter email address" required>
                        <div class="invalid-feedback">Please enter your email address.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">
                        <div class="icon">
                          <i class="ri ri-eye-close-line" id="togglePassword"></i>
                        </div>
                        </span>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                    </div>
                    <script>
                      const togglePassword = document.querySelector("#togglePassword");
                      const password = document.querySelector("#password");
                      
                      togglePassword.addEventListener("click", function () {
                        // toggle the type attribute
                        const type = password.getAttribute("type") === "password" ? "text" : "password";
                        password.setAttribute("type", type);
                        
                        // toggle the icon
                        this.classList.toggle("ri-eye-line");
                      });
                    </script>

                    <div class="col-md-6">
                      <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                          </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <a href="forgotpwd">Forgot Password?</a>
                    </div>
                    
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="signup">Create an account</a></p>
                    </div>
                  </div>
                  </form>
                  </div>
                </div>

                </div>
              </div>

              <div class="copyright">
                &copy; Copyright <strong><span>UCLF-MIS 2023</span></strong>. All Rights Reserved
              </div>
              </div>
          </div>
        </div>

      </section>

    </div>
    </div>
  </main><!-- End #main -->

  <!--a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a-->

  <!-- Vendor JS Files -->
  <script src="public/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="public/assets/vendor/echarts/echarts.min.js"></script>
  <script src="public/assets/vendor/quill/quill.min.js"></script>
  <script src="public/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="public/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="publicassets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="public/assets/js/main.js"></script>

</body>

</html>




