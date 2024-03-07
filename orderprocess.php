<?php

    session_start();
    require_once "dbconnect.php";
    $q="create table if not exists orders(
        order_id int AUTO_INCREMENT PRIMARY KEY,
        cust_id int,
        cust_name varchar(255),
        itembought varchar(255),
        itemsbought int,
        total_bill int,
        cust_note varchar(255)
    );";
    $stm=mysqli_prepare($conn,$q);
    $stm->execute();


    if($_SERVER['REQUEST_METHOD']=='POST'){
        $order_quantity=$_POST['quantity'];
        $cid=$_SESSION['cust_id'];
        $cname=$_SESSION['name'];
        $productbought=$_POST['selectproduct'];
        $note=$_POST['onote'];
        $price=$_POST['oprice'];
        
        $totalprice=$price * $order_quantity;
        

        $inq="INSERT into orders(cust_id,cust_name,itembought,itemsbought,total_bill,cust_note)values(?,?,?,?,?,?);";
        $stmt=mysqli_prepare($conn,$inq);
        $stmt->bind_param("issiis",$cid,$cname,$productbought,$order_quantity,$totalprice,$note);
        if($stmt->execute()){
            header("location:my_orders.php");
            $_SESSION['orderbool']=TRUE;
        }
        else{
            echo '<script>alert("Something went wrong please order again")</script>';
            header("location:orderpage.php");
        }

    }

?>