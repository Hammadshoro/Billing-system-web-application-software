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
                $account_id = mysqli_real_escape_string($con,$_GET['id']);
                $query = "SELECT * FROM account WHERE id='$account_id'";
                $query_run = mysqli_query($con,$query);
                
                if(mysqli_num_rows($query_run)>0)
                {
                    $account = mysqli_fetch_array($query_run);
                    
                    ?>
        <form action="connection.php" method="POST" enctype="multipart/form-data">  
        <div class="card card-dark">
            <div class="card-header" align="right">
              <h3 class="card-title">Edit Accounts</h3>
              <div class="btn">
                   <a class="btn btn-danger" href="veiw_account.php">BACK</a>
                      </div> 
            </div>
            
            <div class="card-body">
             <div class="row">
              <div class="col-md-4">     
              <div class="form-group">
              <input type="hidden" name="account_id" value="<?= $account['id'];?>" required="">
              <label >Account Type</label>
                 <select name="account_status" class="form-control select2">
                    <option>Select User</option>
                    <option>purchaser</option>
                    <option>customer</option> 
                </select>         
              </div>
              </div>
              <div class="col-md-4">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="user_name" value="<?= $account['name'];?>" class="form-control" id="status" placeholder="Enter name">
              </div>
              </div>
              <div class="col-md-4">
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="user_address" value="<?= $account['address'];?>" class="form-control " id="productprice" placeholder="Enter address">
              </div>
              </div>
                </div>
                <div class="row">
               <div class="col-md-4">
                <div class="form-group">
                <label>Phone Number</label>
                <input type="number" name="phone" value="<?= $account['phone'];?>" class="form-control " id="" placeholder="Enter phone numer">
              </div>
               </div>
               <div class="col-md-4">
              <div class="form-group">
                <label>Opening Balance</label>
                <input type="number" name="balance" value="<?= $account['balance'];?>" class="form-control" id="balance" placeholder="Enter balance">
              </div>
               </div>
              
                <div class="col-md-4">
                <div class="form-group m-4">
                <button type="submit" name="update_accounts" class="btn btn-dark">Submit</button>
            </div>
              </div>
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