<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
  // echo "admin".$_SESSION['username'];
  }

include 'header.php';
include 'siderbar.php';
require 'database.php';
$bid = $_GET["id"];

                    $b = mysqli_query($con,"select bills.* , account.* from bills join account on bills.account_id = account.id where bills.invoice_id='$bid'");
                    $resy= mysqli_fetch_assoc($b);
                    $customer_name  = $resy['name']; 
                   $subtotal=$resy['total_amount'];
                   $paidtotal=$resy['paid_amonut'];

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>View Details</h1>
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
      <label >Customer Name</label> 
      <h5><?php echo  $customer_name;?></h5>  
      </div>
             <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  
            $query ="select * from billsdetails where bill_id='$bid'";

            $p_name="";
                  $query_run = mysqli_query($con,$query);
                 if(mysqli_num_rows($query_run)>0){
                  foreach($query_run as $Row)
                  {

                    $pid = $Row['p_id'];
                    $q = mysqli_query($con,"select name from product where id='$pid'");
                    $res= mysqli_fetch_assoc($q);
                    $p_name  = $res['name']; 
                  ?>
                  <tr>
                    
                     <td><?php echo  $p_name;?></td>
                     <td><?php echo  $Row['price'];?></td>
                     <td><?php echo  $Row['quantity'];?></td>
                     <td><?php echo  $Row['total'];?></td>
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
                            <th colspan="3">Total Amount</th>
                            <td><?php echo  $subtotal;?></td>
                            </tr>
                            <tr>
                            <th colspan="3">Paid Amount</th>
                            <td><?php echo  $paidtotal;?></td>
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