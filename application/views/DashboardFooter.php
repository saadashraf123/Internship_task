<footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Design By SAAD ASHRAF &reg;</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</body>
<script>
        var edit= {'id':0};
        $(document).ready( function () {
            var entries= $('#adminregistration').DataTable({
                ajax: {
                    url : '<?php echo base_url('adminregistrationFunction')?>',
                    type: 'post',
                },
                columns: [
                { data: 'username' },
                { data: 'email' },
                {
                    data: null,
                    targets : 2,
                    defaultContent: '<button type="button" id="edit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit</button>'
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
            $('#adminregistration tbody').on('click', '#edit', function() {
                edit = entries.row( $(this).parents('tr')).data();
                $.ajax({
                        url: "<?php echo base_url('editUser')?>",
                        method: 'POST',
                        data: "id=" + edit['id'],
                        crossDomain: true,
                        headers: {
                            "accept": "application/json",
                            "Access-Control-Allow-Origin":"*"
                        },
                        success: function(data){
                            $('#asusername').val(data[0]['username']);
                            $('#asemail').val(data[0]['email']);
                            $('#aspassword').val(data[0]['password']);
                            $('#button').val("SAVE CHANGES");
                        }
                });
            });
        } );

        $(document).ready( function () {
            var entries = $('#userregistration').DataTable({
                ajax: {
                    url : '<?php echo base_url('userregistrationFunction')?>',
                    type: 'post',
                },
                columns: [
                { data: 'username' },
                { data: 'email' },
                {
                    data: null,
                    targets : 2,
                    defaultContent: '<button type="button" id="edit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit</button>'
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
            $('#userregistration tbody').on('click', '#edit', function() {
                edit = entries.row( $(this).parents('tr')).data();
                $.ajax({
                        url: "<?php echo base_url('editUser')?>",
                        method: 'POST',
                        data: "id=" + edit['id'],
                        crossDomain: true,
                        headers: {
                            "accept": "application/json",
                            "Access-Control-Allow-Origin":"*"
                        },
                        success: function(data){
                            $('#ususername').val(data[0]['username']);
                            $('#usemail').val(data[0]['email']);
                            $('#uspassword').val(data[0]['password']);
                            $('#button').val("SAVE CHANGES");
                        }
                });
            });          
        } );

        $(document).ready( function () {
            var entries = $('#bookinginfo').DataTable({
                ajax: {
                    url : '<?php echo base_url('bookinginfoFunction')?>',
                    type: 'post',
                },
                columns: [
                    {data: 'id'},
                    { data: 'first_name' },
                    { data: 'email' },
                    { data: 'appointment_date'},
                    { data: 'added_by' },
                    {data: 'status'},
                    {   
                        data: null,
                        targets : 6,
                        defaultContent: '<button type="button" id="edit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit</button>'
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
            $('#bookinginfo tbody').on('click', '#edit', function() {
                edit = entries.row( $(this).parents('tr')).data();
                $.ajax({
                    url: "<?php echo base_url('editStatus')?>",
                    method: 'POST',
                    data: "id=" + edit['id'],
                    crossDomain: true,
                    headers: {
                        "accept": "application/json",
                        "Access-Control-Allow-Origin":"*"
                    },
                    success: function(data){
                        $('#name').val(data[0]['first_name']);
                        $('#status').val(data[0]['status']);
                    }
                });
            });          
        } );

        $(document).ready( function () {
            var pending = $('#pendingentries').DataTable({
                ajax: {
                    url : '<?php echo base_url('pendingentriesFunction')?>',
                    type: 'post',
                },

                columns: [
                    {data: 'id'},
                    { data: 'first_name' },
                    { data: 'email' },
                    { data: 'appointment_date'},
                    { data: 'added_by' },
                    {
                        data: null,
                        targets: -1,
                        defaultContent: '<button id="approve" class="btn btn-success">Approve</button>&nbsp<button id="decline" class="btn btn-danger">Declined</button>',
                    }
               ],
               
               language: {
                    'paginate': {
                        'previous': '<i class="fa-solid fa-angles-left dark" style="color:black; cursor:pointer;">&nbsp &nbsp</i>',
                        'next': '<i class="fa-solid fa-angles-right" style="color:black; cursor:pointer;"></i>'
                    },               
                },
                paging: true,
                autoWidth: false,
                dom: 'Bfrtip',
                buttons: [
                    'colvis',
                ]
            });

            $('#pendingentries tbody').on('click', '#approve', function() {
                var approve = pending.row( $(this).parents('tr')).data();
                $.ajax({
                        url: "<?php echo base_url('approve')?>",
                        method: 'POST',
                        data: "id=" + approve['id'],
                        crossDomain: true,
                        headers: {
                            "accept": "application/json",
                            "Access-Control-Allow-Origin":"*"
                        },
                        success: function(data){
                            window.location.reload();
                        }
                });
            });
            
            $('#pendingentries tbody').on('click', ' #decline', function () {
                var decline = pending.row( $(this).parents('tr')).data();
                $.ajax({
                        url: "<?php echo base_url('decline')?>",
                        method: 'POST',
                        data: "id=" + decline['id'],
                        crossDomain: true,
                        headers: {
                            "accept": "application/json",
                            "Access-Control-Allow-Origin":"*"
                        },
                        success: function(data){
                            window.location.reload();
                        }
                });
            });
        } );

        function submitformUser() {
                var username = $('#ususername').val();
                var email = $('#usemail').val();
                var password = $('#uspassword').val();
                var regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

                if(username == "" || username == undefined){
                    $('#ususername').css('border', '1px solid red');
                    $('#response').html('Username must be filled');
                }
                else if(email == "" || email == undefined){
                    $('#ususername').css('border', 'none');
                    $('#usemail').css('border', '1px solid red');
                    $('#response').html('Email must be filled');
                }
                else if (!email.match(regexEmail)) {
                    $('#ususername').css('border', 'none');
                    $('#usemail').css('border', '1px solid red');
                    $('#response').html('Enter a Valid Email Address'); 
                }
                else if(password == "" || password == undefined){
                    $('#ususername').css('border', 'none');
                    $('#usemail').css('border', 'none');
                    $('#uspassword').css('border', '1px solid red');
                    $('#response').html('Password must be filled');
                }
                else{
                    $.ajax({
                        url: "<?php echo base_url('userSignup')?>",
                        method: 'POST',
                        data: "ID=" + edit['id'] + "&USUserName=" + username + "&USEmail=" + email + "&USPassword=" + password,
                        crossDomain: true,
                            headers: {
                                "accept": "application/json",
                                "Access-Control-Allow-Origin":"*"
                            },
                        success: function(result){
                            if(result == 0){
                                $('#ususername').css('border', '1px solid green');
                                $('#usemail').css('border', '1px solid green');
                                $('#uspassword').css('border', '1px solid green');
                                $('#response').html('Success').css({'color':'lightgreen','font-size':'24px', 'font-weight':'bold'});
                                setTimeout(function () {
                                    /*Redirect to login page after 1 sec*/
                                    window.location.href = '<?php echo base_url("userRegistration") ?>';
                                }, 1000)
                            }
                            else{
                                $('#ususername').css('border', '1px solid red');
                                $('#usemail').css('border', '1px solid red');
                                $('#response').html('Username or Email is Already Exist');
                            }
                        }
                    })
                }
            }
            function submitformAdmin() {
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
                        data: "ID=" + edit['id'] + "&ASUserName=" + username + "&ASEmail=" + email + "&ASPassword=" + password,
                        crossDomain: true,
                            headers: {
                                "accept": "application/json",
                                "Access-Control-Allow-Origin":"*"
                            },
                        success: function(result){
                            if(result == 0){
                                $('#asusername').css('border', '1px solid green');
                                $('#asemail').css('border', '1px solid green');
                                $('#aspassword').css('border', '1px solid green');
                                $('#response').html('Success').css({'color':'lightgreen','font-size':'24px', 'font-weight':'bold'});
                                setTimeout(function () {
                                    /*Redirect to login page after 1 sec*/
                                    window.location.href = '<?php echo base_url("AdminRegistration") ?>';
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
            function submitStatus(){
                var status = $('#status').val();
                $.ajax({
                    url: "<?php echo base_url('updateStatus')?>",
                    method: 'POST',
                    data: "ID=" + edit['id'] + "&Status=" + status,
                    crossDomain: true,
                        headers: {
                        "accept": "application/json",
                            "Access-Control-Allow-Origin":"*"
                        },
                    success: function(result){
                        if(result == 0){
                            $('#status').css('border', '1px solid green');
                            $('#response').html('Success').css({'color':'lightgreen','font-size':'24px', 'font-weight':'bold'});
                            setTimeout(function () {
                                /*Redirect to login page after 1 sec*/
                                window.location.href = '<?php echo base_url("bookingInfo") ?>';
                            }, 1000)
                            }
                        else{
                            $('#status').css('border', '1px solid red');
                            $('#response').html('Something Went Wrong');
                        }
                    }
                })
            }
            function AdminemptyFields(){
                $('#asusername').val("");
                $('#asemail').val("");
                $('#aspassword').val("");
                $('#button').val("CREATE ADMIN");
            }
            function UseremptyFields(){
                $('#ususername').val("");
                $('#usemail').val("");
                $('#uspassword').val("");
                $('#button').val("CREATE USER");
            }

    </script>
</html>
      