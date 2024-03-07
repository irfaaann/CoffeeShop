
<?php
    session_start();
    require_once "dbconnect.php";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {   
        $cancel_id=$_POST['oid'];
        $q="DELETE FROM orders where order_id='$cancel_id'";
        $stm=mysqli_query($conn,$q);
        $q="SELECT * from orders where cust_name='{$_SESSION['name']}'";
        $stmt=mysqli_query($conn,$q);
    }


?>


            <?php   
            
            
            while($rows=$stmt->fetch_assoc())
            {
               $oid=$rows['order_id'];
               $cnam=$rows['cust_name'];
               $ib=$rows['itembought'];
               $isb=$rows['itemsbought'];
               $tb=$rows['total_bill'];
               $orderdate=$rows['order_date'];
               echo "
               <tbody id='tdata'>
               <tr>
               <th scope='row'>$oid</th>
               <td>$cnam</td>
               <td>$ib</td>
               <td>$isb</td>
               <td>$tb</td>
               <td>$orderdate</td>
               <td><button type='button' name='$oid' id='$oid' onclick='deletedata();' class='btn btn-danger delete'><i class='fa fa-trash' aria-hidden='true'></button></td>
               <td><button type='button' name='$oid' onClick=document.location.href='template.php?oid=$oid' class='btn btn-secondary print'><i class='fa fa-print' aria-hidden='true'></button></td>
             </tr>
             </tbody>
               ";
            }
               
            ?>