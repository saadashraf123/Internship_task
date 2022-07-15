
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User Panel</title>


    <!--Include Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--Include Bootstrap-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!--Include Datatables-->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"></script>
    
    <!--Include Stylesheet-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    
    <!--Include libraries-->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"> -->
    <script src="js/scripts.js"></script>



</head>

<body class="sb-nav-fixed">
    <main>
        <!-- butttons and heading  -->
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-center">Costumer Entries</h1>
            <a class="btn btn-danger float-right mx-4 my-3" href=<?php echo base_url('Ulogout')?>>LogOut</a>
            <div class="my-4">
                <button type="button" class="btn btn-success float-right mb-4" onclick="emptyFields()" data-toggle="modal" data-target="#exampleModal">
                    Add New 
                </button>
            </div>
        </div>
        <!-- end of buttons and heading -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ADD NEW</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 login-form ">
                            <div class="col-lg-12 login-form">
                                <div class="form-group">
                                    <label class="form-control-label">FIRST NAME</label>
                                    <input type="text" id="fname" name="FName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">LAST NAME</label>
                                    <input type="text" id="lname" name="LName" class="form-control" i>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">EMAIL ADDRESS</label>
                                    <input type="email" id="email" name="Email" class="form-control" i>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">APPOINTMENT</label>
                                    <input type="datetime-local" id="adate" name="ADate" class="form-control" i>
                                </div>
                                <div class="col-lg-12 loginbttm">
                                    <div class="col-lg-6 px-0 text-danger login-btm login-text">
                                        <p id="response"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-lg-6 login-btm login-button">
                            <input type="button" id="button" class="btn btn-outline-primary" onclick="submitform()" value="ADD AN APPOINTMENT"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of Modal -->

        <!-- table  -->
        <div id="body">
            <table id="costumerentries" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Appintment Date and Time</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </thead>
            </table>    
        </div>
    </main>
    <!-- end of table -->


    <!-- footer -->
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Design By SAAD ASHRAF &reg;</div>
            </div>
        </div>
    </footer>
    <!-- end of footer -->

</body>

    <script>
        var edit= {'id':0};
        $(document).ready( function() {
            var entries = $('#costumerentries').DataTable({
                ajax: {
                    url : '<?php echo base_url('costumerentriesFunction')?>',
                    type: 'post',
                },
                columns: [
                    { data: 'first_name' },
                    { data: 'last_name' },
                    { data: 'email' },
                    { data: 'appointment_date'},
                    { data: 'status'},
                    {
                        data: null,
                        targets : 5,
                        render : function (data){
                            button = '<button type="button" id="edit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit</button>';
                            button1 = '<button type="button" id="edit" class="btn btn-secondary disabled" data-toggle="modal" data-target="#exampleModal">Edit</button>';

                            var today = new Date();
                            var DD = String(today.getDate()).padStart(2, '0');
                            var MM = String(today.getMonth() + 1).padStart(2, '0');
                            var YYYY = String(today.getFullYear());
                            var hh = String(today.getHours()).padStart(2, '0');
                            var mm = String(today.getMinutes()).padStart(2, '0');
                            var ss = String(today.getSeconds()).padStart(2, '0');
                            today = YYYY + "-" + MM + "-" + DD + " " + hh + ":" + mm + ":" + ss;
                            if(data.appointment_date > today){
                                return button;
                            }
                            else{
                                return button1;
                            }
                        },
                    }
               ],

               language: {
                    'paginate': {
                        'previous': '<i class="fa-solid fa-angles-left dark" style="color:black; cursor:pointer;">&nbsp &nbsp</i>',
                        'next': '<i class="fa-solid fa-angles-right" style="color:black; cursor:pointer;"></i>'
                    }
                },
                paging: true,
                autoWidth: false,
                dom: 'Bfrtip',
                buttons: [
                    'colvis',
                ]
            });
            $('#costumerentries tbody').on('click', '#edit', function() {
                edit = entries.row( $(this).parents('tr')).data();
                $.ajax({
                        url: "<?php echo base_url('edit')?>",
                        method: 'POST',
                        data: "id=" + edit['id'],
                        crossDomain: true,
                        headers: {
                            "accept": "application/json",
                            "Access-Control-Allow-Origin":"*"
                        },
                        success: function(data){
                            $('#fname').val(data[0]['first_name']);
                            $('#lname').val(data[0]['last_name']);
                            $('#email').val(data[0]['email']);
                            $('#adate').val(data[0]['appointment_date']);
                            $('#button').val("SAVE CHANGES");
                        }
                });
            });
        } );

        function submitform() {
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var email = $('#email').val();
            var adate = $('#adate').val();
            var regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var date = new Date() <= new Date(adate);

            if(fname == "" || fname == undefined){
                $('#fname').css('border', '1px solid red');
                $('#response').html('First Name must be filled');
            }
            else if(lname == "" || lname == undefined){
                $('#fname').css('border', '1px solid green');
                $('#lname').css('border', '1px solid red');
                $('#response').html('Last Name must be filled');
            }
            else if(email == "" || email == undefined){
                $('#fname').css('border', '1px solid green');
                $('#lname').css('border', '1px solid green');
                $('#email').css('border', '1px solid red');
                $('#response').html('Email must be filled');
            }
            else if (!email.match(regexEmail)) {
                $('#ususername').css('border', '1px solid green');
                $('#email').css('border', '1px solid red');
                $('#response').html('Enter a Valid Email Address'); 
            }
            else if(adate == "" || adate == undefined){
                $('#fname').css('border', '1px solid green');
                $('#lname').css('border', '1px solid green');
                $('#email').css('border', '1px solid green');
                $('#adate').css('border', '1px solid red');
                $('#response').html('Date must be filled');
            }
            else if(date == false){
                $('#fname').css('border', 'none');
                $('#lname').css('border', 'none');
                $('#email').css('border', 'none');
                $('#adate').css('border', '1px solid red');
                $('#response').html('Date must be after today');
            }
            else{
                $.ajax({
                    url: "<?php echo base_url('addCostumer')?>",
                    method: 'POST',
                    data: "ID=" + edit['id'] +"&FName=" + fname + "&LName=" + lname + "&Email=" + email + "&ADate=" + adate,
                    crossDomain: true,
                    headers: {
                        "accept": "application/json",
                        "Access-Control-Allow-Origin":"*"
                        },
                    success: function(){
                        $('#fname').css('border', '1px solid green');
                        $('#lname').css('border', '1px solid green');
                        $('#email').css('border', '1px solid green');
                        $('#adate').css('border', '1px solid green');
                        $('#response').html('Success').css({'color':'lightgreen','font-size':'24px', 'font-weight':'bold'});
                        setTimeout(function () {
                            /*Redirect to login page after 1 sec*/
                            window.location.href = '<?php echo base_url("userDashboard") ?>';
                        }, 1000)
                    }
                })
            }
        }

        function emptyFields(){
            $('#fname').val("");
            $('#lname').val("");
            $('#email').val("");
            $('#adate').val("");
            $('#button').val("ADD AN APPOINTMENT");

        }
    </script>