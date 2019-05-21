 <?php
 $conn=new PDO("mysql:host=localhost;dbname=naflogin", "root", "");
 $Repno=$_POST['element_5'];
  if(isset($_POST["item_name"]))
{
	
 
 for($count = 0; $count < count($_POST["item_name"]); $count++)
 {  
  $query = "INSERT INTO tb1_order_items 
  (item_name, item_quantity, item_unit,Report_Number) 
  VALUES (:item_name, :item_quantity, :item_unit,'$Repno')";
  $statement = $conn->prepare($query);
  $statement->execute(
   array(
    
    ':item_name'  => $_POST["item_name"][$count], 
    ':item_quantity' => $_POST["item_quantity"][$count], 
    ':item_unit'  => $_POST["item_unit"][$count]
   )
  );
 }
 
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>

<?php
session_start();

if($_SESSION['logged_in']!="Active")
      header("Location: login.php");
  
 

$conn=mysqli_connect('127.0.0.1','root','');
$db = mysqli_select_db($conn,"naflogin");
if(!$conn)
{
	echo "Connection Failure";
}
if(isset($_POST['submit']))
{
$Name=$_POST['element_1'];
$Addr=$_POST['element_2'];
$Repno=$_POST['element_5'];
$Repdate=$_POST['element_17_1'];
$Repdate2=$_POST['element_17_2'];
$Repdate3=$_POST['element_17_3'];
$Labid=$_POST['element_7'];
$Sampledesc=$_POST['element_9'];
$Sampledr=$_POST['element_11'];
$Custref=$_POST['element_12'];
$Samplerec=$_POST['element_14_1'];
$Samplerec2=$_POST['element_14_2'];
$Samplerec3=$_POST['element_14_3'];
$Anastart=$_POST['element_15_1'];
$Anastart2=$_POST['element_15_2'];
$Anastart3=$_POST['element_15_3'];
$Anacomp=$_POST['element_16_1'];
$Anacomp2=$_POST['element_16_2'];
$Anacomp3=$_POST['element_16_3'];
$Sampleid=$_POST['element_19'];
$Testmtd=$_POST['element_22'];
$phoneno=$_POST['element_2Ph'];


$d=mktime(0,0,0,$Repdate,$Repdate2,$Repdate3);
$e=mktime(0,0,0,$Samplerec,$Samplerec2,$Samplerec3);
$f=mktime(0,0,0,$Anastart,$Anastart2,$Anastart3);
$g=mktime(0,0,0,$Anacomp,$Anacomp2,$Anacomp3);
$Repd=date("Y-d-M",$d);
$Samprec=date("Y-d-M",$e);
$Anast=date("Y-d-M",$f);
$Anacmp=date("Y-d-M",$g);
$sql= "INSERT INTO 4aform (Name,Address,Phone,Report_Number,Report_Date,Lab_ID,Sample_Desc,Sample_Drawn,Customer_Ref,Sample_ID,Test_Method,Sample_Received,Analysis_Started,Analysis_Completed) VALUES ('$Name','$Addr','$phoneno','$Repno','$Repd','$Labid','$Sampledesc','$Sampledr','$Custref','$Sampleid','$Testmtd','$Samprec','$Anast','$Anacmp')";

if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
}
header("url=form4a.php");
?>    