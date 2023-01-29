<?php
    session_start();
include("database.php");
if(isset($_POST['id'])){
    $fetch = "SELECT * FROM account WHERE id='".$_POST['id']."'";
$run = mysqli_query($con,$fetch);
while($row = mysqli_fetch_assoc($run))
{
      $data = $row;
}
 echo json_encode($data);

}

// if(isset($_POST['sumbit_bill'])){
//  $p_id = mysqli_real_escape_string($con,$_POST['id']);   
// $p_name=mysqli_real_escape_string($con,$_POST['name']);
// $query = "SELECT * FROM product WHERE id=$p_id";
// $$query_run =mysqli_query($con,$query);
// if($query_run){
//     echo "<h1>$p_id</h1>";
// }
//}
if(isset($_POST['delete_account'])){
    $account_id = mysqli_real_escape_string($con,$_POST['delete_account']);
    $query ="DELETE FROM account WHERE id= $account_id";
    $query_run = mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['message'] = "Account Deleted succesfully";
        header("location:veiw_account.php");
        exit(0);
        
    }
    else {$_SESSION['message'] = "Account Not Deleted succesfully";
        header("location:veiw_account.php");
        exit(0); 
    }
    }
if(isset($_POST['update_accounts'])){
    $account_id = mysqli_real_escape_string($con,$_POST['account_id']); 
    $status = mysqli_real_escape_string($con,$_POST['account_status']);
    $name= mysqli_real_escape_string($con,$_POST['user_name']);
    $address = mysqli_real_escape_string($con,$_POST['user_address']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $opening_balance = mysqli_real_escape_string($con,$_POST['balance']);
    
    $query ="UPDATE account SET status = '$status',name ='$name',address ='$address',phone='$phone',balance='$opening_balance' WHERE id='$account_id' ";
  $query_run = mysqli_query($con,$query);
if($query_run)
{
    $_SESSION['message'] = "Account Updated succesfully";
    header("location:veiw_account.php");
     exit(0); 
}
else {
    $_SESSION['message'] = "Account Not Updated ";
    header("location:veiw_account.php");
    exit(0); 
}
}

if(isset($_POST['save_account']))
{
$status = mysqli_real_escape_string($con,$_POST['usertype']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$address = mysqli_real_escape_string($con,$_POST['address']);
$phone = mysqli_real_escape_string($con,$_POST['phone']);
$opening_balance = mysqli_real_escape_string($con,$_POST['balance']);

$query ="INSERT INTO account (status,name,address,phone,balance) VALUES('$status','$name','$address','$phone',$opening_balance)";
$query_run = mysqli_query($con,$query);
if($query_run)
{$_SESSION['message'] = "Account created succesfully";
    header("location:account.php");
    exit(0); 
}
else {$_SESSION['message'] = "Account not created succesfully";
    header("location:account.php");
    exit(0); 
}
} 



if(isset($_POST['customername'])){
$customername = $_POST['customername'];
$date = $_POST['date'];
$totalamount = $_POST['totalamount'];
$paidamount = $_POST['paidamount'];
$query ="INSERT INTO bills (customer_name,date,total_amount,paid_amonut) VALUES ('$customername','$date','$totalamount','$paidamount')";
$result = mysqli_query($con,$query);

if($result){
    echo"ok";
}
}

// $tableData = stripcslashes($_POST['pTableData']);

// // Decode the JSON array
// $tableData = json_decode($tableData,TRUE);

// // now $tableData can be accessed like a PHP array
// echo $tableData[1]['P.ID'];


// if(isset($_POST['save_bill']))
// {
// $total_amount = mysqli_real_escape_string($con,$_POST['total_amt']);
// $paid_amount = mysqli_real_escape_string($con,$_POST['paid_amt']);
// $customer_name = mysqli_real_escape_string($con,$_POST['custmer_name']);
// $date = mysqli_real_escape_string($con,$_POST['date']);
// $status = mysqli_real_escape_string($con,$_POST['status']);

// $query ="INSERT INTO bills (total_amount,paid_amount,customer_name,date,status) VALUES('$total_amount','$paid_amount','$customer_name','$date','$status')";
// $query_run = mysqli_query($con,$query);
// if($query_run)
// {$_SESSION['message'] = "Product created succesfully";
//     header("location:add_bills.php");
//     exit(0); 
// }
// else {$_SESSION['message'] = "Student not created succesfully";
//     header("location:add_bills.php");
//     exit(0); 
// }
// } 

if(isset($_POST['delete_product'])){
    $product_id = mysqli_real_escape_string($con,$_POST['delete_product']);
    $query ="DELETE FROM product WHERE id= $product_id";
    $query_run = mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted succesfully";
        header("location:veiw_product.php");
        exit(0);
        
    }
    else {$_SESSION['message'] = "Student not Delelted succesfully";
        header("location:veiw_product.php");
        exit(0); 
    }
    }
               
if(isset($_POST['update_product'])){
    $product_id = mysqli_real_escape_string($con,$_POST['product_id']);
    $p_name= mysqli_real_escape_string($con,$_POST['pname']);
    $price = mysqli_real_escape_string($con,$_POST['price']);
    $status = mysqli_real_escape_string($con,$_POST['status']);
    
    $query ="UPDATE product SET name = '$p_name',price ='$price',status ='$status' WHERE id='$product_id' ";
  $query_run = mysqli_query($con,$query);
if($query_run)
{
    $_SESSION['message'] = "Product created succesfully";
    header("location:veiw_product.php");
     exit(0); 
}
else {
    $_SESSION['message'] = "Product created succesfully";
    header("location:veiw_product.php");
    exit(0); 
}
}
if(isset($_POST['save_product']))
{
$p_name = mysqli_real_escape_string($con,$_POST['pname']);
$price = mysqli_real_escape_string($con,$_POST['price']);
$status = mysqli_real_escape_string($con,$_POST['status']);

$query ="INSERT INTO product (name,price,status) VALUES('$p_name','$price','$status')";
$query_run = mysqli_query($con,$query);
if($query_run)
{$_SESSION['message'] = "Product created succesfully";
    header("location:add_product.php");
    exit(0); 
}
else {$_SESSION['message'] = "Product not created succesfully";
    header("location:add_product.php");
    exit(0); 
}
} 

if(isset($_POST['email']) && isset($_POST['password'])){


    $username = $_POST['email'];
    $password = $_POST['password'];

    $query_run = mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$password'")or die("Error");
   if(mysqli_num_rows($query_run) > 0)
   {
    $row = mysqli_fetch_assoc($query_run);
        $email_matched = $row['username'];
        $password_matched = $row['password'];

        
          $_SESSION['username'] = $email_matched;
            

        echo "<h2>You are logged in</h2>";
        
  
        header("location:index.php");
      echo "<h2>You are logged in</h2>";
   }else{
    echo "Email Password not match";
    header("location:login.php");
         }
  

}

if(isset($_POST['delete_details'])){
    $bills_id = mysqli_real_escape_string($con,$_POST['delete_details']);
    $query ="DELETE FROM bills WHERE id= $bills_id";
    $query_run = mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['message'] = "Details Deleted succesfully";
        header("location:veiw_bills.php");
        exit(0);
        
    }
    else {$_SESSION['message'] = "Details not Delelted succesfully";
        header("location:veiw_bills.php");
        exit(0); 
    }
    }

    if(isset($_POST['delete_detail'])){
        $bills_id = mysqli_real_escape_string($con,$_POST['delete_details']);
        $query ="DELETE FROM bills WHERE id= $bills_id";
        $query_run = mysqli_query($con,$query);
        if($query_run)
        {
            $_SESSION['message'] = "Details Deleted succesfully";
            header("location:index.php");
            exit(0);
            
        }
        else {$_SESSION['message'] = "Details not Delelted succesfully";
            header("location:index.php");
            exit(0); 
        }
        }
    
?>