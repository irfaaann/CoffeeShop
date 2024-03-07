<?php
    include('dbconnect.php');
    echo '<script>alert("Logged In Successfully")</script>';
    session_start();
    //$temp=$_SESSION['uname'];
    if(!isset($_SESSION['uname']))
    {
        header('location:index.php');
    }

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

    

</head>
<body>
   
<!-- header section starts     -->

<header class="header fixed-top">

   <div class="container">

      <div class="row align-items-center">

         <a href="index.php" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>

         <nav class="nav">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#gallery">gallery</a>
            <a href="#reviews">reviews</a>
           
            <a href="#blogs">blogs</a>
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

<!-- login form starts -->

<div class="login-form">

   <form action="get_login.php" method="post">
      <div id="close-login-form" class="fas fa-times"></div>
      <a href="#" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>
      <h3>let's start a new great day</h3>
      <input type="text" placeholder="enter your username" name="uname" id="username" class="box">
      <input type="password" placeholder="enter your password" name="passkey" id="password" class="box">
      <div class="flex">
         <input type="checkbox" name="" id="remember-me">
         <label for="remember-me">remember me</label>
         <a href="#">forgot password?</a>
      </div>
      <input type="submit" value="login now" class="link-btn">
   </form>

</div>

<!-- login form ends -->

<!--Registraion form starts-->

<div class="reg-form">

   <form action="registration.php" method="post">
      <div id="close-reg-form" class="fas fa-times"></div>
      <a href="#" class="logo mr-auto"> <i class="fas fa-mug-hot"></i> coffee </a>
      <input type="text" placeholder="enter your name" name="name" id="name"  class="box">
      <input type="text" placeholder="enter your username" name="uname" id="uname" class="box">
      <input type="password" placeholder="enter your password" name="passkey" id="passkey" class="box">
      <input type="email" placeholder="enter your email" name="email" id="email" class="box">
      <input type="tel" placeholder="enter your phone" name="phone" id="phone" class="box">
      <input type="text" placeholder="enter your address" name="address" id="Address" class="box">
      <input type="submit" value="register" class="link-btn">
   </form>

</div>

<!--Registration form ends-->

<!-- header section ends    -->

<!-- home section starts  -->

<section class="home" id="home">

   <div class="container">

      <div class="row align-items-center text-center text-md-left min-vh-100">
         <div class="col-md-6">
            <span>coffee house</span>
            <h3>start your day with our coffee</h3>
            <a href="#" class="link-btn">get started</a>
         </div>
      </div>

   </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="container">

      <div class="row align-items-center">
         <div class="col-md-6">
            <img src="images/abt-img.jpg" class="w-100" alt="">
         </div>
         <div class="col-md-6">
            <span>why choose us?</span>
            <h3 class="title">the best coffee maker in the town</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis dolorem laborum itaque. Perspiciatis in veniam illum deserunt, quos animi maiores nisi officiis amet accusantium soluta a, excepturi vero obcaecati nobis.</p>
            <a href="#" class="link-btn">read more</a>
            <div class="icons-container">
               <div class="icons">
                  <i class="fas fa-coffee"></i>
                  <h3>best coffee</h3>
               </div>
               <div class="icons">
                  <i class="fas fa-shipping-fast"></i>
                  <h3>free delivery</h3>
               </div>
               <div class="icons">
                  <i class="fas fa-headset"></i>
                  <h3>24/7 service</h3>
               </div>
            </div>
         </div>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- menu section starts  -->

<section class="menu" id="menu">

   <h1 class="heading"> our menu </h1>

   <div class="container box-container">
    <?php

        $get_products="SELECT * FROM product;";
        $run_products=mysqli_query($conn,$get_products);
         
        while($row = mysqli_fetch_array($run_products)){
        echo "<div class='box'>
         <img src='images/".$row['image_url']."' alt=''>
         <h3>". $row['pname']. "</h3>
         <p>".$row['pdesc']."</p>
         <p>Price: &#x20B9;".$row['price']."</p>
         <a href='#' class='link-btn'>read more</a>
      </div>";
        }
    ?>

   </div>

</section>

<!-- menu section ends -->

<!-- gallery section starts  -->

