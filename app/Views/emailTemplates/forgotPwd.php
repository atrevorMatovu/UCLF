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
    background: #124098;
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
                                        <img src="public/assets/img/logo-rmbg.png">
                                        </a>
                                    </div>
                                <p>Hi <?php echo $user?> <//?php echo $user['LastName']?>.</p>
                                <p>Thank you for signing up and now on your way to become a member of our fraternity. 
                                    <br>Your change password request has been received. Please click the link below to reset your password.</br>
                                    <div class="justify-content-center">
                                    <a class="btn btn-primary align-items-center" href="'.base_url().'/pwdReset/'.$token.'">Create password</a><br><br>
                                    </div> 
                                    <br><strong>This link is valid for only 24 hours</strong>.<p><br>Regards,<br>UCLF-Team</br></br></p>
                                </p>
                                                    
                            
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