
    <div id="layoutSidenav_content">
    <main>
        <!-- butttons and heading  -->
        <div class="container-fluid px-4">
            <h1 class="mt-4">USERS</h1>
            <div class="my-4">
                <button type="button" class="btn btn-success float-right mb-4" onclick="UseremptyFields()" data-toggle="modal" data-target="#exampleModal">
                    Add New 
                </button>
            </div>
        </div>

        
<!-- partial:index.partial.html -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title" id="exampleModalLabel">
                            <h4 class="col-lg-12 login-key login-title">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                        USER SIGNUP
                            </h4>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" id="ususername" name="USUserName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">EMAIL ADDRESS</label>
                                <input type="email" id="usemail" name="USEmail" class="form-control" i>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" id="uspassword" name="USPassword" class="form-control" i>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <p id="response"></p>
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <input type="button" id="button" class="btn btn-outline-primary" onclick="submitformUser()" value="CREATE USER"/>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
    </div>
    
</div>
<div class="container-fluid px-4">
          <!-- <h1 class="mt-4">Users</h1> -->
          <div id="body">
            <table id="userregistration" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                    </tr>
                </thead>
            </table>    
         </div>
        </div>
<!-- </main> -->
<!-- </div> -->