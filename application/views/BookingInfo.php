      
    <div id="layoutSidenav_content">
    <main>
        <!-- butttons and heading  -->
        <div class="container-fluid px-4">
            <h1 class="mt-4">Booking Information</h1>
        </div>

        
<!-- partial:index.partial.html -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title" id="exampleModalLabel">
                            <h4 class="col-lg-12 login-key login-title">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                        EDIT STATUS
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
                                <label class="form-control-label">NAME</label>
                                <input type="text" id="name" disabled name="Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">STATUS</label>
                                <select  id="status" name="status" class="form-control">
                                    <option value="Approved">Approved</option>
                                    <option value="Decline">Decline</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <p id="response"></p>
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <input type="button" id="button" class="btn btn-outline-primary" onclick="submitStatus()" value="SAVE CHANGES"/>
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
            <table id="bookinginfo" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Appintment Date</th>
                        <th>Added By</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </thead>
            </table>    
         </div>
        </div>

        
      