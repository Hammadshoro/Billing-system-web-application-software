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
          <h1>Account Details</h1>
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
    </div>
             <div class="card w-100">
             <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">Accounts</h3>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1"  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Name</th>
                    <th>Phone number</th>
                    <th>Opening Balance</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $query = "SELECT * FROM account";
                  $query_run = mysqli_query($con,$query);
                 if(mysqli_num_rows($query_run)>0){
                  foreach($query_run as $account)
                  {
                  ?>
                  <tr>
                   <td><?= $account['id'];?></td>
                      <td><?= $account['status'];?></td>
                      <td><?= $account['name'];?></td>
                      <td><?= $account['phone'];?></td>
                     <td><?= $account['balance'];?></td>
                     <td>
                           <a class="btn btn-success" href="edit_account.php?id=<?= $account['id'];?>">EDIT</a>
                          <form action="connection.php" method="POST" class="d-inline">
                          <button class="btn btn-danger" name="delete_account" value="<?= $account['id'];?>" type="submit">DELETE</button>
                          </form>
                          <a class="btn btn-info" href="details_account.php?id=<?= $account['id'];?>">Details</a>
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