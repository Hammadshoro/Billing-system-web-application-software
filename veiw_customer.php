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
          <h1>Customer Details</h1>
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
              
              </div>
             <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Account Name</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Remaining</th>
                    <th>Images</th>
                    <th>Description</th>
                    <th>Bill Type</th>    
                </tr>
                  </thead>
                  <tbody>
                  <?php
                  $query = "SELECT accountbill.* , account.name as account_name from accountbill join account on accountbill.account_id=account.id where billtype='sell' ";
                  $query_run = mysqli_query($con,$query);
                 if(mysqli_num_rows($query_run)>0){
                  foreach($query_run as $account)
                  {
                  ?>
                  <tr>
                   <td><?= $account['id'];?></td>
                      <td><?= $account['account_name'];?></td>
                      <td><?= $account['totalamount'];?></td>
                      <td><?= $account['paidamount'];?></td>
                      <td><?= $account['remain'];?></td>
                      <td><?= $account['image'];?></td>
                      <td><?= $account['description'];?></td>
                      <td><?= $account['billtype'];?></td>
                     
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