<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>APPROVAL TEMPLATE</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <style type="text/css"> 
     body {
        margin: 0;
        background-color: #cccccc;
     }
     table {
        border-spacing: 0;
     }
     td {
        padding: 0;
     }
     img {
        border: 0;
     }
     .wrapper {
        width: auto;
        table-layout: fixed;
        background-color: #cccccc;
        padding-bottom: 60px;
     }
     .main {
        background-color: #fff;
        margin: 0 auto;
        width: auto;
        max-width: 600px;
        border-spacing: 0;
        font-family: sans-serif;
        color: #171a1b;
     }
     .two-columns {
        text-align: center;
        font-size: 0;
     }
     .two-columns .column {
        width: 80%;
        max-width: 300px;
        display: inline-block;
        vertical-align: top;
        text-align: center;
    }
     .commentDisplay {
        background: #eee;
        text-align: center;
        padding: 20px 50px;
        color: #0e3d97;
    }
    .logo-footer {
        filter: brightness(0) invert(1);
        height: 90px;
    }
    .btn-pri {
        background-color: #0e3d97; 
        color: #fff; 
        font-size: 1rem; 
        font-weight: 400;
        line-height: 1.5;
        color: #fff;
        border-width: 1px;
        border-color: transparent;
        border-radius: 0.375rem;
        padding: 0.5rem;
    }
  </style> 
  </head>

<body>
    <center class="wrapper">
        <table class="main" width="100%">
        <!-- Top Border -->
            <tr>
                <td height="8" style="background-color: #0e3d97;"></td>
            </tr>
        <!-- Top Border -->
            <tr>
                <td style="padding: 14px 0 0px;">
                    <table width="100%">
                         <tr>
                            <td class="two-columns">
                            <table class="column" style="float: right;
    padding: 0px 0px 0px 107px;">
                                <tr>
                                <td style="padding: 15px 0px; position: absolute; margin-left: 128px;">
                                        <img src="" alt="Profile Image" style="outline: none;
                                        text-decoration: none;
                                        display: inline-block;
                                        height: 50px;
                                        width: 50px;
                                        border-radius: 9999px;
                                        background-color: #eae6df;" width="50"> 
                                    </td>
                                    
                                </tr>
                            </table>
                            <table class="column">
                                <tr>
                                <td style="padding: 0 5px 10px;position: relative;left: -140px;">
                                        <a href="#"><img src="public/assets/img/logo-rmbg.png" alt="UCLF-MiS" width="180"> 
                                        </a> 
                                    </td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <!-- Salutation & Body -->
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td style="text-align: center; padding:15px;">
                                <p style="font-size: 20px; font-weight: bold; text-align:left; color: #124098;">Hi </?/php echo $user->FirstName;?>,</p>
                                <p style="line-height: 23px; font-size: 15px; padding: 5px 0 0px; text-align:justify;">Thanks, Your account has been created successfully.                                   <br>Your change password request has been received. Please click the Activate Now butoon or the link below to complete this step.</br>
                                    <br>Please note! <strong>This link is valid for only 24 hours</strong>.
                                </p>
                               
                                <p class="commentDisplay"><button class="btn-pri">Activate Now</a></button></p>
                                <p>OR</p>
                                <p class="commentDisplay">Link Here</p>
                                <p style="line-height: 23px; font-size: 15px; padding: 5px 0 0px; text-align:left;">Regards,</p>
                                <p style="line-height: 23px; font-size: 15px; text-align:left;">UCLF - Team</p>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
            <!-- Footer -->
            <tr>
                <td style="background-color: #0e3d97;">
                    <table width="100%">
                        <tr>
                            <td style="text-align:center; padding:45px 20px; color: #fff;font-size: 14px;">
                                <a href="#"><img src="public/assets/img/logo-rmbg.png" alt="UCLF-MiS" width="auto" class="logo-footer"> 
                                </a>
                                <p>info@ugandachristianlawyers.org</p>
                                <p>Baptist House 1st Floor Plot 42 Bombo Rd</p>
                                <p>+256393249527</p>
                                <p><a href="https://www.facebook.com/uclfuganda/"><img src="public/assets/img/facebook.png" alt="UCLF-MiS" width="30" style="filter: brightness(0) invert(1);"></a>
                                <a href="https://twitter.com/InfoUclf"><img src="public/assets/img/twitter.png" alt="UCLF-MiS" width="30" style="filter: brightness(0) invert(1);"></a>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>

</body>
</html> 