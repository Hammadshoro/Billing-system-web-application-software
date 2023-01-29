<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
  // echo "admin".$_SESSION['username'];
  }

include 'header.php';
include 'siderbar.php';
include 'database.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    <div class="row">
    <div class="col-md-12">
    <div class="card p-3">
    <?php
                if(isset($_GET['id'])){
                $transaction_id = mysqli_real_escape_string($con,$_GET['id']);
                $query = "SELECT accountbill.* , account.name as account_name,account.status as account_status from accountbill join account on accountbill.account_id=account.id where billtype='transaction'";
                $query_run = mysqli_query($con,$query);
                
                if(mysqli_num_rows($query_run)>0)
                {
                    $account = mysqli_fetch_array($query_run);
                    
                    ?>
        
    <div class="row">
        <div class="col-md-6">
          <form method="POST" action="acountbill_backend.php">
          <label>Bill Type</label>
          <select name="Acctype" class="form-control select2" id="billtype">
                <option value=""><?= $account['account_status'];?></option>
                <option value="customer">customer</option>
                <option value="purchaser">purchaser</option>
      
          </select>  
    
        </div>
      <div class="col-md-6">
        <input type="hidden" value="<?php echo $transaction_id;?>" name="id">
        <label>Account Name</label>
          <select name="Accname" class="form-control select2" id="Accname">
                <option value="<?= $account['account_name'];?>"><?= $account['account_name'];?></option>
                          
  </select>  
   
  </div>
</div>
    <div class="row mt-3">
    <div class="col-md-6">
    <label>Paid Amount</label>
    <input type="number" value="<?= $account['paidamount'];?>" name="paidamt" class="form-control">   
  </div>
  
           <div class="col-md-6">    
               <label>Payment</label>
                <select name="paymenttype" class="form-control select2"  id="payments">
                <option value="<?= $account['paymenttype'];?>"><?= $account['paymenttype'];?></option>
                <option value="online">Online</option>
                <option value="cash">Cash</option>
             </select>   
               </div> 
    </div>           
<div class="row mt-3">
  <div class="col-md-12">
<label>Description</label>
<input type="text" name="description" value="<?= $account['description'];?>" id="descriptions" class="form-control">   
</div>
</div>
<div class="row mt-3">
  <div class="col-md-4">
<button type="submit" name="update_transaction" class="btn btn-dark">Update</button>
</div>
</div>
</div>
</form>
<?php
                }
                else{

                    echo "<h4>No Such Id Found</h4>";
                }
                }
                ?>
       
                          
  <!-- Main content -->
               <!-- /.card-header -->
               
    
              
              <!-- /.card-body -->
            
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


<?php
include "footer.php";
?>
<script src="footer.php"></script>