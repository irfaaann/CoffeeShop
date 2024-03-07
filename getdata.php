

<?php

    include('dbconnect.php');
    if( isset( $_POST['sproduct'] ) )
    {
    
    $pro_name=$_POST['sproduct'];

    $data = " SELECT * FROM product WHERE pname='$pro_name'; ";

    $query = mysqli_query($conn,$data);

    $row = mysqli_fetch_array($query);
    
    echo $row['price'];
    
    }
?>