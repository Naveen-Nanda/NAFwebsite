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
<title>Record-Result</title>

<style type="text/css">
#header
{
height: 200px;
width: 100%;
border: dotted black 2px;
background: linear-gradient(to right, #00cc66 35%, #0099cc 100%);
}
.top {
    position: absolute;
    left: 30px;
    top: 30px;
}
.title 
{
text-align: center;
padding-top: 5px;
}
.topright
{
   position: absolute;
    top: 20px;
    right: 50px;
}
#acc
{
width: 100%;
height: 40px;
border: solid black 2px;
}
#sec1
{
border: 2px double black;
height: 300px;
width: 100%;
}
td
{
vertical-align: top;
}
td,th
{
padding: 5px;
}
#sec2
{
border: 2px double black;
height: 900px;
width: 100%;
}
th
{
text-align: center;
}
#sign
{
width:100%;
height: 250px;
}
#footer
{
height: 80px;
width: 100%;
border: dotted black 2px;
background: linear-gradient(to right, #00cc66 35%, #0099cc 100%);
}
.note
{
display: inline;
float: left;
font: italic 14px Arial;
padding: 5px;
}
#test
{
width:100%;
border: 2px double black;
}
</style>

</head>


<body>

<?php
ob_start();

if($_SESSION['logged_in']!="Active")
      header("Location: login.php"); 
$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn,"naflogin");
//search code
//error_reporting(0);

if(isset($_REQUEST['search'])){
$name = $_POST['name'];
$id = $_POST['id'];
$date = $_POST['date'];
$village = $_POST['village'];
$rnumber = $_POST['rno'];

	$make = '<h4>No match found!</h4>';
	$sele = "SELECT * FROM 4aform WHERE Report_Number = '$rnumber' OR Lab_ID = '$id' OR Report_Date = '$date' OR Name = '$name' OR Address = '$village'";
	$result = mysqli_query($conn,$sele);
	
	if($make = mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){ 
?>
<div id="header">
<div class="top">
<img src="images/hdd.png">
</div>
<div class="title">
<h1> NATIONAL AGRO FOUNDATION</h1>
<h2> LABORATORY SERVICES DIVISION</h2>
 <h5>Anna University Taramani Campus,CSIR Road,Taramani,Chennai - 600 113, India.<br>
Phone: +91 44 2254 2589 / 2254 2803 <br>
Email : nationalagro@gmail.com     Web: www.nationalagro.org.in</h5>
</div>
<div class="topright">
<img src="images/nabl.jpg">
<p style="background: white;font-size:12px;text-align: center;">Certificate No.: T-3228</p>
</div>
</div>

<div id="acc">


<p style="text-align:center;"> Accredited as per ISO/IEC 17025:2005 standard by NABL, Dept. of Science & Technology, Govt. of India</p>
</div>
<p style="text-align: center;font-size:20px;"><b><u> TEST REPORT </u></b></p>
<div id="sec1">
<table border=1px style="width:100%;height:300px;text-align:left;font:bold 15px/30px Arial;">
<tr> 
<td rowspan=2>Issued to : <?php echo nl2br($row['Name']); ?> <br> <?php echo nl2br($row['Address']); ?> </td> 
<td> Sample Description :  <?php echo nl2br($row['Sample_Desc']); ?> </td>
</tr>
<tr> 
<td>Sample Drawn By : <?php echo nl2br($row['Sample_Drawn']); ?> <br>Customer's Ref.  : <?php echo nl2br($row['Customer_Ref']); ?> </td>
</tr>
<tr>
<td>Report Number : <?php echo nl2br($row['Report_Number']); ?> <br>Report Date    : <?php echo nl2br($row['Report_Date']); ?> </td>
<td> Sample Received On   : <?php echo nl2br($row['Sample_Received']); ?> <br>Analysis Started on    : <?php echo nl2br($row['Analysis_Started']); ?> 
<br>Analysis Completed On : <?php echo nl2br($row['Analysis_Completed']); ?> </td>
</tr>
<tr>
<td> Lab I.D : <?php echo nl2br($row['Lab_ID']); ?> </td>
<td> Sample I.D : <?php echo nl2br($row['Sample_ID']); ?> </td>
</tr>
</table>
</div>
<br>
<br> <br>
<div id="sec2">
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "naflogin");
if(isset($_REQUEST['search'])){
$name = $_POST['name'];

$output = '';
$query = "SELECT * FROM tb1_order_items WHERE Report_Number = '$name'";
$result = mysqli_query($connect, $query);
$output = '
<br />
<table border=1px style="width:100%; height:auto;font:bold 15px/30px Arial;">
 <tr>
  <th >Parameter</th>
  <th >Result</th>
  <th>Unit</th>
  
 </tr>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["item_name"].'</td>
  <td>'.$row["item_quantity"].'</td>
  <td>'.$row["item_unit"].'</td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
}
?>
</div>
<div id="test">
<p style="font:bold 15px/30px Arial;"> Test Method </p>
<p style="font:italics15px/30px Arial;"> <?php echo nl2br($row['Test_Method']);?>  </p>
</div>
<div id="sign">
<p style="font-size:12px; text-align: left; padding-left:40px;"> BDL- Below Detectable Limit</p>
<br>
<p style="font: bold 15px/30px Arial; position:absolute;right: 70px;"> Authorized Signatory </p>
<br> <br> <br><br>
<p style="font: bold 15px Arial; text-align: left; padding-left:40px;"> Asst. Scientific Officer </p>
<p style="font: bold 15px/30px Arial; position:absolute;right: 30px; text-align: center;"> S.Kalpana <br> Head, Laboratory Service Division </p>
</div> 
<br><br>
<div id="footer">
<p class="note"><b>Note:</b>
&#9670; The above report is applicable only to the sample received and tested.
&#9670; The tested sample will not be retained after three months from the date of issue of test report.
&#9670; Any request for retesting will not be considered after three months from the date of issue of test report.
&#9670; Our reports,letters, and name of National Agro Foundation are not to be used under any circumstances to advertising in general public.
&#9670; <b> The test(s) marked with # are not to accredited by NABL.</b> 
</p>
</div>
<?php
	}
}else{

echo'<h2> Search Result</h2>';
print ($make);
ob_flush();
flush();

}

mysqli_free_result($result);
mysqli_close($conn);


}
?>
<button onClick="window.print()">Print this page</button>
<button onClick="window.location='logout.php';">LOGOUT</button>
</body>


</html>