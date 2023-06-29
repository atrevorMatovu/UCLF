<!DOCTYPE html>
<html>
<head>
	<title>UCLF Activation</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="refresh" content="600;url='login'">
	<!-- The above meta tag sets a 30-second time limit before redirecting the user to the login page -->

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="public/assets/img/logo-rmbg.png" rel="icon">
    <link href="public/assets/img/logo-rmbg.png" rel="logo-rmbg">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--CDN bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- Main CSS File -->
    <link href="public/assets/css/actistyle.css" rel="stylesheet">

     <!-- Vendor CSS Files -->
    <link href="public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="public/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="public/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="public/assets/vendor/simple-datatables/actistyle.css" rel="stylesheet">

    <style>
    .card {
      background-image: url('public/assets/img/AVA2.jpg');
      /* additional styles */
    }
    .banner-bg {
    background: linear-gradient(90deg, rgb(71 112 190), rgba(255, 255, 255, 0)), url(public/assets/img/UCLF-Dinner.jpg) no-repeat center center;
    min-height: 200px;
    background-size: cover;
    }
    </style>

</head>
<body>
    <main>
        <div class="banner-bg">
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-8">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-7 d-flex flex-column align-items-center justify-content-center">
                        <div class="card mb-3 ">
                            <div class="card-body">
                                <div class="d-flex justify-content-center py-2">
                                    <a href="#" class="logo d-flex align-items-center w-auto margin= 0 auto;" >
                                        <img src="public/assets/img/logo-rmbg.png" alt="">
                                        </a>
                                    </div>

                                

                                <?php if(session()->getTempdata('success')): ?>
                                <div class='alert alert-success'><?= session()->getTempdata('success');?></div>
                                <?php endif; ?> 

                                <?php if(session()->getTempdata('error')):?>
                                    <div class='alert alert-danger'><?= session()->getTempdata('error');?></div>
                                <?php endif;?>
                                
                                <div class=" justify-content-center">
                                <h3>Strap in for the best UCLF experience!</h3>
                                </div>
                                <?php if(session()->getFlashdata('success')): ?>
                                    <div class='alert alert-success'><?= session()->getFlashdata('success');?></div>
                                <?php endif; ?>
                                <p>Dear our esteemed new member.</p>
                                <p>Thank you for signing up and becoming a member of our fraternity. 
                                    <br>Your account has been created successfully and we kindly ask that you follow the ongoing procedure completely.</br> 
                                    Once you have activated your account, you will be able to login and access all the features of our system.
                                    <p><br>Regards,<br>UCLF Team</br></br></p>
                                </p>
                            <div class="justify-content-center">
                            <input type="button"  class="btn btn-info" onclick="window.location.href='onboard';" value="Proceed" />
                            </div>
                            </div>
                        </div>
                            <!-- Vendor JS Files -->
                        <script src="public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                        <script src="public/assets/vendor/chart.js/chart.umd.js"></script>
                        <script src="public/assets/vendor/echarts/echarts.min.js"></script>
                        <script src="public/assets/vendor/quill/quill.min.js"></script>
                        <script src="public/assets/vendor/simple-datatables/simple-datatables.js"></script>
                        <script src="public/assets/vendor/tinymce/tinymce.min.js"></script>
                        <script src="publicassets/vendor/php-email-form/validate.js"></script>

                        <!-- Template Main JS File -->
                        <script src="public/assets/js/main.js"></script>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        </div>
    </main>
</body>
</html>