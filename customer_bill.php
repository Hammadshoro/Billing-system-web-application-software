<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  // echo "admin".$_SESSION['username'];
}

include 'header.php';
include 'siderbar.php';
include 'database.php';
?>

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
          <form id="customerbill">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Customer Billing</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Customer Accounts</label>
                      <select id="usernames" name="username" class="form-control select2">
                        <option>select name</option>
                        <?php

                        $s = mysqli_query($con, "select * from account where status='customer'") or die("Error");
                        while ($row =  mysqli_fetch_assoc($s)) {
                        ?>
                          <option id="<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>" class="browser custom-select">
                            <?php echo $row['name']; ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Opening Balance</label>
                      <p id="openbalance"></p>
                      <input type="hidden" id="bill_id">
                      <input type="hidden" name="accountype" id="acounttype" value="sell">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Total Amount</label>
                      <input type="number" name="totalamounts" id="totalamounts" class="form-control" placeholder="Enter total amount" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Paid Amount</label>
                      <input type="number" name="paidamount" id="paidamount" class="form-control" onkeyup="myRemain()" placeholder="Enter paid amount" required="">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Remaining Amount</label>
                      <p id="remaining"></p>
                      <input type="hidden" id="remains" name="remain">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group m-2">
                      <label>Upload Image</label>
                      <input type="file" id="images" name="files[]" class="btn btn-info" multiple>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" name="description" id="description" class="form-control" placeholder="Enter descrition" required="">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group m-4">
                      <button type="submit" name="save_account" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->

    </form>
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

<script src="footer.php"></script>
<?php
include 'footer.php';
?>