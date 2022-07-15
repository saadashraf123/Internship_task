<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'><link rel="stylesheet" href="./style.css">
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
                    USER LOGIN
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" id="uusername" name="UUserName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" id="upassword" name="UPassword" class="form-control" i>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <p id="response"></p>
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button class="btn btn-outline-primary" onclick="submitform()">LOGIN</button>
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
                var username = $('#uusername').val();
                var password = $('#upassword').val();

                if(username == "" || username == undefined){
                    $('#uusername').css('border', '1px solid red');
                    $('#response').html('Username must be filled');
                }
                else if(password == "" || password == undefined){
                    $('#upassword').css('border', '1px solid red');
                    $('#response').html('Password must be filled');
                }
                else{
                    $.ajax({
                        url: "<?php echo base_url('userLogin')?>",
                        method: 'POST',
                        data: "UUserName=" + username + "&UPassword=" + password,
                        crossDomain: true,
                            headers: {
                                "accept": "application/json",
                                "Access-Control-Allow-Origin":"*"
                            },
                        success: function(result){
                            console.log(result);
                            if(result == 1){
                                $('#uusername').css('border', '1px solid green');
                                $('#upassword').css('border', '1px solid green');
                                $('#response').html('Success').css({'color':'lightgreen','font-size':'24px', 'font-weight':'bold'});
                                setTimeout(function () {
                                    /*Redirect to login page after 1 sec*/
                                    window.location.href = '<?php echo base_url("userDashboard") ?>';
                                }, 1000)
                            }
                            else{
                                $('#uusername').css('border', '1px solid red');
                                $('#upassword').css('border', '1px solid red');
                                $('#response').html('Incorrect Username or Password');
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
