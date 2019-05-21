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
<title>NAF-Labs</title>
  
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      
<style>
         
body 
{ 
background-image: url("images/bg.png");
background-repeat: no-repeat;
background-position: center center;
background-attachment: fixed;
background-size: cover;
background-color: #464646;
}
#header
{
height: 100px;
width: 100%;
}



#container {
  margin: 70px auto;
 height: 400px; width: 400px;
 border-radius: 200px; background: rgba(76, 175, 80, 0.3); text-align: center; vertical-align: middle; horizontal-align: middle; border: 2px solid black;}


/* Base Style */

a.s3d  {
  
clear: both;
  
opacity: .8;
  
  
border-radius:3px;
  
 
box-shadow:0 4px 5px rgba(0,0,0,.3);
  
  
display: inline-block !important;
 
 font: 700 18px/36px 'Verdana', Helvetica, Clean, sans-serif;
 
 height: 35px;
 
 margin: 50px 0 0px;
  
 padding: 0 0 10px;
 position: relative;
  
text-decoration: none;
 
text-shadow: 0 1px 1px rgba(255,255,255,.35);
  
width: 140px;
  
  
transition: width 0.1s ease-in-out, opacity 0.1s ease-in-out, margin-left 0.1s ease-in-out, transform .3s ease-out;

}


a.s3d:hover {
  
opacity: 1;
  
width: 160px;
 
 margin-left: -10px;

}


a.lab {
 
 background: #58853e;
  
background: linear-gradient(to top, #082609 0%, #000000 100%); 
border-top: 1px solid #99b489;
  
color: White;
}



.topright {
    position: absolute;
    top: 20px;
    right: 50px;
    color: Black;
    font: 20 18px/36px 'Verdana', Helvetica, Clean, sans-serif;
 
    text-decoration: none;
} 

.top {
    position: absolute;
    left: 10px;
}

 </style>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"> </script>


</head>


<body>

 
<div id="header">
<div class="top">
<img src="images/hddd.png"></div>
<a href="logout.php"class="topright"> Logout </a>
</div>
 <div id="container" >
<a href="addsearch2.php" class="s3d lab">
    Soil Testing
   
  </a>
 <br> <br>
  
<a href="#" class="s3d lab">
    Water Testing    </a>
  
 <br> <br>
<a href="#" class="s3d lab">
    Organic Sample Testing    
  </a>
 
</div>

</body>


</html>
