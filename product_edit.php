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
        <?php
                if(isset($_GET['id'])){
                $product_id = mysqli_real_escape_string($con,$_GET['id']);
                $query = "SELECT * FROM product WHERE id='$product_id'";
                $query_run = mysqli_query($con,$query);
                
                if(mysqli_num_rows($query_run)>0)
                {
                    $product = mysqli_fetch_array($query_run);
                    
                    ?>
        <form action="connection.php" method="POST" enctype="multipart/form-data">  
        <div class="card card-dark">
            <div class="card-header" align="right">
              <h3 class="card-title">Edit Product</h3>
              <div class="btn">
                   <a class="btn btn-danger" href="index.php">BACK</a>
                      </div> 
            </div>
            <div class="card-body">
              <div class="form-group">
              <input type="hidden" name="product_id" value="<?= $product['id'];?>">
                      
              <label >Name</label>
                <input type="text" name="pname" value="<?= $product['name'];?>" class="form-control" id="productname" placeholder="Enter product name">
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" value="<?= $product['price'];?>" class="form-control" id="productprice" placeholder="Enter price">
              </div>
              <div class="form-group">
                <label>Status</label>
                <input type="number" name="status" value="<?= $product['status'];?>" class="form-control" id="status" placeholder="Enter status">
              </div>
             <div class="card-footer">
              <button type="submit" name="update_product" class="btn btn-dark">Submit</button>
            </div>
               
            </div>
              </div>
              <!-- /.card-body -->

            </form>
            <?php
                }
                else{

                    echo "<h4>No Such Id Found</h4>";
                }
                }
                ?>
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