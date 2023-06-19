<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UCLF-Signup</title>
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

  <!--CDN bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
  <!-- Main CSS File -->
  <link href="public/assets/css/style.css" rel="stylesheet">

  <style>
    .banner-bg {
    background: linear-gradient(180deg, rgb(18 64 152), rgba(255, 255, 255, 0)), url(public/assets/img/hammer2.jpg) no-repeat center center;
    min-height: 200px;
    background-size: cover;
    background-attachment: fixed;
	}
  </style>
</head>

<body>

  <main>
	<div class="banner-bg">
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-7 col-md-7 d-flex flex-column align-items-center justify-content-center">
			  <div class="card mb-3">
			  	<div class="card-body">
				<div class="justify-content-center py-2">
				<a href="login" class="logo1 d-flex align-items-center w-auto margin= 0 auto;" >
					<img src="public/assets/img/logo-rmbg.png" alt="">
					</a>
				
                  <div class="pt-0 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Sign up to join the UCLF Membership Fraternity</p>
                  

				  	<?php if(session()->getTempdata('success')): ?>
                    <div class='alert alert-success'><?= session()->getTempdata('success');?></div>
                    <?php endif; ?> 

                    <?php if(session()->getTempdata('error')):?>
                        <div class='alert alert-danger'><?= session()->getTempdata('error');?></div>
                    <?php endif;?>

                    <?php if(isset($validation)):?>
                        <div class="alert alert-danger"><?= $validation->listErrors();?></div>
                    <?php endif;?>
				
					
					<form action="http://localhost/UCLF/signup" method="post" enctype="multipart/form-data" accept-charset="utf-8">
					<div class="row g-3">
                    <div class="col-md-6">
                      <label for="fName" class="form-label">First Name:</label>
                      <input type="text" name="fname" class="form-control" id="fName" placeholder="First Name" required>
                      <div class="invalid-feedback">Please, enter your first name!</div>
                    </div>

					<div class="col-md-6">
                      <label for="lName" class="form-label">Last Name:</label>
                      <input type="text" name="lname" class="form-control" id="lName" placeholder="Last Name" required>
                      <div class="invalid-feedback">Please, enter your last name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email:</label>
					  <div class="input-group has-validation">
						<span class="input-group-text" id="inputGroupPrepend">
							<div class="icon">
								<i class="bi bi-envelope-fill"></i>
							</div>
						</span>
						<input type="email" name="email" class="form-control" id="yourEmail" required>
						<div class="invalid-feedback">Please enter a valid Email adddress!</div>
					  </div>
                    </div>

					<div class="col-6">
                      <label for="password" class="form-label">Password:</label>
					  <div class="input-group has-validation">
                        <div class="icon input-group-text"id="inputGroupPrepend">
                          <i class="ri ri-eye-close-line" id="togglePassword"></i>
                        </div>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
					  </div>
                    </div>

					<div class="col-6">
                      <label for="passwordCONF" class="form-label">Confirm Password:</label>
					  <div class="input-group has-validation">
                        <div class="icon input-group-text" id="inputGroupPrepend">
                          <i class="ri ri-eye-close-line" id="togglePasswordConf"></i>
                        </div>
                      <input type="password" name="passwordConf" class="form-control" id="passwordCONF" required>
                      <div class="invalid-feedback">Please confirm your password!</div>
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

					<script>
						const togglePasswordConf = document.querySelector("#togglePasswordConf");
						const passwordconf = document.querySelector("#passwordCONF");

						togglePasswordConf.addEventListener("click", function () {
							// toggle the type attribute
							const type = passwordconf.getAttribute("type") === "password" ? "text" : "password";
							passwordconf.setAttribute("type", type);
							
							// toggle the icon
							this.classList.toggle("ri-eye-line");
						});
					</script>

					
                    <div class="col-12">
                      <label for="yourTel" class="form-label">Telephone:</label>
					  <div class="input-group has-validation">
						<span class="input-group-text" id="inputGroupPrepend">
							<div class="icon">
								<i class="bi bi-phone-fill"></i>
							</div>
						</span>
                      <input type="tel" name="telephone" class="form-control" id="yourTel" placeholder="Enter telephone number" value='<?= set_value('telephone')?>' required>
                      <div class="invalid-feedback">Please enter a valid contact!</div>
					  </div>
					</div>

					
						<div class="col-md-6">
							<label for="gender" class='form-group'>Gender:</label>
							<div class="input-group has-validation">
								<span class="input-group-text" id="inputGroupPrepend">
										<div class="icon">
											<i class="bi bi-people-fill"></i>
										</div>
								</span>
								<select id="gender" name="gender" class="form-select pt-2" placeholder="Select your gender:" value='<?= set_value('gender')?>' required>
								<option value="">Select your gender:</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
								</select>
								<div class="invalid-feedback">Gender is required!</div>
							</div>
						</div>										
						
						<div class="col-md-6">
							<label for="membType" class="form-label">Membership type:</label>
							<select class="form-select" id="membType" name="membership-type" aria-label="Membership type" required>
								<option value="individual">Individual</option>
								<option value="institutional">Institutional</option>
								<option value="law-fellowship">Law Fellowship</option>
								<option value="life">Life</option>
								<option value="student">Student</option>
                    		</select>
							<div class="invalid-feedback">Please choose membership-type!</div>	
						</div>
                    

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <input type="submit" class="btn btn-primary w-100" value = "Create Account" >
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login">Log in</a></p>
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

  <!--Main JS File -->
  <script src="public/assets/js/main.js"></script>

</body>

