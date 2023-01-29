<?php
include 'database.php';
$account_id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Invoice</title>
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-12 text-center py-4 my-4" style="border: 3px solid black;">
    <?PHP
    $query="select name from account where id=".$_GET['id']."";
    $res=mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($res)){
    ?>
    <h2><?=$row['name']?></h2>

    
    <?php }?>
    </div>
</div>
<div class="row">

<div class="col">
<table class="table" style="border: 1px solid black;">
  <thead>
    <tr>
      <th scope="col">Invoice</th>
      <th scope="col">Bill Type</th>
      <th scope="col">Total Amount</th>
      <th scope="col">Paid Amount</th>
      <th scope="col">Remaining Amount</th>
      <th>Date</th>
    </tr>
  </thead>
 
  <tbody>
<!-- loo start -->
<?php
$total=0;
$remainging=0;
$paid=0;
if(!isset($_GET['id']) || $_GET['id']==""){
header('location:index.php');
}
$query="select *from accountbill ab right join bills b on ab.account_id=b.account_id where b.account_id=".$_GET['id']." group by ab.id";

$res=mysqli_query($con,$query);
if(mysqli_num_rows($res)){
while($row=mysqli_fetch_assoc($res)){
    $total+=$row['totalamount'];
    $remainging+=$row['remain'];
    $paid+=$row['paidamount'];
?>

    <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['billtype']?></td>
        <td><?=$row['totalamount']?></td>
        <td><?=$row['paidamount']?></td>
        <td><?=$row['remain']?></td>
        <td><?=$row['date']?></td>
    </tr>   
    <?php
}
}
    ?>

  <!-- lood end -->
  </tbody>

    <!-- jquery -->
 
</table>

<table class="table" style="border:1px solid black ;">
<tbody></tbody>
<tfoot class="mt-5" style="margin-top: 10px;">
    <tr >
        <th colspan="2">Total</th>
        <td><?=$total?></td>
        <th>Paid Amount</th>
        <td><?=$paid?></td>
        <th>Remaining</th>
        <td><?=$remainging?></td>
    </tr>
  </tfoot>
  </table>
</div>
</div>
</div>
      
    <script src =  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    
    <script src =  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>    

</body>
</html>