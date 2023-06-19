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


</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-3">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-12">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Change password</h5>
                    <p class="text-center small">Create precise & memorable passwords.</p>
                  </div>

                  <?php if(session()->getFlashdata('success')): ?>
                  <div class='alert alert-success'><?= session()->getFlashdata('success');?></div>
                  <?php endif; ?>

                  <?php if(session()->getFlashdata('error')): ?>
                  <div class='alert alert-danger'><?= session()->getFlashdata('error');?></div>
                  <?php endif; ?>

                  <?php if(session()->getFlashdata('success')): ?>
                  <div class='alert alert-success'><?= session()->getFlashdata('success');?></div>
                  <?php endif; ?>

                  <?php if(session()->getFlashdata('error')): ?>
                  <div class='alert alert-danger'><?= session()->getFlashdata('error');?></div>
                  <?php endif; ?>
                  <!-- Change Password Form -->
                  <form action="http://localhost/UCLF/pwdReset" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="row g-3 needs-validation" novalidate>
                  
                      <div class="col-12">
                        <label for="newPassword" class="form-label">New Password</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">
                            <div class="icon">
                              <i class="bi bi-eye-slash" id="togglePasswordnew"></i>
                            </div>
                          </span>
                        <input type="password" name="newpassword" class="form-control" id="newpassword" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                        </div>
                      </div>

                      <!--Script to toggle field visibility-->
                        <script>
                          const togglePasswordnew = document.querySelector("#togglePasswordnew");
                          const passwordnew = document.querySelector("#newpassword");
                          
                          togglePasswordnew.addEventListener("click", function () {
                            // toggle the type attribute
                            const type = passwordnew.getAttribute("type") === "password" ? "text" : "password";
                            passwordnew.setAttribute("type", type);
                            
                            // toggle the icon
                            this.classList.toggle("bi-eye");
                          });
                        </script>

                        
                      <div class="col-12 ">
                        <label for="renewPassword" class="form-label">Re-enter New Password</label>
                          <div class="input-group has-validation">
                              <div class="icon input-group-text" id="inputGroupPrepend">
                                <i class="bi bi-eye-slash" id="togglePasswordrenew"></i>
                              </div>
                            <input name="renewpassword" type="password" class="form-control" id="renewPassword" required>
                            <div class="invalid-feedback">Please re-enter your new password!</div>
                          </div>
                      </div>                        
                        
                        <!--Script to toggle field visibility--> 
                        <script>
                          const togglePasswordrenew = document.querySelector("#togglePasswordrenew");
                          const renewPassword = document.querySelector("#renewPassword");
                          
                          togglePasswordrenew.addEventListener("click", function () {
                            // toggle the type attribute
                            const type = renewPassword.getAttribute("type") === "password" ? "text" : "password";
                            renewPassword.setAttribute("type", type);
                            
                            // toggle the icon
                            this.classList.toggle("bi-eye");
                          });
                        </script>

                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                      </div>
                  </form><!-- End Change Password Form -->
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

  </main>

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