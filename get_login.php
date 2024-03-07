<?php
        //session_destroy();
        session_start();
        require_once "dbconnect.php";
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $login_id=$_POST['uname'];
            $login_password=$_POST['passkey'];
            if(!empty($login_id)||!empty($login_password))
            {

                $query="SELECT * FROM user where username='$login_id' and BINARY password='$login_password';";
                //$stmt=$conn->prepare($query);
                $stmt=mysqli_query($conn,$query);
                $num=mysqli_num_rows($stmt);
                
                if($num==1)
                {
                    $row = mysqli_fetch_assoc($stmt); //serverside case sensitive validation
                    if($row['username']==$login_id && $row['password']==$login_password){   
                    $_SESSION['uname']=$login_id;
                    header("location:orderpage.php");
                    exit();
                }
                }
                else{
                    echo '<script>alert("INVALID USERNAME OR PASSWORD")</script>';
                    header("location:index.php");
                }

            }
            else{
                echo '<script>alert("Please enter USERNAME AND PASSWORD")</script>';
                
            }
        }
        ?>