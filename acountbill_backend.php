<?php
include 'database.php';

if(isset($_POST['delete_transaction'])){
  $transaction_id = mysqli_real_escape_string($con,$_POST['delete_transaction']);
  $query ="DELETE FROM accountbill WHERE id= $transaction_id";
  $query_run = mysqli_query($con,$query);
  if($query_run)
  {
      $_SESSION['message'] = "Transaction Deleted succesfully";
      header("location:veiw_transaction.php");
      exit(0);
      
  }
  else {$_SESSION['message'] = "Transaction Not Deleted succesfully";
      header("location:veiw_transaction.php");
      exit(0); 
  }
  }

if(isset($_POST['update_transaction'])){
   $transaction_id = mysqli_real_escape_string($con,$_POST['id']); 
   $accounttype= mysqli_real_escape_string($con,$_POST['Acctype']);
    $accountname= mysqli_real_escape_string($con,$_POST['Accname']);
    $paidamount=mysqli_real_escape_string($con,$_POST['paidamt']);
    $description = mysqli_real_escape_string($con,$_POST['description']);
    $paymenttype= mysqli_real_escape_string($con,$_POST['paymenttype']);
    $query = "UPDATE accountbill 
    SET account_id='$accountname', paidamount='$paidamount', description='$description', paymenttype='$paymenttype'
    WHERE id='$transaction_id';";
   $query_run = mysqli_query($con,$query);
if($query_run)
{
 
    $_SESSION['message'] = "Account Updated succesfully";
    header("location:veiw_transaction.php");
     exit(0); 
}
else {
    $_SESSION['message'] = "Account Not Updated ";
    header("location:veiw_transaction.php");
    exit(0); 
} 
}



if(isset($_FILES['files']['name'])){
$num_files = count($_FILES['files']['name']);

// Loop through each file
for($i=0; $i<$num_files; $i++) {
  // Get the temporary file path
  $tmpFilePath = $_FILES['files']['tmp_name'][$i];

  // Make sure we have a filepath
  if($tmpFilePath != ""){
    // Setup our new file path
    $newFilePath = "./uploads/" . $_FILES['files']['name'][$i];

    // Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
      // Add the filename to the array of filenames
      $filenames[] = $_FILES['files']['name'][$i];
    }
  }
}

// Join the filenames array with a comma separator
$image_list = implode(',', $filenames);
}

if(isset($_POST['username'])){
 $id=$_POST['username'];
$accounttype=$_POST['accountype'];
$totalamount=$_POST['totalamounts'];
$paidamount =$_POST['paidamount'];
$remaining =$_POST['remain'];
$description=$_POST['description'];
$sql = "INSERT INTO accountbill (account_id,totalamount,paidamount,remain,image,description,billtype) VALUES('$id','$totalamount','$paidamount','$remaining','$image_list','$description','$accounttype')";
$query_run=mysqli_query($con,$sql);
if($query_run){
    echo "done";
}else{
    echo "not";
}

}