<?php
// Initialize the session
session_start();
 

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || $_SESSION['username']!='gourav'){

  echo "<script> location.href='adminlogin.php'; </script>";
  exit;
}
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




<div class="panel-group" id="accordion" style="color: red" align="center">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><div class="btn btn-primary">
        PRODUCT</div></a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in" style="color: Blue" align="left">
      <div class="panel-body">
      <h2>Product </h2>
      <a href="show_product.php" role="button" style="padding-right:0"><span class="btn  btn-success">SHOW</span></a>
      <a href="add_product.php" style="padding-right:0"><span class="btn btn-success">ADD</span></a>
      <a href="delete_product.php" style="padding-right:0"><span class="btn btn-success">DELETE</span></a>
      <a href="search_product.php" style="padding-right:0"><span class="btn btn-success">SEARCH</span></a>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><div class="btn btn-primary">
        Customer</div></a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse" style="color: Blue" align="left">
      <div class="panel-body">
<h2>Customer </h2>
          <a href="show_customer.php" role="button" style="padding-right:0"><span class="btn  btn-success">SHOW</span></a>
    
      <a href="#" style="padding-right:0"><span class="btn btn-success">ADD</span></a>
      
      <a href="delete_customer.php" style="padding-right:0"><span class="btn btn-success">DELETE</span></a>
          </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><div class="btn btn-primary">
        Employee</div></a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse" style="color: Blue" align="left">
      <div class="panel-body">
      <h2>Employee </h2>
           <a href="show_employee.php" role="button" style="padding-right:0"><span class="btn  btn-success">SHOW</span></a>
    
      <a href="add_employee.php" style="padding-right:0"><span class="btn btn-success">ADD</span></a>
      
      <a href="delete_employee.php" style="padding-right:0"><span class="btn btn-success">DELETE</span></a>
          </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><div class="btn btn-primary">
        Supplier</div></a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse" style="color: Blue" align="left">
      <div class="panel-body">
      <h2>Supplier </h2>
          <a href="show_supplier.php" role="button" style="padding-right:0"><span class="btn  btn-success">SHOW</span></a>
    
      <a href="add_supplier.php" style="padding-right:0"><span class="btn btn-success">ADD</span></a>
      
      <a href="delete_supplier.php" style="padding-right:0"><span class="btn btn-success">DELETE</span></a>
          </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><div class="btn btn-primary">
        Category</div></a>
      </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse" style="color: Blue" align="left">
      <div class="panel-body">
      <h2>Category </h2>
          <a href="show_category.php" role="button" style="padding-right:0"><span class="btn  btn-success">SHOW</span></a>
          </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6"><div class="btn btn-primary">
        Feedback</div></a>
      </h4>
    </div>
    <div id="collapse6" class="panel-collapse collapse" style="color: Blue" align="left">
      <div class="panel-body">
      <h2>Feedback </h2>
          <a href="show_feedback.php" role="button" style="padding-right:0"><span class="btn  btn-success">SHOW</span></a>
          </div>
    </div>
  </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse7"><div class="btn btn-primary">
          Transaction</div></a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse" style="color: Blue" align="left">
        <div class="panel-body">
        <h2>Transaction </h2>
           <a href="show_transaction.php" role="button" style="padding-right:0"><span class="btn  btn-success">SHOW</span></a>
    

      


        
          </div>
    </div>
  </div>
  
</div>
<a href="adminlogout.php" style="padding-left:0"><span class="btn btn-primary">Logout</span></a>




<!-- <div id="mainBody">
<h1 style="text-align: center"> ADMIN DATABASE</h1>
    <div class="container" style="margin-left:160">
    <div style="padding-left:190px">

    <h2>Product </h2>
      <a href="show_product.php" role="button" style="padding-right:0"><span class="btn  btn-success">SHOW</span></a>
      <a href="add_product.php" style="padding-right:0"><span class="btn btn-success">ADD</span></a>
      <a href="delete_product.php" style="padding-right:0"><span class="btn btn-success">DELETE</span></a>
      <a href="search_product.php" style="padding-right:0"><span class="btn btn-success">SEARCH</span></a>
        </div>


    <div style="padding-left:190px">

    <h2>Customer </h2>
    
    
      <a href="show_customer.php" role="button" style="padding-right:0"><span class="btn  btn-success">SHOW</span></a>
    
      <a href="#" style="padding-right:0"><span class="btn btn-success">ADD</span></a>
      
      <a href="delete_customer.php" style="padding-right:0"><span class="btn btn-success">DELETE</span></a>

        </div>
<div style="padding-left:190px">

    <h2>Employee </h2>
    
    
      <a href="show_employee.php" role="button" style="padding-right:0"><span class="btn  btn-success">SHOW</span></a>
    
      <a href="add_employee.php" style="padding-right:0"><span class="btn btn-success">ADD</span></a>
      
      <a href="delete_employee.php" style="padding-right:0"><span class="btn btn-success">DELETE</span></a>

        </div>
<div style="padding-left:190px">

    <h2>Supplier </h2>
    
    
      <a href="show_supplier.php" role="button" style="padding-right:0"><span class="btn  btn-success">SHOW</span></a>
    
      <a href="add_supplier.php" style="padding-right:0"><span class="btn btn-success">ADD</span></a>
      
      <a href="delete_supplier.php" style="padding-right:0"><span class="btn btn-success">DELETE</span></a>

        </div>
        <div style="padding-left:190px">

    <h2>Category </h2>
    
    
      <a href="show_category.php" role="button" style="padding-right:0"><span class="btn  btn-success">SHOW</span></a>
    

        </div>

        <div style="padding-left:190px">

    <h2>Transaction </h2>
    
    
      <a href="show_transaction.php" role="button" style="padding-right:0"><span class="btn  btn-success">SHOW</span></a>
    

        </div>


        <a href="adminlogout.php" style="padding-right:0"><span class="btn btn-primary">Logout</span></a>
                    </div>

    </div> -->

    

</div>

<div  id="footerSection">
  <div class="container">
    <div class="row">
      <div class="span3">
        <h5>ACCOUNT</h5>
        <a href="indexnew.php">YOUR ACCOUNT</a>
        <a href="indexnew.php">PERSONAL INFORMATION</a> 
        <a href="indexnew.php">ADDRESSES</a> 
       </div>
      <div class="span3">
        <h5>INFORMATION</h5>
        <a href="contact.php">CONTACT</a>  
        <a href="#">SPECIAL OFFERS</a>
        <a href="sigin.php">REGISTRATION</a>  
        
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