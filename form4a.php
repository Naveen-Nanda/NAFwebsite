<?php
session_start();
if($_SESSION['logged_in']!="Active")
      header("Location: login.php");
?>

<?php
//index.php

$connect = new PDO("mysql:host=localhost;dbname=naflogin", "root", "");
function fill_unit_select_box($connect)
{ 
 $output = '';
 $query = "SELECT * FROM unit_tablenaf ORDER BY unit ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["unit"].'">'.$row["unit"].'</option>';
 }
 return $output;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="icon" type="image/png" href="images/icons/leaf2.ico"/> 
<title>Report Details</title>

<link rel="stylesheet" type="text/css" href="view.css" media="all">

<script type="text/javascript" src="view.js"></script>

<script type="text/javascript" src="calendar.js"></script>

<style>
 table{
        width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
    }
    table, th, td{
        border: 1px solid #cdcdcd;
    }
    table th, table td{
        padding: 10px;
        text-align: left;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><select name="item_name[]" class="form-control item_name" ><option value="" disabled selected hidden> Select Quantitative Measure</option><option value="pH" >pH</option><option value="Organic Matter" >Organic Matter</option><option value="Nitrate Nitrogen" >Nitrate Nitrogen</option><option value="Iron Available Fe" >Iron Available Fe</option><option value="Electrical Conductivity" >Electrical Conductivity</option><option value="Available Phosphorus" >Available Phosphorus</option><option value="Potassium Exchangeable K" >Potassium Exchangeable K</option><option value="Calcium Exchangeable Ca" >Calcium Exchangeable Ca</option><option value="Magnesium Exchangeable Mg" >Magnesium Exchangeable Mg</option><option value="Sodium Exchangeable Na" >Sodium Exchangeable Na</option><option value="Zinc Available Zn" >Zinc Available Zn</option><option value="Maganese Available Mn" >Maganese Available Mn</option><option value="Sulphur Available S" >Sulphur Available S</option><option value="Copper Available Cu" >Copper Available Cu</option><option value="Boron Available B" >Boron Available B</option><option value="CEC(by addition)" >CEC (by addition)</option><option value="K Saturation" >K Saturation</option><option value="Ca Saturation" >Ca Saturation</option><option value="Mg Saturation" >Mg Saturation</option><option value="Na Saturation" >Na Saturation</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td>';
  html += '<td><select name="item_unit[]" class="form-control item_unit"><option value="">Select Unit</option><option value="mS/cm" >mS/cm</option><option value="%" >%</option><option value="ppm" >ppm</option><option value="meq/100g" >meq/100g</option><?php echo fill_unit_select_box($connect); ?></select></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.item_name').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_quantity').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Quantity at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_unit').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});
</script>

</head>

<body id="main_body" >
	
	
<img id="top" src="top.png" alt="">
	
<div id="form_container">
	
		
<h1><a>ENTER DETAILS </a></h1>
		
<form id="form_18179" class="appnitro"  method="POST" action="insert4a.php">
					
<div class="form_description">
			
<h2>ENTER DETAILS </h2>
			
<p>Test Report Details </p>
		
</div>						
			
<ul >
			
					
<li class="section_break">
			
<h3>Issued to</h3>
			
<p></p>
		
</li>		
<li id="li_1" >
		
<label class="description" for="element_1">Name </label>
		
<div>
			
<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value=""/> 
		
</div> 
		
</li>		
<li id="li_2" >
		
<label class="description" for="element_2">Address </label>
		
<div>
			
<textarea id="element_2" name="element_2" class="element textarea small"></textarea> 

<label class="description" for="element_2">Phone Number </label>

<input id="element_2" name="element_2Ph" class="element text medium" type="text" maxlength="255" value=""/>		
</div> 
		
</li>		
<li class="section_break">
			
<h3></h3>
			
<p></p>
		
</li>		
<li id="li_5" >
		
<label class="description" for="element_5">Report Number </label>
		
<div>
			
<p> NAF/S/ </p><input id="element_5" name="element_5" class="element text medium" type="text" maxlength="255" value=""/> 
		
</div> 
		
</li>		
<li id="li_17" >
		
<label class="description" for="element_17">Report Date </label>
		
<span>
			
<input id="element_17_1" name="element_17_1" class="element text" size="2" maxlength="2" value="" type="text"/> 			
<label for="element_17_1">MM</label>
		
</span>
		
<span>
			
<input id="element_17_2" name="element_17_2" class="element text" size="2" maxlength="2" value="" type="text"/> 			
<label for="element_17_2">DD</label>
		
</span>
		
<span>
	 		
<input id="element_17_3" name="element_17_3" class="element text" size="4" maxlength="4" value="" type="text">
			
<label for="element_17_3">YYYY</label>
		
</span>
	
		
<span id="calendar_17">
			
<img id="cal_img_17" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		
</span>
		
<script type="text/javascript">
			
Calendar.setup({
			
inputField	 : "element_17_3",
			
baseField    : "element_17",
			
displayArea  : "calendar_17",
			
button		 : "cal_img_17",
			
ifFormat	 : "%B %e, %Y",
			
onSelect	 : selectDate
			
});
		
</script>
		 
		
</li>		
<li class="section_break">
			
<h3></h3>
			
<p></p>
		
</li>		
<li id="li_7" >
		
<label class="description" for="element_7">Lab ID </label>
		
