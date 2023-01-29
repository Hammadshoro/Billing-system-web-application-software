<?php
include 'database.php';
$invoice_id = $_GET["id"];

$b = mysqli_query($con,"select bills.* , account.* from bills join account on bills.account_id = account.id where bills.invoice_id='$invoice_id'");
$resy= mysqli_fetch_assoc($b);
$bill_id=$resy['invoice_id'];
$customer_name  = $resy['name'];
$date= $resy['date'];
$subtotal=$resy['total_amount'];
$paidtotal=$resy['paid_amonut'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>    
    <title>Invoice</title>
</head>
<body>
    <table width="100%" align="right">
        <tr>
        <td>
            <div align="center" style="font-size: 1.7em; font-family: calibri;">
                 <b>Book shop</b>
               <div >
          Address:Unit:7 Latifabad Hyderabad
               </div>  
            </div><br>
         <table width="100%">
        <tr>
            <td>Date <?php echo $date;?></td>
            <tr><td>Invoice ID:<?php echo $bill_id;?></td>
        </tr>
         <tr>
            <td>Customer Name: <?php echo  $customer_name;?></td>
        </tr>
        </table>
        <br>
       
    <table id="" style="margin-top:20px;"  class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>SNO:</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              </tr>
            </thead>
            <tbody>
            <?php
       
    

$query ="SELECT billsdetails.*, bills.*, product.* FROM billsdetails JOIN bills ON billsdetails.bill_id = bills.invoice_id JOIN product ON billsdetails.p_id = product.id where bills.invoice_id='$invoice_id' ";

$p_name="";
      $query_run = mysqli_query($con,$query);
     if(mysqli_num_rows($query_run)>0){
        $count=1;
    
        foreach($query_run as $Row)
      {
     $pid = $Row['p_id'];
        $q = mysqli_query($con,"select name from product where id='$pid'");
        $res= mysqli_fetch_assoc($q);
        $p_name  = $res['name']; 
      ?>

                <tr>
                    <td><?php echo  $count;?></td>
                    <td><?php echo  $p_name;?></td>
                    <td><?php echo  $Row['price'];?></td>
                    <td><?php echo  $Row['quantity'];?></td>
                    <td><?php echo  $Row['total'];?></td>
                </tr>
                <?php
             $count++;  
            }
              
                }
              else{
                  echo"<h5>No Records Founds</h5>";
              }
              ?>
            </tbody>
            <tbody>
                  <tfoot>
                  <tr>
                            <th colspan="4">Total Amount</th>
                            <td><?php echo  $subtotal;?></td>
                            </tr>
                            <tr>
                            <th colspan="4">Paid Amount</th>
                            <td><?php echo  $paidtotal;?></td>
                            </tr>  
                </tfoot>
    </table>
    <script src =  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    
    <script src =  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    

</body>
</html>