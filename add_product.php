<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
  // echo "admin".$_SESSION['username'];
  }

include 'header.php';
include 'siderbar.php';

?>

<!-- Content Wrapper. Contains page content -->
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
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ADD PRODUCT</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label >Name</label>
                <input type="text" name="pname" class="form-control" id="productname" placeholder="Enter product name">
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" class="form-control" id="productprice" placeholder="Enter price">
              </div>
              <div class="form-group">
                <label>Status</label>
                <input type="number" name="status" class="form-control" id="status" placeholder="Enter status">
              </div>
             <div class="card-footer">
              <button type="submit" name="save_product" class="btn btn-primary">Submit</button>
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
include "footer.php";
?>