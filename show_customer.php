
<?php
// Include config file
require_once 'config.php';
 session_start();

 if(!isset($_SESSION['username']) || $_SESSION['username']!='gourav'){

  echo "<script> location.href='adminlogin.php'; </script>";
  exit;
}
// Define variables and initialize with empty values


?>







<!DOCTYPE html>
<html lang ="en">
<head>
<meta charset="utf-8">
    <title> Dhakad Electrical & Electronics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    <meta name="description" content="">
    
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>


    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
    <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css" id="enject"></style>
</head>
<body>


<script src="themes/js/jquery.js" type="text/javascript"></script>
    <script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="themes/js/google-code-prettify/prettify.js"></script>
    
    <script src="themes/js/bootshop.js"></script>
    <script src="themes/js/jquery.lightbox-0.5.js"></script>

<div id="header">
<div class="container">
    <div id="welcomeLine" class="row">
    <div class="span6" style="align:center"> </div>
    <div class="span6">
    <div class="pull-right">
         <a href="adminlogin.php"><span class="btn  btn-success">Admin</span></a></li>
        <a href="indexnew.php"><span class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i> Items in cart </span> </a> 
    </div>
    </div>
    </div>

<!-- Navbar -->


<div id="logoArea" class="navbar">

  <div class="navbar-inner">
    <a class="brand" href="home.php"><img src="themes/images/imag.jpeg" alt="Dhakadenterprise"/></a>
        <!-- <form class="form-inline navbar-search" method="post" action="#" >
        <input id="srchFld" class="srchTxt" type="text" />
          <select class="srchTxt">
            <option>Categories</option>
            <option>Multimedia </option>
            <option>Coolers and fans</option>
            <option>Extension Cords & Power strips</option>
            <option>Batteries and Chargers</option>
            <option>Switches & Dimmers </option>
            <option>Electrical Boxes, Conduit & fittings</option>
            <option>Motors and starters</option>
            <option>Wires, Conductors & Fasteners</option>
        </select> 
          <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form> -->

       <ul id="topMenu" class="nav pull-right">
     <li class=""><a href="seasonal.php">Seasonal Offers</a></li>
      <li class=""><a href="contact.php">About us</a></li>

     <li class=""><a href="delivery.php">Delivery</a></li>
     <li class="">
<?php
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
 
  echo '<a href="login.php" style="padding-right:0"><span class="btn btn-large btn-success">Log-in</span></a> </li> <li><a href="signin.php" style="padding-right:0"><span class="btn btn-large btn-success">Sign-up</span></a>' ;
}
else 
{

    echo '<a href="logout.php" role="button" style="padding-right:0"><span class="btn  btn-success">Logout</span></a></li> <li><a href="" style="padding-right:0"> <span class="btn  btn-success">'.$_SESSION['username'].'</span></a>';

    //echo '<span class="btn btn-large btn-success">'.$_SESSION['username'].'</span>';
}
?>

      
    </li>
    
      
    </ul>
  </div>
</div>
</div>
</div>
<!-- 
<div>
    <marquee><a href="#"><span style="color:red">20% off on branded offers &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> </a>
    <a href="#"><span style="color:red">15% off on SBI card &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> </a>
    <a href="#"><span style="color:red">Branded fans &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> </a>
    </marquee>
</div> -->


<div id="mainBody">
<div class="container">
<div class="span9" >
<br><br><br><br><br><br><br>
<h2>Show Users</h2>
   <?php 
   $sql = "SELECT username, name, email,city FROM cus_users_new";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo '
<table class="table table-hover table-active" style="margin-left:300px">
    <tr>
    <th>Username</th>
    <th>Name</th>
    <th>Email-ID</th>
    <th>City</th>
    <th>Cart</th>
  </tr> 
  <tr>
    <th> </th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
  </tr> 
  ';

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["username"]."</td><td>" . $row["name"]. "</td><td>". $row["email"]."</td><td>" . $row["city"]. "</td><td><a href='show_cart.php?code=". $row["username"] ."' class='btn btn-success'>Show Cart</a></td</tr>";
       // echo "<a href='show_cart.php?code=". $row["username"] ."' class='btn btn-success'>Show Cart</a>";
    }

    echo '</table>';
} else {
    echo "0 results";
}
    // Close connection
    mysqli_close($link);
    ?>

    <a href="admin_database.php" style="padding-right:0"><span class="btn btn-primary">Database</span></a>
</div>

    
    </div>

</div>

<div  id="footerSection">
    <div class="container">
        <div class="row">
            <div class="span3">
                <h5>ACCOUNT</h5>
                <a href="login.php">YOUR ACCOUNT</a>
                <a href="login.php">PERSONAL INFORMATION</a> 
                <a href="login.php">ADDRESSES</a> 
             </div>
            <div class="span3">
                <h5>INFORMATION</h5>
                <a href="contact.php">CONTACT</a>  
                <a href="#">SPECIAL OFFERS</a>
                <a href="register.php">REGISTRATION</a>  
                
             </div>
            
            <div id="socialMedia" class="span3 pull-right">
                <h5>SOCIAL MEDIA </h5>
                <a href="#"><img width="40" height="40" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
                <a href="#"><img width="40" height="40" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
             </div> 
         </div>
        
    </div><!-- Container End -->
    </div>

    
</body>
</html>