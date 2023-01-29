<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
  // echo "admin".$_SESSION['username'];
  }

include 'header.php';
include 'siderbar.php';
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
       <!-- left column -->
        <div class="col-md-12">
        <form action="connection.php" method="POST" enctype="multipart/form-data">  
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">ADD ACCOUNT</h3>
            </div>
            <div class="card-body">


              <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                <label >Account Type</label>
                 <select name="usertype" class="form-control select2">
                    <option>Select User</option>
                    <option>purchaser</option>
                    <option>customer</option> 
                </select> 
                </div>
              </div>
              <div class="col-md-4">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name" required="">
              </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
              <label>Address</label>
                <input type="text" name="address" class="form-control"  placeholder="Enter address" required="">
              </div>
              </div>
              </div>
              <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                <label>Phone Number</label>
                <input type="number" name="phone" class="form-control"  placeholder="Enter phone number" required="">
  </div>
  </div>
  <div class="col-md-4">
  <div class="form-group">
   <label>Opening Balance</label>
    <input type="number" name="balance" class="form-control"  placeholder="Enter balance" required="">
               
  </div>
  </div>
  <div class="col-md-4">
  <div class="form-group m-4">
  <button type="submit" name="save_account" class="btn btn-primary">Submit</button>
  </div>
</div>

</div>
              </div>
              </div>      
              </div>
             </div>
              </div>
              <!-- /.card-body -->

            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<?php
include 'footer.php';
?>