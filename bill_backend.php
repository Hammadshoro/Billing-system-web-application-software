<?php
include "database.php";

if(isset($_GET['edit_bills'])){
    $billid = mysqli_real_escape_string($con,$_POST['delete_details']);
    $query="UPDATE bills
    JOIN account
    ON bills.account_id = account.id
    SET account.name = 'John Doe', addresses.address = '123 Main St'
    WHERE customers.id = 1;
    ";

}


if(isset($_POST['delete_details'])){
    $billid = mysqli_real_escape_string($con,$_POST['delete_details']);
    $sql ="DELETE FROM bills WHERE invoice_id= $billid";
    $query ="DELETE FROM billsdetails WHERE bill_id= $billid";
    $query_run = mysqli_query($con,$query);
    $run = mysqli_query($con,$sql);
    
    if($query_run && $sql) 
    {
        $_SESSION['message'] = "Student Deleted succesfully";
        header("location:veiw_bills.php");
        exit(0);
        
    }
    else {$_SESSION['message'] = "Student not Delelted succesfully";
        header("location:not.php");
        exit(0); 
    }
    }
$bill_id="";
if(isset($_POST['account_id'])){
    $customer_name = $_POST['account_id'];
    $total_amount  =$_POST['totalamount'];
    $date = $_POST['date'];
    $paid_amount = $_POST['paidamount'];
    $arr = $_POST['TableData'];
    $query ="INSERT INTO bills (account_id,date,total_amount,paid_amonut) VALUES ('$customer_name','$date','$total_amount','$paid_amount')";
    $result = mysqli_query($con,$query);
    $result2="";
    $query2="";
    if($result){
       $bill_id = mysqli_insert_id($con);
       $arrlen = count($arr);
         for($i=1; $i<=$arrlen; $i++){
            $Pid=$arr[$i]['P.ID'];
            $price = $arr[$i]['Price'];
            $qty = $arr[$i]['Quantity'];
            $total=$arr[$i]['Total'];
            $query2 ="INSERT INTO billsdetails (bill_id,p_id,price,quantity,total) VALUES ('$bill_id',
            '$Pid','$price','$qty','$total')";
            $result2 = mysqli_query($con,$query2) or die('error');
           }
           if($result2){
            $invoice_id = mysqli_insert_id($con);
             echo "done";
        }else{
            echo $query2;
        }
        
        }
}
    
    if(isset($_POST['status'])){
        // $query="select"
        $status= $_POST['status'];
     $query="SELECT * FROM account WHERE status='$status'";
     $result2 = mysqli_query($con,$query) or die('error');
     $output="<option>select name</option>";
     while($row =  mysqli_fetch_assoc($result2)){
        $output.="<option value=".$row['id'].">".$row['name']."</option>";

     }
     echo $output;
    }   

     
    if(isset($_POST['id'])){
        // $query="select"
        $id= $_POST['id'];
     $query="SELECT * FROM account WHERE id='$id'";
     $result2 = mysqli_query($con,$query) or die('error');
     
     while($row =  mysqli_fetch_assoc($result2)){
        echo $row['balance'];
     }
        //  echo $output;
    }   
if(isset($_POST['Accname'])){
   
 $accounttype=['Acctype'];
$id=$_POST['Accname'];
$paidamount =$_POST['paidamt'];
$description=$_POST['description'];
$bill_type=['transaction'];
$bill_type=implode(" ",$bill_type);
$payment =$_POST['paymenttype'];
$sql = "INSERT INTO accountbill (account_id,paidamount,description,billtype,paymenttype) VALUES('$id','$paidamount','$description','$bill_type','
$payment')";
$query_run=mysqli_query($con,$sql);
if($query_run){
    echo "done";
}else{
    echo "not";
}  
    // print_r($_POST);
    // // $sql = "INSERT INTO accountbill (account_id,totalamount,paidamount,remain,image,description,billtype) VALUES('$id','$totalamount','$paidamount','$remaining','$image_list','$description','$accounttype')";
    // $query_run=mysqli_query($con,$sql);
    // if($query_run){
    //     echo "done";
    // }else{
    //     echo "not";
    // }
}


?>