<section class="gallery" id="gallery">

   <h1 class="heading"> our gallery </h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/g-img-1.jpg" alt="">
         <div class="content">
            <h3>morning coffee</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus, dolore?</p>
            <a href="#" class="link-btn">read more</a>
         </div>
      </div>

      <div class="box">
         <img src="images/g-img-2.jpg" alt="">
         <div class="content">
            <h3>morning coffee</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus, dolore?</p>
            <a href="#" class="link-btn">read more</a>
         </div>
      </div>

      <div class="box">
         <img src="images/g-img-3.jpg" alt="">
         <div class="content">
            <h3>morning coffee</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus, dolore?</p>
            <a href="#" class="link-btn">read more</a>
         </div>
      </div>

      <div class="box">
         <img src="images/g-img-4.jpg" alt="">
         <div class="content">
            <h3>morning coffee</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus, dolore?</p>
            <a href="#" class="link-btn">read more</a>
         </div>
      </div>

      <div class="box">
         <img src="images/g-img-5.jpg" alt="">
         <div class="content">
            <h3>morning coffee</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus, dolore?</p>
            <a href="#" class="link-btn">read more</a>
         </div>
      </div>

      <div class="box">
         <img src="images/g-img-6.jpg" alt="">
         <div class="content">
            <h3>morning coffee</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus, dolore?</p>
            <a href="#" class="link-btn">read more</a>
         </div>
      </div>

   </div>

</section>

<!-- gallery section ends -->

<!-- reviews section starts  -->

<section class="reviews" id="reviews">

   <h1 class="heading">customers reviews</h1>

   <div class="box-container container">

      <div class="box">
         <img src="images/p-1.jpg" alt="">
         <h3>Sheldon Cooper</h3>
         <p>The quality of thick Cold Coffee is very very good. I will suggest you if you are a cold coffee lover then don't waste time to visit this amazing place at singhad road kaugali.
            is a small and good place which is popular among students.The cold coffee served here is of very good quality and has awesome taste.They also served snacks as well here are also good.This place offers very good quality food items and beverages .
            Highly recommend
            Thick cold coffee
            And paneer Tikka sandwiche</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
      </div>

      <div class="box">
         <img src="images/p-2.jpg" alt="">
         <h3>Monica Bing</h3>
         <p>Small and compact cafe with chairs available with good music and colorful interior.
Reasonable for the quality and quantity served.
A wonderful place to enjoy coffee and sandwiches with friends and family.
The thick coffee available here is very tasty
Must visit this place.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
      </div>

      <div class="box">
         <img src="images/p-3.jpg" alt="">
         <h3>Rachel Geller</h3>
         <p>Shop visited is very excellent and the product which we have ordered is delicious 😋  and the staff is friendly and we will be visiting again and again. The experience is very nice.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
      </div>

   </div>

</section>
<!-- reviews section ends -->

<!-- blogs section starts  -->

<section class="blogs" id="blogs">

   <h1 class="heading"> our daily posts </h1>

   <div class="box-container container">

      <div class="box">
         <div class="image">
            <img src="images/g-img-1.jpg" alt="">
         </div>
         <div class="content">
            <h3>blog title goes here.</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, illum?</p>
            <a href="#" class="link-btn">read more</a>
         </div>
         <div class="icons">
            <span> <i class="fas fa-calendar"></i> 21st may, 2022 </span>
            <span> <i class="fas fa-user"></i> by admin </span>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/g-img-2.jpg" alt="">
         </div>
         <div class="content">
            <h3>blog title goes here.</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, illum?</p>
            <a href="#" class="link-btn">read more</a>
         </div>
         <div class="icons">
            <span> <i class="fas fa-calendar"></i> 21st may, 2022 </span>
            <span> <i class="fas fa-user"></i> by admin </span>
         </div>
      </div>

      <div class="box">
         <div class="image">
            <img src="images/g-img-3.jpg" alt="">
         </div>
         <div class="content">
            <h3>blog title goes here.</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, illum?</p>
            <a href="#" class="link-btn">read more</a>
         </div>
         <div class="icons">
            <span> <i class="fas fa-calendar"></i> 21st may, 2022 </span>
            <span> <i class="fas fa-user"></i> by admin </span>
         </div>
      </div>

   </div>

</section>

<!-- blogs section ends -->

<!-- footer section starts  -->

<section class="footer container">

   <a href="#" class="logo"> <i class="fas fa-mug-hot"></i> coffee </a>

   <p class="credit"> created by <span>Uzair</span> | all rights reserved! </p>

   
   
</section>

<!-- footer section ends -->







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


function gotowhatsapp() {
    
   var name = document.getElementById("qname").value;
   var phone = document.getElementById("qphone").value;
   var email = document.getElementById("qemail").value;
   var service = document.getElementById("qmessage").value;

   var url = "https://wa.me/918087253635?text=" 
   + "Name: " + name + "%0a"
   + "Phone: " + phone + "%0a"
   + "Email: " + email  + "%0a"
   + "Message: " + service; 

   window.open(url, '_blank').focus();
}

</script>


</body>
</html>