<div>
			
<input id="element_7" name="element_7" class="element text medium" type="text" maxlength="255" value=""/> 
		
</div> 
		
</li>		
<li class="section_break">
			
<h3></h3>
			
<p></p>
		
</li>		
<li id="li_9" >
		
<label class="description" for="element_9">Sample Description </label>
		
<div>
			
<textarea id="element_9" name="element_9" class="element textarea small"></textarea> 
		
</div> 
		
</li>		
<li class="section_break">
			
<h3></h3>
			
<p></p>
		
</li>		
<li id="li_11" >
		
<label class="description" for="element_11">Sample Drawn by </label>
		
<div>
			
<input id="element_11" name="element_11" class="element text medium" type="text" maxlength="255" value=""/> 
		
</div> 
		
</li>		
<li id="li_12" >
		
<label class="description" for="element_12">Customer Reference </label>
		
<div>
			
<input id="element_12" name="element_12" class="element text medium" type="text" maxlength="255" value=""/> 
		
</div> 
		
</li>		
<li class="section_break">
			
<h3></h3>
			
<p></p>
		
</li>		
<li id="li_14" >
		
<label class="description" for="element_14">Sample Received On  </label>
		
<span>
			
<input id="element_14_1" name="element_14_1" class="element text" size="2" maxlength="2" value="" type="text"> /
			
<label for="element_14_1">MM</label>
		
</span>
		
<span>
			
<input id="element_14_2" name="element_14_2" class="element text" size="2" maxlength="2" value="" type="text"> /
			
<label for="element_14_2">DD</label>
		
</span>
		<span>
	 		
<input id="element_14_3" name="element_14_3" class="element text" size="4" maxlength="4" value="" type="text">
			
<label for="element_14_3">YYYY</label>
		
</span>
	
		
<span id="calendar_14">
			
<img id="cal_img_14" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		
</span>
		
<script type="text/javascript">
			
Calendar.setup({
			
inputField	 : "element_14_3",
			
baseField    : "element_14",
			
displayArea  : "calendar_14",
			
button		 : "cal_img_14",
			
ifFormat	 : "%B %e, %Y",
			
onSelect	 : selectDate
			
});
		
</script>
		 
		
</li>		
<li id="li_15" >
		
<label class="description" for="element_15">Analysis Started On  </label>
		
<span>
			
<input id="element_15_1" name="element_15_1" class="element text" size="2" maxlength="2" value="" type="text"> /
			
<label for="element_15_1">MM</label>
		
</span>
		<span>
			
<input id="element_15_2" name="element_15_2" class="element text" size="2" maxlength="2" value="" type="text"> /
			
<label for="element_15_2">DD</label>
		
</span>
		<span>
	 		
<input id="element_15_3" name="element_15_3" class="element text" size="4" maxlength="4" value="" type="text">
			
<label for="element_15_3">YYYY</label>
		
</span>
	
		
<span id="calendar_15">
			
<img id="cal_img_15" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		
</span>
		
<script type="text/javascript">
			
Calendar.setup({
			
inputField	 : "element_15_3",
			
baseField    : "element_15",
			
displayArea  : "calendar_15",
			
button		 : "cal_img_15",
			
ifFormat	 : "%B %e, %Y",
			
onSelect	 : selectDate
			
});
		
</script>
		 
		
</li>		
<li id="li_16" >
		
<label class="description" for="element_16">Analysis Completed On  </label>
		
<span>
			
<input id="element_16_1" name="element_16_1" class="element text" size="2" maxlength="2" value="" type="text"> /
			
<label for="element_16_1">MM</label>
		
</span>
		<span>
			
<input id="element_16_2" name="element_16_2" class="element text" size="2" maxlength="2" value="" type="text"> /
			
<label for="element_16_2">DD</label>
		
</span>
		<span>
	 		
<input id="element_16_3" name="element_16_3" class="element text" size="4" maxlength="4" value="" type="text">
			
<label for="element_16_3">YYYY</label>
		</span>
	
		
<span id="calendar_16">
			
<img id="cal_img_16" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		
</span>
		
<script type="text/javascript">
			
Calendar.setup({
			
inputField	 : "element_16_3",
			
baseField    : "element_16",
			
displayArea  : "calendar_16",
			
button		 : "cal_img_16",
			
ifFormat	 : "%B %e, %Y",
			
onSelect	 : selectDate
			
});
		
</script>
		 
		
</li>		
<li class="section_break">
			
<h3></h3>
			
<p></p>
		</li>		
<li id="li_19" >
		
<label class="description" for="element_19">Sample ID  </label>
		
<div>
			
<input id="element_19" name="element_19" class="element text medium" type="text" maxlength="255" value=""/> 
		
</div> 
		
</li>


		

		
<label class="description" for="element_22">Test Method </label>
		
<div>
			
<textarea id="element_22" name="element_22" class="element textarea small"></textarea> 
		
</div> 
		
</li>
<p>
</p>	
<li class="section_break">
			
<h3><b>Soil Details</b></h3>
			
<p></p>
</li>
<form id="insert_form" method="POST">
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Enter Parameter</th>
        <th>Enter Result</th>
       <th>Select Unit</th>
       
       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     </table>
     <div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </div>
   </form>
					


				
</ul>
		
</form>	
	
</div>
	
<img id="bottom" src="bottom.png" alt="">
	
</body>
</html>