</html>



						
						
					<!--div id="institutional-form" class="hidden">
						<h4>Institutional Membership Signup Form</h4>
						< Add institutional membership signup form fields here > 
						<div class="form-group">
						<label>Institution Name:</label>
  						<input type="text" name="OrgName" class="form-control" placeholder="Enter Institution Name">
						</div>

						<div class="form-group">
						<label>Institution Email:</label>
  						<input type="email" name="OrgEmail" class="form-control" placeholder="Enter Institution Email">
						</div>

						<div class="form-group">
						<label>Telephone:</label>
						<input type="tel" name="OrgTel" class="form-control" placeholder="Enter institution telephone number" >
						</div>

						<div class='form-group'>
                    	<label>Population:</label>
                    	<input type="number" name="population" class="form-control" placeholder="Enter number of collective" >
                		</div>
					

					</div>
					<!-div id="individual-form" class="hidden">
						<h4>Individual Membership Signup Form</h4>
						<!- Add individual/student membership signup form fields here >
						<div class='form-group'>
                    	<label>Date of Birth:</label>
						<input type="date" id="D.O.B" name="D.O.B" class="form-control" placeholder="Y-m-d :: 1999-07-11">
                      	</div>

						<div class="form-group">
						<label>Photo</label>
                    	<input type="file" name="photo" class="form-control" >
						</div>

						<div class='form-group'>
                    	<label>Gender:</label>
						<select id="gender" name="gender">
						<option value="male">Male</option>
						<option value="female">Female</option>
						</select>
						</div>

						<div class='form-group'>
                    	<label>Address:</label>
                    	<input type="text" name="address" class="form-control" placeholder="Enter your address" >
                		</div>

						<div class='form-group'>
                    	<label>Occupation</label>
                    	<input type="text" name="occupation" class="form-control" placeholder="Enter occupation" >
                		</div>
					</div>

					<div id="law-fellowship-form" class="hidden">
						<h4>Law Fellowship Membership Signup Form</h4>
						<!- Add law fellowship membership signup form fields here >
						<div class="form-group">
						<label>Fellowship Name:</label>
  						<input type="text" name="fship_name" class="form-control" placeholder="Enter Fellowship Name">
						</div>

						<div class="form-group">
						<label>Photo</label>
                    	<input type="file" name="photo" class="form-control" >
						</div>

						<div class='form-group'>
                    	<label>Population:</label>
                    	<input type="number" name="population" class="form-control" placeholder="Enter number of collective" >
                		</div>
					</div>

					<div id="life-form" class="hidden">
						<h4>Life Membership Signup Form</h4>
						<!- Add law fellowship membership signup form fields here >
						<div class='form-group'>
                    	<label>Date of Birth:</label>
						<input type="date" id="D.O.B" name="D.O.B" class="form-control" placeholder="Y-m-d :: 1999-07-11">
                    	</div>

						<div class="form-group">
						<label>Photo</label>
                    	<input type="file" name="photo" class="form-control" >
						</div>

						<div class='form-group'>
                    	<label>Gender:</label>
						<select id="gender" name="gender">
						<option value="male">Male</option>
						<option value="female">Female</option>
						</select>
						</div>

						<div class='form-group'>
                    	<label>Address:</label>
                    	<input type="text" name="address" class="form-control" placeholder="Enter your address" >
                		</div>

						<div class='form-group'>
                    	<label>Occupation</label>
                    	<input type="text" name="occupation" class="form-control" placeholder="Enter occupation" >
                		</div>
					</div>

					<div id="student-form" class="hidden">
						<h4>Student Membership Signup Form</h4>
						<!- Add life membership signup form fields here >
						<div class='form-group'>
                    	<label>Date of Birth:</label>
						<input type="date" id="D.O.B" name="D.O.B" class="form-control" placeholder="Y-m-d :: 1999-07-11">
                    	</div>

						<div class='form-group'>
                    	<label>Gender:</label>
						<select id="gender" name="gender">
						<option value="male">Male</option>
						<option value="female">Female</option>
						</select>
						</div>

						<div class='form-group'>
                    	<label>Institution Currently attended:</label>
                    	<input type="text" name="institutionAttended" class="form-control" placeholder="Enter institution currently attended" >
                		</div>

						<div class='form-group'>
                    	<label>Address:</label>
                    	<input type="text" name="address" class="form-control" placeholder="Place of residence" >
                		</div>

						<div class='form-group'>
                    	<label>Year of study:</label>
                    	<input type="number" name="y.o.s" class="form-control" placeholder="Enter year of study" >
                		</div>
					</div-->
					<!--button type="submit" class="btn btn-primary btn-block mt-4">Submit</button>
				
			</div>
		</div>
	</div-->
	<!--script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#membership-type').on('change', function() {
				var membershipType = $(this).val();
				$('.hidden').hide();
				if (membershipType === 'institutional') {
					$('#institutional-form').show();
				} else if (membershipType === 'individual') {
					$('#individual-form').show();
				} else if (membershipType === 'law-fellowship') {
					$('#law-fellowship-form').show();
				} else if (membershipType === 'student') {
					$('#student-form').show();
				} else if (membershipType === 'life') {
					$('#life-form').show();
				} 
			});
		});
	</script>
</body>
</html-->
<!--label for="yourAddress" class="form-label">Address:</label>
							<div class="input-group has-validation">
								<span class="input-group-text" id="inputGroupPrepend">
									<div class="icon">
										<i class="bi bi-geo-alt-fill"></i>
									</div>
								</span>
							<input type="text" name="address" class="form-control" id="yourAddress" placeholder="Place of residence" value='lue('address')?>' required>
							<div class="invalid-feedback">Address is required!</div>
							</div-->
