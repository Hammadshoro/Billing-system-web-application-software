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
    <form action="bill_backend.php" method="POST" enctype="multipart/form-data">  
        <div class="card card-dark">
            <div class="card-header" align="right">
              <h3 class="card-title">Edit Bills</h3>
              <div class="btn">
                   <a class="btn btn-danger" href="veiw_bills.php">BACK</a>
                      </div> 
            </div>
        
    <?php
                if(isset($_GET['id'])){
                $bill_id = mysqli_real_escape_string($con,$_GET['id']);
                $query = "select bills.* , account.* from bills join account on bills.account_id = account.id where bills.invoice_id='$bill_id'";
                $query_run = mysqli_query($con,$query);
                
                if(mysqli_num_rows($query_run)>0)
                {
                    $bills = mysqli_fetch_array($query_run);
                    
                    ?>
   
    <div class="row">
    <div class="col-md-6">
    <div class="card p-3">       
    <div class="row">
    <div class="col-md-6">
    <label>Customer Name</label>
    <input type="text" name="customernames" value="<?= $bills['name'];?>" id="customername" class="form-control"/>
    </div>
    <div class="col-md-6">
    <label>Date</label>
    <input type="date" name="dates" value="<?= $bills['date'];?>" id="date" class="form-control"/>
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
                <?php
                        $query ="SELECT billsdetails.*, bills.*, product.* FROM billsdetails JOIN bills ON billsdetails.bill_id = bills.invoice_id JOIN product ON billsdetails.p_id = product.id where bills.invoice_id='$bill_id' ";
    
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
                    <td><?php echo  $pid;?></td>
                    <td><?php echo  $p_name;?></td>
                    <td id="price"><?php echo  $Row['price'];?></td>
                    <td id="qty"><?php echo  $Row['quantity'];?></td>
                    <td id="total"><?php echo  $Row['total'];?></td>
                   <td><button type="button" id="deleteeditbills" value="<?php $bill_id;?>" class="btn btn-danger">X</button></td>
                  </tr>
                
                <?php
             }
                }
              else{
                  echo"<h5>No Records Founds</h5>";
              }
              ?>

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
                            <button type="submit" value="" name="edit_bills" class="btn bg-info">UpdateBill</button>
                          </th>
                        </tr>
    </form>
                        <?php
                }
                else{

                    echo "<h4>No Such Id Found</h4>";
                }
                }
                ?>

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