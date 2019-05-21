<?php
session_start();
if($_SESSION['logged_in']!="Active")
      header("Location: login.php");
?>
<!DOCTYPE html>

<html lang="en" >


<head>

  <meta charset="UTF-8">

<link rel="icon" type="image/png" href="images/icons/leaf2.ico"/>   
<title>Search Record</title>

<style type="text/css">
body{
padding-top: 50px;
background: url("images/bg12.jpg"); 
background-size: cover;
 background-repeat: no-repeat;

}
    #hbz-searchbox {
        height: 45px;
        background: transparent linear-gradient(#2C2C2C, #111);
        border-width: 1px;
        border-style: solid;
        border-color: #000;
        border-radius: 4px;
        padding: 10px;
        z-index: 1;
        display: block;
        margin: 10px auto;
        min-width: 428px;
        max-width: 478px;
    }
   
    #hbz-input,
    .hbz-submit {
        box-shadow: 0 2px #000;
        font-family: 'Cabin', helvetica, arial, sans-serif !important;
        margin: 0px;
        padding: 0px;
    }
   
    #hbz-input {
        background: linear-gradient(#333, #222);
        border: 1px solid #444;
        color: #888;
        display: block;
        float: left;
        font-size: 18px;
        height: 40px;
        padding-left: 4%;
        padding-right: 4%;
        width: 60.2%;
        border-radius: 3px 0px 0px 3px;
    }
   
    #hbz-input:focus {
        animation: glow 800ms ease-out infinite alternate;
        border-color: #393;
        color: #efe;
        outline: none;
    }
   
    .hbz-submit {
        background: linear-gradient(#333, #222);
        box-sizing: content-box;
        border: 1px solid #444;
        border-left-color: #000;
        color: #fff;
        display: block;
        font-size: 16px;
        height: 40px;
        line-height: 30px;
        position: relative;
        width: 30%;
        cursor: pointer;
        border-radius: 0px 3px 3px 0px;
    }
   
    .hbz-submit:hover,
    .hbz-submit:focus {
        background: linear-gradient(#393939, #292929);
    }
   
    .hbz-submit:hover,
    .hbz-submit:focus {
        color: #5f5;
        outline: none;
    }
   
    .hbz-submit:active {
        top: 1px;
    }
   
    @keyframes glow {
        0% {
            border-color: #393;
            box-shadow: 0 2px #000, 0px 0px 5px #3DAD3D, inset 0px 0px 5px #1F391F;
        }
        100% {
            border-color: #6f6;
            box-shadow: 0 2px #000, 0px 0px 8px #6bab6b, inset 0px 0px 10px #1F391F;
</style>

</head>


<body>


<form id="hbz-searchbox" action="searchhit.php" method="POST">
    <input type="text" id="hbz-input" name="name" placeholder=" By Report Number" />
    <input type="hidden" name="max-results" value="8" />
    <input class="hbz-submit" type="submit" name="search" value="Search">
</form>


<form id="hbz-searchbox" action="searchhit.php" method="POST">
    <input type="text" id="hbz-input" name="name" placeholder="By ID" />
    <input type="hidden" name="max-results" value="8" />
    <input class="hbz-submit" type="submit" name="search" value="Search">
</form>


<form id="hbz-searchbox" action="searchhit.php" method="POST">
    <input type="text" id="hbz-input" name="name" placeholder="By Name" />
    <input type="hidden" name="max-results" value="8" />
    <input class="hbz-submit" type="submit" name="search" value="Search">
</form>


<form id="hbz-searchbox" action="searchhit.php" method="POST">
    <input type="text" id="hbz-input" name="name" placeholder="By Village" />
    <input type="hidden" name="max-results" value="8" />
    <input class="hbz-submit" type="submit" name="search" value="Search">
</form>


<form id="hbz-searchbox" action="searchhit.php" method="POST">
    <input type="text" id="hbz-input" name="name" placeholder="By Date" />
    <input type="hidden" name="max-results" value="8" />
    <input class="hbz-submit" type="submit" name="search" value="Search">
</form>


</body>

</html>
