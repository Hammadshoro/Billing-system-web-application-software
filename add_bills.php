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
    <div class="col-md-6">
    <div class="card p-3">
    <div class="row">
    <div class="col-md-6">
    <label>Account Name</label>
    <select name="acc" class="form-control select2" id="account_names">
                <option value="">Select Account</option>
        <?php
      $q = mysqli_query($con,"select * from account")or die("Error");
     while($row =  mysqli_fetch_assoc($q)){
      
      ?>
    <option id="<?php echo $row['id'];?>" value="<?php echo $row['id'];?>" class="browser custom-select">
    <?php echo $row['name']; ?>
     <?php
     }
     ?>
  </select>
     
  </div>
    <div class="col-md-6">
    <label>Date</label>
    <input type="date" name="date" id="date" class="form-control"/>
    </div>
    </div>
    <div class="row mt-3">
    <div class="col-md-4">
    <label>Product</label>
    <select name="browser" class="form-control select2" id="browsers">
                <option value="">Select Product</option>
        <?php
      $q = mysqli_query($con,"select * from product")or die("Error");
     while($row =  mysqli_fetch_assoc($q)){
      
      ?>
    <option id="<?php echo $row['id'];?>" value="<?php echo $row['name'];?>" class="browser custom-select">
    <?php echo $row['name']; ?>
     <?php
     }
     ?>
  </select>  
  </div>
    <div class="col-md-3">
    <label>Qty</label>
    <input type="number" id="qty" value="1" class="form-control"/>
    </div>
    <div class="col-md-3">
    <label>Price</label>
    <p id="price"></p>
    </div>
    <input type="hidden" id="pid"/>
    <div class="col-md-2 mt-4">
    <input type="button"  value="Add" class="btn btn-danger"  onclick="addFunction()"/>
    </div>
    </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card">
    <table id="receipt_bill" class="table table-bordered">
                        <thead>
                           <tr>
                              <th>P.ID</th>
                              <th>ProductName</th>
                              <th>Quantity</th>
                              <th class="text-center">Price</th>
                              <th class="text-center">Total</th>
                              <th class="text-center">Action</th>
                             </tr>
                        </thead>
                        <tbody id="new" class="frombody" >

                        </tbody>

                        <tfoot>
                          <tr>
                            <th colspan="4">Total Amount</th>
                            <td id="subTotal">0.00</td>
                            <td></td>
                          </tr>
                          <tr>
                            <th colspan="4">Paid Amount</th>
                            <td><input type="number" name="paidamount" id="paid" class="form-control"  onkeyup="myBill()" /></td>
                            <td></td>
                          </tr>
                          <tr>
                            <th colspan="4">Remaining Amount</th>
                            <td id="remain"></td>
                            <td></td>
                          </tr>
                          <tr>
                          <th colspan="4">  
                            <button class="btn bg-info" onclick="cashFunction()">Cash</button>
                          </th>
                        </tr>
                        </tfoot>
                       
                     </table>  




  </div>
    </div>
    </div>

   <!-- <button type="submit" onclick="billfunction()" class="btn btn-info">Cash</button>-->
                          
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