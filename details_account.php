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
<div class="content-wrapper"> 
<div class="card">
            <div class="card-header">
              <h1>Bills Details</h1>
            </div>
<section class="content-header">
<div class="row">
<?php
$acc_id = $_GET['id'];
                
                $account_id = mysqli_real_escape_string($con,$_GET['id']);
                $query = "SELECT * FROM bills WHERE account_id='$acc_id'";
                $query_run = mysqli_query($con,$query);
                    while($row = mysqli_fetch_array($query_run)){
                    $bill_id =$row['invoice_id'];
                   
                  ?>

            <div class="col-md-4">
             <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">ID: <?= $row['invoice_id'];?>-  total: <?= $row['total_amount'];?> </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
            <table class="table table-bordered">
              <thead>
                           <tr>
                              <th>P.ID</th>
                              <th>Product</th>
                              <th>Qty</th>
                              <th >Price</th>
                              <th >Total</th>
                               </tr>
                        </thead>
                        <tbody id="" class="" >
                        <?php
                        $sql="select *from billsdetails bd left join product p on bd.p_id=p.id where bd.bill_id='$bill_id'";
                        
                         $run = mysqli_query($con,$sql);
                         if(mysqli_num_rows($run)>0){
                          foreach($run as $account)
                          {
                          
                          echo "<tr><td>".$account['p_id']."</td>";
                        echo "<td >".$account['name']."</td>";
                        echo "<td>".$account['quantity']."</td>";
                        echo "<td>".$account['price']."</td>"; 
                        echo "<td>".$account['total']."</td></tr>";
                         ?>
                       <?php
                             }
                            }
                             ?>
                      </tbody>
                    </table> 
                  <a class="btn btn-primary" href="#">Edit</a>
                  <a class="btn btn-danger" href="#">Delete</a>
                  <a href="print_bills_details.php?id=<?= $acc_id;?>" class="btn btn-warning">Print</a>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <?php
                        }  
                  
                
                ?>
          
</div>
</section>
</div>

<section class="content-header">
<div class="card">
            <div class="card-header">
              <h1>Accounts Details</h1>
            </div>
<div class="row">
<?php
$acc_id = $_GET['id'];
                
                $account_id = mysqli_real_escape_string($con,$_GET['id']);
                $query = "SELECT * FROM accountbill WHERE account_id='$acc_id'";
                $query_run = mysqli_query($con,$query);
                
                    while($row = mysqli_fetch_array($query_run)){
                      $sqli = "SELECT * FROM account WHERE id='$acc_id'";
                      $q_run = mysqli_query($con,$sqli);
                      while($r = mysqli_fetch_array($query_run)){
                      
                  ?>

            <div class="col-md-4">
             <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">ID: <?= $row['account_id'];?>-  total: <?= $row['totalamount'];?> </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                        <?php

                        echo "<h5>Total amount:".$row['totalamount']."</h5><br>";
                        echo "<h5>Paid  amount:".$row['paidamount']."</h5>";

                        ?>
                  <a class="btn btn-primary" href="#">Edit</a>
                  <a class="btn btn-danger" href="#">Delete</a>
                  <a class="btn btn-info" href="#">Print</a>
                  
             </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <?php
                      }
                    }
                
                ?>
          
</div>
</div>
</section>
     <section class="content-header">
     <div class="card">
            <div class="card-header">
              <h1>Transaction Details</h1>
            </div>

     <div class="row">
<?php
$acc_id = $_GET['id'];
                
                $account_id = mysqli_real_escape_string($con,$_GET['id']);
                $query = "SELECT * FROM accountbill WHERE account_id='$acc_id' and billtype='transaction'";
                $query_run = mysqli_query($con,$query);
                
                    while($row = mysqli_fetch_array($query_run)){
                    ?>

            <div class="col-md-4">
             <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">ID: <?= $row['id'];?>-  total: <?= $row['paidamount'];?> </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                        <?php

                        echo "<h5>Paid  amount: ".$row['paidamount']."</h5><br>";
                        echo "<h5>Description: ".$row['description']."</h5><br>";
                        echo "<h5>Payment Method: ".$row['paymenttype']."</h5><br>";
                        
                        ?>
                  <a class="btn btn-primary" href="#">Edit</a>
                  <a class="btn btn-danger" href="#">Delete</a>
                  <a class="btn btn-info" href="#">Print</a>
                  
             </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <?php
                    }
                
                ?>
     </div>          
</div>
</section>
</div>
</div>

<?php
include 'footer.php';
?>