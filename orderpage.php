<?php
    include('dbconnect.php');
    session_start();
    if(!isset($_SESSION['uname']))
    {
        header('location:index.php');
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
  <script type="text/javascript">
    function getdata()
{
   var pname = document.getElementById("sproduct").value;
    //in data section left handside is the post name and right hand side is local variable
    $.ajax({
      type: 'post',
      url: 'getdata.php',
      data: {
        sproduct:pname,
      },
      success: 
      function (response) {
        var price=document.getElementById('res');
        price.value=response;
        
      }
    });

}
  </script>
    

</head>
<body>
   
<!-- header section starts     -->

<header class="header fixed-top active">

   <div class="container">

      <div class="row align-items-center">

         <a  class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>

         <nav class="nav">
           
            <div class="dropdown">
                <a class="dropbtn"><?php echo $_SESSION['uname'];?></a>
                <div class="dropdown-content">
                    <a href="logout.php" name="logsout" >Logout</a>
                    <a href="orderpage.php">Create order</a>
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
<section class="contact">
    <h1 class="heading"> Create New Order  </h1>
    <div class="container">
    <form action="orderprocess.php" method="post">
        <h3>Order Details</h3>
            <p class="para">Customer Name:</p>
            <input name='cname' type="text" placeholder="your name" class="box" id="oname">
            
            <p class="para">Select product:</p>
            <select name="selectproduct" id="sproduct" onchange="getdata();" class="box" id="osp" required>
                <option value="none" selected disabled hidden>Select an Option</option>
                <?php

                    $get_pros='SELECT * FROM product;';
                    $run_pros=mysqli_query($conn,$get_pros);
                    $options="";
                    while($row=mysqli_fetch_array($run_pros))
                    {
                        $options=$options."<option >".$row['pname']."</option>";
                    }
                    echo $options;

                ?>
            </select>
            <p class="para">Select product:</p>
            <input name="oprice" type="text" id="res" class="box" readonly>
            <input type="number" placeholder="Quantity(Minimum 2)" class="box" min="1" name="quantity" id="oquantity" required>
            <textarea name="onote" placeholder="additional delivery note" class="box" cols="30" rows="10" id="onote" required></textarea>
            <button type="submit" value="order" class="link-btn">order</button>
        
            
        </form>
    </div>
</section>



<!-- footer section starts  -->

<section class="footer container">

   <a href="#" class="logo"> <i class="fas fa-mug-hot"></i> coffee </a>

   <p class="credit"> created by <span>Uzair</span> | all rights reserved! </p>

   
   
</section>

<!-- footer section ends -->









<!-- custom js file link  -->
<script>
        

var menu = document.querySelector('#menu-btn');
var navbar = document.querySelector('.header .nav');

menu.onclick = () =>{
   menu.classList.toggle('fa-times');
   navbar.classList.toggle('active');
}

window.onscroll = () =>{

   menu.classList.remove('fa-times');
   navbar.classList.remove('active');

   if(window.scrollY > 0){
      document.querySelector('.header').classList.add('active');
   }else{
      document.querySelector('.header').classList.remove('active');
   }
}

</script>

</body>
</html>