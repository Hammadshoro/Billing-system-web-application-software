<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
  // echo "admin".$_SESSION['username'];
  }

include 'header.php';
include 'siderbar.php';
require 'database.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product Details</h1>
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
        <div class="search-box form-group">
                <input type="search"  list="search_keyword" name="product_code_name" onkeyup="myFuntion()" class="form-control" id="search_product" placeholder="search product by name/code">
              <datalist id="search_keyword">
             <option value="">
          </datalist> 
              </div>
             <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $query = "SELECT * FROM product";
                  $query_run = mysqli_query($con,$query);
                 if(mysqli_num_rows($query_run)>0){
                  foreach($query_run as $product)
                  {
                  ?>
                  <tr>
                   <td><?= $product['id'];?></td>
                      <td><?= $product['name'];?></td>
                      <td><?= $product['price'];?></td>
                      <td><?= $product['status'];?></td>
                      <td>
                          <a class="btn btn-outline-primary" href="#">VIEW</a>
                          <a class="btn btn-outline-info" href="product_edit.php?id=<?= $product['id'];?>">EDIT</a>
                          <form action="connection.php" method="POST" class="d-inline">
                          <button class="btn btn-outline-danger" name="delete_product" value="<?= $product['id'];?>" type="submit">DELETE</button>
                          </form>
                      </td>
                  </tr>
                  <?php
                  }
              }
              else{
                  echo"<h5>No Records Founds</h5>";
              }
              ?>
              
                 <tbody>
                  <tfoot>
                  <tr>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<?php
include "footer.php";
?>