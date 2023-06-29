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
   <!-- Include jQuery library -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Include Chosen CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">

  <!-- Include Chosen JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
  <style>
    .banner-bg {
    background: linear-gradient(180deg, rgb(18 64 152), rgba(255, 255, 255, 0)), url(public/assets/img/hammer2.jpg) no-repeat center center ;
    min-height: 200px;
    background-size: cover;
    background-attachment: fixed;
    z-index: -111;
	}
  </style>

</head>

<body>

  <main>
  <div class="banner-bg">
  <div class="container">
      <section class="section register  d-flex flex-column align-items-center justify-content-center py-3">
        <div class="container">
          <div class="row justify-content-center">
            <!--div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center"-->
              

              <div class="mb-8">
                <div class="container">

                <div class="card-body d-flex">
                <div class="col-lg-5 col-md-2  flex-column justify-content-center py-3 pt-0 pb-1">
                  <div class="card2 col-lg-9  flex-column align-items-center justify-content-center py-3 pt-0 pb-1">
                  <a href="#" class="logo d-flex align-items-center w-auto">
                    <img src="public/assets/img/logo-rmbg.png" alt="">
                 </a>
                 <div class="col-lg-8 mx-3 pt-2">
                  <h3 class="card-title pb-0 fs-3 hidden ">About UCLF.</h3>
                  <p class="desc"><i>
                  Prestigious law fraternity group that unites 
                  legal professionals dedicated to practicing law
                  with Christian values.</i>
                  </p>
                  <p class="desc pt-1 pb-0.2"><i>
                  By joining the Uganda Christian Lawyer's Fraternity,
                  legal professionals gain access to a supportive 
                  community that fosters personal & professional growth.</i>
                  </p>
                  <h3 class="card-title pb-0.2 pt-0.2 fs-3 hidden">Practice Area.</h3>
                  <p class="desc"><i>
                  Various fields of law that legal professionals specialize in.</i>
                  </p>
                  <p class="examples ">Examples: Criminal law, Family law.</p>
                 </div>
                </div>
                </div>

                  <div class="card2 col-lg-7 col-md-6 d-flex flex-column pt-0 pb-1">
                    <!--div>
                        <h5 class="card-title text-center pb-0 fs-4">Setup Your Account</h5>
                        <p class="text-center small">Fill in the provided fields to get started.</p>
                    </div-->
                    <div>
                      <div class="text-center card-title"><h3 class="pt-2 pb-0 fs-4">UCLF Account Onboarding.</h3>
                      <div class="small"><p>Please provide the necessary information as required:</p></div>
                      </div>
                    </div>
                    

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

                    
                     
                    
                    <!--FORMS-->
                    <form action="http://localhost/UCLF/onboard" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                      <div vlass="row g-3">
                              <div class="pull-right">
                            
                                <div class="col-12 mx-3">
                                    <h3>Location:<h3>
                                </div>
                                
                                <div class="col-12 d-flex">
                                  <div class="col-md-3.5 mx-2 form-floating">
                                  <!--input type="text" class="form-control" id="floatingReg" placeholder="Your Region"-->
                                  <select class="form-select" id="floatingReg" name="region" aria-label="Region:" required>
                                  <option value="">Choose Region:</option>
                                  <option value="central">Central</option>
                                  <option value="northern">Northern</option>
                                  <option value="eastern">Eastern</option>
                                  <option value="western">Western</option>
                                          </select>
							                    <div class="invalid-feedback">Please choose a region!</div>	
                                  <label for="floatingReg">Region:</label>
                                  </div>

                                  <div class="col-md-3.5 mx-2 form-floating">
                                  <input type="text" name="state" class="form-control" id="floatingState" placeholder="State">
                                  <label for="floatingState">State/District:</label>
                                  </div>
                                  
                                  <div class="col-md-3.5 pb-1 mx-2 form-floating">
                                  <input type="text" name="city" class="form-control" id="floatingCity" placeholder="City">
                                  <label for="floatingCity">City:</label>
                                  </div>
                                </div>

                                <div class="col-12 pt-2 mx-3 d-flex">
                                  <h3>Address:<h3>
                                </div>
                                <div class="col-md-6 col-12 mx-2 pb-1 form-floating">
                                  <input type="text" name="address" class="form-control" id="floatingResd" placeholder="Residence">
                                  <label for="floatingResd">Place of residence:</label>
                                </div>
                                <div class="col-12 pt-2 mx-3 d-flex">
                                  <h3>Practice Area:<h3>
                                </div>
                                <div class=" col-12 mx-2 col-md-11 pb-1 form-floating ">
                                  <!--label for="Practice_area">Practice Area:</>
                                  <label for="options">(Select all that apply)</label-->
                                  <select class="chosen-select custom-input form-select" name="practice_area[]" multiple style="border: 1px solid #ccc; border-radius: 5px; padding: 8px; font-size: 14px; color: #333; background-color: #f9f9f9;">
                                    <option value="Aviation Law">Aviation Law</option>
                                    <option value="Construction Law">Construction Law</option>
                                    <option value="Corporate Law">Corporate Law</option>					
                                    <option value="Criminal Law">Criminal Law</option>
                                    <option value="Dispute Resolution">Dispute Resolution</option>
                                    <option value="Environmental Law">Environmental Law</option>
                                    <option value="Family Law">Family Law</option>
                                    <option value="Human Rights Law">Human Rights Law</option>
                                    <option value="Immigration Law">Immigration Law</option>
                                    <option value="Insolvency Law">Insolvency Law</option>
                                    <option value="Insurance Law">Insurance Law</option>
                                    <option value="Intellectual Property Law">Intellectual Property Law</option>
                                    <option value="Media Law">Media Law</option>
                                    <option value="Public sector & Government Law">Public sector & Government Law</option>
                                    <option value="Tax Law">Tax Law</option>
                                    <option value="Tort Law">Tort Law</option>
                                    <option value="Wills Trust & Probate Law">Wills Trust & Probate Law</option>
                                    <option value="Sports Law">Sports Law</option>
                                    <option value="Civil Law">Civil Law</option>
                                    <option value="Energy & Infrastructure">Energy & Infrastructure</option>
                                    <option value="Cyber Law">Cyber Law</option>
                                  </select>
                                </div>
                                <script>
                                  $(document).ready(function() {
                                    $(".chosen-select").chosen({
                                      no_results_text: "Oops, nothing found!"
                                    });
                                  });
                                </script>


                                <div class="col-12 pt-1 mx-3 d-flex">
                                  <h3>Company:<h3>
                                </div>
                                <div class="col-12 d-flex">
                                  <div class="col-md-5 col-12 mx-2 pb-1 form-floating">
                                    <input type="text" class="form-control" name="company" id="floatingnm" placeholder="Name">
                                    <label for="floatingnm">Company/Firm Name:</label>
                                  </div>
                                  <div class="col-md-5 col-12 mx-5 pb-1 form-floating">
                                    <input type="text" name="position" class="form-control" id="floatingpos" placeholder="Position">
                                    <label for="floatingpod">Position:</label>
                                  </div>
                                </div>

                                <div class="col-12 d-flex pt-1">
                                  <div class="col-md-6 col-12 mx-2 pt-2 pb-0.2">
                                  <lable for="avatar">Photo/Company Logo<p class="examples">(500px by 500px):</p></lable>
                                  </div>
                                  <div class="col-md-4 col-12 pt-2 pb-0.2 form-floating">                                  
                                    <input type="file" name="avatar" >
                                    <!--input type="submit" value="Upload"-->
                                  </div>
                                </div>

                                <div class="col-12 pt-2 btn-fr">
                                  <input type="submit" class="btn btn-primary w-100 " value = "Continue">
                                </div>
                                </div>
                               
                            </div>
                        </div>
                      </div>
                    </form>
                  </div>
                <div class="copyright justify-content-center pb-1 text-center">
                © Copyright <strong><span>UCLF-MIS 2023</span></strong>. All Rights Reserved
                </div>
                
      </section>
  </div>
  </div>

        
   
  </main><!-- End #main -->
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
<!--footer>   
        <div class="footer footer-copyright">
            <div class="container">
              <div class="row">
              <div class="col-md-12 justify-content-center">
                &copy; Copyright <strong><span>UCLF-MIS 2023</span></strong>. All Rights Reserved
              </div>
              </div>
            </div>
        </div>
    </footer-->
