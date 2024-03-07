<?php
   include('dbconnect.php');
   session_start();
   if(!isset($_SESSION['uname']))
   {
      header('location:index.php');
   }

   if(isset($_SESSION['orderbool']))
   {
      echo '<script>alert("Order Placed Successfully!!!")</script>';
      unset($_SESSION['orderbool']);
   }

   $get_info="SELECT * FROM user where username='{$_SESSION['uname']}'";
   
   $result=mysqli_query($conn,$get_info);
   $row=mysqli_fetch_assoc($result);
   $_SESSION['cust_id']=$row["id"];
   $_SESSION['name']=$row["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Coffee House</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
?>

<script type="text/javascript">
   function deletedata(orderid)
   {
      //in data section left handside is the post name and right hand side is local variable
   if(confirm("Are you sure want to cancel order?")){
    $.ajax({
      type: 'post',
      url: 'cancel_order.php',
      data: {
        oid:orderid,
      },
      success: 
      function (response) {
         $("#orderTable tbody").replaceWith(response);
        
      }
    });
   }

}
  </script>
</head>
<body>
   
<!-- header section starts     -->

<header class="header fixed-top active">

   <div class="container">

      <div class="row align-items-center">

         <a href="index.php" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>

         <nav class="nav">
            
            <div class="dropdown">
                <a class="dropbtn"><?php echo $_SESSION['uname'];?></a>
                <div class="dropdown-content">
                    <a href="logout.php" name="logsout" >logout</a>
                    <a href="orderpage.php">Create Order</a>
                    <a href="my_orders.php">All orders</a>
                </div>
            </div>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
         </div>

      </div>

   </div>

</header>

<section name="fillsection" style="background-color: #512a10;">
</section>

<section>
<?php
   
   
   if($_SERVER['REQUEST_METHOD']=='POST'){
   if(isset($_POST['order'])){
      echo '<script>alert("Order placed Successfully!!")</script>';
    }}
    $q="SELECT * from orders where cust_name='{$_SESSION['name']}'";
    $stm=mysqli_query($conn,$q);


?>
<table id="orderTable" class="table para">
  <thead class="thead-light">
    <tr>
      <th scope="col" >Order ID</th>
      <th  scope="col" style="width: 15%;">Name</th>
      <th  scope="col" style="width: 10%;">Item Bought</th>
      <th  scope="col" style="width: 5%;">Items Bought</th>
      <th  scope="col" style="width: 10%;">Total Bill</th>
      <th  scope="col" style="width: 15%;">Order Date</th>
      <th scope="col" >cancel order</th>
      <th scope="col" >Print Page</th>
    </tr>
  </thead>
  <tbody id="tdata">
   <?php   
            
            
   while($rows=$stm->fetch_assoc())
   {
      $oid=$rows['order_id'];
      $cnam=$rows['cust_name'];
      $ib=$rows['itembought'];
      $isb=$rows['itemsbought'];
      $tb=$rows['total_bill'];
      $orderdate=$rows['order_date'];
      ?>
      <tr>
      <th scope="row"><?php echo  $oid;?> </th>
      <td> <?php echo  $cnam;?> </td>
      <td> <?php echo  $ib;?> </td>
      <td> <?php echo  $isb;?> </td>
      <td> <?php echo  $tb;?> </td>
      <td> <?php echo  $orderdate;?> </td>
      <td><button type="button" name='<?php echo $oid;?>' id='<?php echo $oid;?>' onclick="deletedata($(this).attr('name'));" class="btn btn-danger delete"><i class="fa fa-trash" aria-hidden="true"></button></td>
      <td><button type="button" name='<?php echo $oid;?>' onClick="document.location.href='template.php?oid=<?php echo $oid;?>'" class="btn btn-secondary print"><i class="fa fa-print" aria-hidden="true"></button></td>
      
    </tr>
      <?php
      }
   ?>
   
  </tbody>
</table>


</section>
