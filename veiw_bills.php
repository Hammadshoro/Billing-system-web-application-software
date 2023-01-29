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
        <form action="bill_backend.php" method="POST" enctype="multipart/form-data">  
        <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">View Bills</h3>
            </div>
           
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Invoice ID</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                  $query = "select * from bills bd left join account p on bd.account_id=p.id";
                $query_run = mysqli_query($con,$query);
                if (mysqli_num_rows($query_run) > 0) {
                  while ($Row = mysqli_fetch_assoc($query_run)) {
                  ?>
                  <tr>
                    <td><?php echo  $Row['invoice_id'];?></td>
                    <td><?php echo $Row['name'];?></td>
                    <td><?php echo $Row['date'];?></td>
                    <td><?php echo $Row['total_amount'];?></td>
                    <td><?php echo $Row['paid_amonut'];?></td>
                    <td>
                    <a href="edit_bills.php?id=<?php echo $Row['invoice_id'];?>" class="btn btn-primary">Edit</a>
                     <form action="bill_backend.php" method="POST" class="d-inline">
                      <button class="btn btn-danger" name="delete_details" value="<?=$Row['invoice_id'];?>" type="submit">Delete</button>
                      </form>
                      <a href="veiw_details.php?id=<?php echo $Row['invoice_id'];?>" class="btn btn-info">View Detail</a>
                      <a href="invoice.php?id=<?php echo $Row['invoice_id'];?>" class="btn btn-warning">Print</a>
                  </td>
                  </tr>
                  <?php
                  }
                 }
                  ?>
                  </table>
                </form>   
                </div>
              <!-- /.card-body -->

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