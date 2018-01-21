
<?php
// Include config file

 session_start();
require_once 'config.php';
//$db_handle = new DBController();
 
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
   
    </div>
    </div>

<!-- Navbar -->


<div id="logoArea" class="navbar">

  <div class="navbar-inner">
    <a class="brand" href="home.html"><img src="themes/images/imag.jpeg" alt="Dhakadenterprise"/></a>
        

       <ul id="topMenu" class="nav pull-right">
     <li class=""><a href="seasonal.html">Seasonal Offers</a></li>
      <li class=""><a href="contact.html">About us</a></li>

     
      
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

<div class="row">
    <div class="txt-heading">Products</div>
    <?php
    $query = "SELECT * FROM product ORDER BY product_id ASC";

            $result = mysqli_query($link,$query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
    $product_array = $resultset;
    if (!empty($product_array)) { 
        foreach($product_array as $key=>$value){
    ?>
        <div class="product-item">
            <form method="post" action="index.php?action=add&code= <?php echo $product_array[$key]["product_id"]; ?>">
            //<img src='view.php?id=".$product_array[$key]["product_id"]."'>
            <div class="product-image">
            <?php echo "<img src='view.php?id=".$product_array[$key]["product_id"]."'>" ; ?>
            </div>
            <div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
            <div class="product-price"><?php echo "$".$product_array[$key]["unit_price"]; ?></div>
            <div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
            </form>
        </div>
    <?php
            }
    }
    ?>
</div>
    
    </div>

</div>

<div  id="footerSection">
    <div class="container">
        <div class="row">
            <div class="span3">
                <h5>ACCOUNT</h5>
                <a href="login.html">YOUR ACCOUNT</a>
                <a href="login.html">PERSONAL INFORMATION</a> 
                <a href="login.html">ADDRESSES</a> 
             </div>
            <div class="span3">
                <h5>INFORMATION</h5>
                <a href="contact.html">CONTACT</a>  
                <a href="#">SPECIAL OFFERS</a>
                <a href="register.html">REGISTRATION</a>  
                <a href="legal_notice.html">LEGAL NOTICE</a>  
                <a href="tac.html">TERMS AND CONDITIONS</a> 
                <a href="faq.html">FAQ</a>
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