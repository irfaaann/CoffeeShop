<?php
        require_once "dbconnect.php";

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $usname=$_POST['uname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $pass=$_POST['passkey'];

    if(!empty($name) || !empty($usname) || !empty($email) || !empty($phone) || !empty($address) || !empty($pass)){
        
            $select= 'SELECT email from user where email = ? Limit 1';
            $insert="INSERT INTO user(name,username,password,email,phone,address) values(?,?,?,?,?,?)";
            $stmt = $conn->prepare($select);
            $stmt->bind_param('s',$email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if($rnum==0)
            {
                $stmt->close();

                $stmt=$conn->prepare($insert);
                $stmt->bind_param("ssssss",$name,$usname,$pass,$email,$phone,$address);
                $stmt->execute();
                session_start();
                $_SESSION['submitbtn']=TRUE;
                header("location:index.php");
                                
            }
            else
            {
                echo "<script>alert('Someone already registered using this email');</script>";
                header("location:index.php");
            }

            $stmt->close();
    }

    else{
        echo '<script>alert("All fields are required")</script>';
        die();
    }
    
}


//show alert

?>