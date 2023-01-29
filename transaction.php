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
      <div class="row">
        <div class="col-md-4">
          <form id="transaction">
          <label>Bill Type</label>
          <select name="Acctype" class="form-control select2" id="billtype">
                <option value="">Select Bill Type</option>
                <option value="customer">customer</option>
                <option value="purchaser">purchaser</option>
      
          </select>  
    
        </div>
      <div class="col-md-4">
        <label>Account Name</label>
          <select name="Accname" class="form-control select2" id="Accname">
                <option value="">select name</option>
                          
  </select>  
   
  </div>
   <div class="col-md-4">
<label>Opening Balance</label>
<p id="oppening_b"></p>
</div>
</div>
    <div class="row mt-3">
    <div class="col-md-6">
    <label>Paid Amount</label>
    <input type="number" name="paidamt" class="form-control">   
  </div>
  
    <div class="col-md-6">    
    <label>Payment</label>
    <input type="hidden" name="transaction" value="transaction">
    <select name="paymenttype" class="form-control select2" id="payment">
                <option value="">select payment</option>
                <option value="cash">Cash</option>
                <option value="online">Online</option>
                
  </select>    
  </div> 
    </div>           
<div class="row mt-3">
  <div class="col-md-12">
<label>Description</label>
<input type="text" name="description" id="descriptions" class="form-control">   
</div>
</div>
<div class="row mt-3">
  <div class="col-md-4">
<button type="submit" class="btn btn-dark">Cash</button>
</div>
</div>
</div>
</form>

                          
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