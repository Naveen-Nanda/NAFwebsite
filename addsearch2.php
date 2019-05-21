<?php
session_start();
if($_SESSION['logged_in']!= "Active")
      header("Location: login.php");
?>
<!DOCTYPE html>

<html lang="en" >


<head>
 
 <meta charset="UTF-8">
 
<link rel="icon" type="image/png" href="images/icons/leaf2.ico"/> 
<title>Record</title>
  
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      
<style>
         
body { background: url("images/bg7.jpg"); 
           background-size: cover;
           background-repeat: no-repeat;
}


.centered {

    display: block;
    margin: 200px auto;
    text-align: center;

}

/* Base Style */

a.s3d  {
  
clear: both;
  
opacity: .8;
  
  
border-radius:3px;
  
 
 box-shadow:0 4px 5px rgba(0,0,0,.3);
  
  
display: inline-block !important;
 
 font: 600 19px/36px 'Verdana', Helvetica, Clean, sans-serif;
 
 height: 40px;
 
 margin: 0 0 20px;
  
padding: 10px 10px 10px;
 
 position: relative;
  
text-decoration: none;
 
text-shadow: 0 1px 1px rgba(255,255,255,.35);
  
width: 200px;
  
  
transition: width 0.1s ease-in-out, opacity 0.1s ease-in-out, margin-left 0.1s ease-in-out, transform .3s ease-out;

}


a.s3d:hover {
  
opacity: 1;
  
width: 250px;
 
 margin-left: -10px;

}


a.lab {
 
background: #663300;
  
background: linear-gradient(to bottom, #cc9900 0%, #663300 86%); 
border-top: 1px solid #b4aa89;
  
color: white;
}


  .topright {
    position: absolute;
    top: 40px;
    right: 50px;
    color: White;
    font: 20 18px/36px 'Verdana', Helvetica, Clean, sans-serif;
 
    text-decoration: none;
} 
#header
{
height: 100px;
width: 100%;
}
</style>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"> </script>


</head>


<body>

 
<div id="header">
<img src="images/sll.png"/>
<a href="logout.php" class="topright"> Logout </a>
</div>
<div class="centered">
<a href="search2.php" class="s3d lab">
    Search Record
    
  </a>
</a>

</div> 
</body>


</html>
