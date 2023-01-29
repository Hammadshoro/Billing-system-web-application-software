<?php 

session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
    }
include 'header.php';
include 'siderbar.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6" >
            <h1 class="m-0">Dashboard</h1>
            
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php
include 'database.php';

?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
               $querySells = "SELECT count(*) as totalCustomer FROM account where status='customer'";
               $queryPurchases = "SELECT count(*) as totalPurchaser FROM account where status='purchaser'";  
               $query="select count(*) as total from account";
               $resultSells = mysqli_query($con,$querySells);
               $resultPurchases = mysqli_query($con,$queryPurchases);
               $totalSells = mysqli_fetch_assoc($resultSells);
               $totalPurchases = mysqli_fetch_assoc($resultPurchases);
             
               $row=mysqli_query($con,$query);
                  if(mysqli_num_rows($row)){
                    $total=mysqli_fetch_assoc($row);
                    echo "<h3>Accounts: ".$total['total']."</h3>";
             
                  }else{
                    echo "<h3>0</h3>";
                  }
                  echo "<h6>Customer: ".$totalSells['totalCustomer']."</h6>";
                  echo "<h6>Purchaser: ".$totalPurchases['totalPurchaser']."</h6>";
                
                         ?>
                 </div>
              <div class="icon">
                <i class="nav-icon fa  fa-user-circle"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
       <div class="inner">
        <?php
            $querySells = "SELECT count(*) as totalSells FROM accountbill where billtype='sell'";
            $queryPurchases = "SELECT count(*) as totalPurchases FROM accountbill where billtype='purchase'";
            $queryTransactions = "SELECT count(*) as totalTransactions FROM accountbill where billtype='transaction'";
            $resultSells = mysqli_query($con,$querySells);
            $resultPurchases = mysqli_query($con,$queryPurchases);
            $resultTransactions = mysqli_query($con,$queryTransactions);
            $totalSells = mysqli_fetch_assoc($resultSells);
            $totalPurchases = mysqli_fetch_assoc($resultPurchases);
            $totalTransactions = mysqli_fetch_assoc($resultTransactions);

            $query="select count(*) as total from bills";
            $row=mysqli_query($con,$query);
               if(mysqli_num_rows($row)){
                 $total=mysqli_fetch_assoc($row);
                 echo "<h3>Bills ".$total['total']."</h3>";
          
               }else{
                 echo "<h3>0</h3>";
               
               }
          
            echo "<h7>Sells: ".$totalSells['totalSells']."</h7>";
            echo "  <h8>Purchases: ".$totalPurchases['totalPurchases']."</h8>";
            echo "<h6>Transactions: ".$totalTransactions['totalTransactions']."</h6>";
        ?>
     </div>
     
     <div class="icon">
     <i class="nav-icon fas fa-shopping-cart"></i>
     </div>
     <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
  
          </div>      
            <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
                $query="select count(*) as total from accountbill where billtype='transaction'";
                $row=mysqli_query($con,$query);
                  if(mysqli_num_rows($row)){
                    $total=mysqli_fetch_assoc($row);
                    echo "<h3>".$total['total']."</h3>";
             
                  }else{
                    echo "<h3>0</h3>";
                  
                  }
                         ?>
                <p>Transaction</p>
              </div>
              <div class="icon">
                <i class="nav-icon fa  fa-credit-card"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php
                $query="select count(*) as total from product";
 
                $row=mysqli_query($con,$query);
 
 
                if(mysqli_num_rows($row)){
                    $total=mysqli_fetch_assoc($row);
                    echo "<h3>".$total['total']."</h3>";
             
                  }else{
                    echo "<h3>0</h3>";
                  
                  }
                         ?>
             
                <p>Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
       
          <div class="col-md-12">
        <form action="bill_backend.php" method="POST" enctype="multipart/form-data">  
        <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">View Bills</h3>
            </div>
           
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>invoice ID</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php

                    $date= date('y-m-d');
                    echo "<h4> Date: ".$date."</h4>";
                 $query = "select * from bills where date='$date'";
                $query_run = mysqli_query($con,$query);
                if (mysqli_num_rows($query_run) > 0) {
                  while ($Row = mysqli_fetch_assoc($query_run)) {
                  ?>
                  <tr>
                    <td><?php echo  $Row['id'];?></td>
                    <td><?php echo $Row['customer_name'];?></td>
                    <td><?php echo $Row['date'];?></td>
                    <td><?php echo $Row['total_amount'];?></td>
                    <td><?php echo $Row['paid_amonut'];?></td>
                    <td>
                    <a href="edit_bills.php?id=<?php echo $Row['id'];?>" class="btn btn-primary">Edit</a>
                      <form action="connection.php" method="POST" class="d-inline">
                      <button class="btn btn-danger" name="delete_detail" value="<?=$Row['id'];?>" type="submit">Delete</button>
                      </form>
                      <a href="veiw_details.php?id=<?php echo $Row['id'];?>" class="btn btn-info">View Detail</a>
                      <a href="invoice.php?id=<?php echo $Row['id'];?>" class="btn btn-warning">Print</a>
                  </td>
                  </tr>
                  <?php
                  }
                 }
                  ?>
                  </table>
                </form>   
                </div>         


        </div>
        <!-- /.row -->
        <!-- Main row -->
          <!-- /.content-wrapper -->
 
 
          <?php
  include 'footer.php';
  ?>  