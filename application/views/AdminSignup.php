<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Bootstrap Login Page</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'><link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN SIGNUP
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" id="asusername" name="ASUserName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">EMAIL ADDRESS</label>
                                <input type="email" id="asemail" name="ASEmail" class="form-control" i>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" id="aspassword" name="ASPassword" class="form-control" i>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <p id="response"></p>
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button class="btn btn-outline-primary" onclick="submitform()">CREATE ACCOUNT</button>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
<!-- partial -->
  
</body>

<script>
            function submitform() {
                var username = $('#asusername').val();
                var email = $('#asemail').val();
                var password = $('#aspassword').val();
                var regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

                if(username == "" || username == undefined){
                    $('#asusername').css('border', '1px solid red');
                    $('#response').html('Username must be filled');
                }
                else if(email == "" || email == undefined){
                    $('#asusername').css('border', 'none');
                    $('#asemail').css('border', '1px solid red');
                    $('#response').html('Email must be filled');
                }
                else if (!email.match(regexEmail)) {
                    $('#asusername').css('border', 'none');
                    $('#asemail').css('border', '1px solid red');
                    $('#response').html('Enter a Valid Email Address'); 
                }
                else if(password == "" || password == undefined){
                    $('#asusername').css('border', 'none');
                    $('#asemail').css('border', 'none');
                    $('#aspassword').css('border', '1px solid red');
                    $('#response').html('Password must be filled');
                }
                else{
                    $.ajax({
                        url: "<?php echo base_url('adminSignup')?>",
                        method: 'POST',
                        data: "ASUserName=" + username + "&ASEmail=" + email + "&ASPassword=" + password,
                        crossDomain: true,
                            headers: {
                                "accept": "application/json",
                                "Access-Control-Allow-Origin":"*"
                            },
                        success: function(result){
                            console.log(result);
                            if(result == 0){
                                $('#asusername').css('border', '1px solid green');
                                $('#asemail').css('border', '1px solid green');
                                $('#aspassword').css('border', '1px solid green');
                                $('#response').html('Success').css({'color':'lightgreen','font-size':'24px', 'font-weight':'bold'});
                                setTimeout(function () {
                                    /*Redirect to login page after 1 sec*/
                                    window.location.href = '<?php echo base_url("dashboard") ?>';
                                }, 1000)
                            }
                            else{
                                $('#asusername').css('border', '1px solid red');
                                $('#asemail').css('border', '1px solid red');
                                $('#response').html('Username or Email is Already Exist');
                            }
                        }
                    })
                }
            }
        </script>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</html>
