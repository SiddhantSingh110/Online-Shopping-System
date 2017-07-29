<?php
session_start();
$id=$_SESSION['eid'];
include("config.php");
$itemno=$_REQUEST['itemno'];
if($_REQUEST['send'])
  {
  $id1=$_REQUEST['id1'];	
  $pname=$_REQUEST['m1'];
  $itemno=$_REQUEST['m2'];
  $price=$_REQUEST['m3'];
  $size=$_REQUEST['sel'];
  $uname=$_REQUEST['t1'];
  $ac_no=$_REQUEST['t2'];
  $mob_no=$_REQUEST['t3'];
  $add=$_REQUEST['t4'];
  $bank=$_REQUEST['sel2'];
  $city=$_REQUEST['t6'];
  $order_no=ord.rand(100,500);
 if(mysql_query("insert into orders values('$id1','$pname','$itemno','$price','$size','$uname','$ac_no','$mob_no','$add','$bank','$city','$order_no')"))
 
    {	echo "<script>location.href='ordersent.php?order=$order_no'</script>";
	  }
	else
{

}

    }																																																																																																																																																																																																																																																																																																																																																																																		
	
if($_REQUEST['log']=='out')
{
session_destroy();
header("location:index.php");
}
else if($id=="")
{
header("location:index.php?con=12 & itemno=$itemno");
}
	
?>

<head>
<script>
function fnam()
{
  var fnam=/^[a-zA-Z]{4,15}$/;
   if(document.f1.t1.value.search(fnam)==-1)
    {
	 alert("enter correct  user name");
	 document.f1.t1.focus();
	 return false;
	 }
	} 
	 
	 
function phone()
	{
	var phn=/^[0-9]{9,14}$/;
  if(document.f1.t3.value.search(phn)==-1)
    {
	 alert("enter correct phone no");
	 document.f1.t3.focus();
	 return false;
	 }
	 }
		
	
	function add()
	{
	var add=/^[a-zA-Z0-9- ]{10,150}$/;
  if(document.f1.t4.value.search(add)==-1)
    {
	 alert("enter correct address");
	 document.f1.t4.focus();
	 return false;
	 }
	 }
	 
	 function city()
	 {
	 var city=/^[a-zA-Z]{5,30}$/;
	 if(document.f1.t6.value.search(city)==-1)
    {
	 alert("enter correct city");
	 document.f1.t6.focus();
	 return false;
	 }
	
	 }
	  
	
function vali()
{
  var nam=/^[a-zA-Z]{1,15}$/;
     	var phn=/^[0-9]{9,14}$/;
	  var add=/^[a-zA-Z0-9 ]{10,150}$/;
	  var city=/^[a-zA-Z]{5,30}$/;
	  
   if(document.f1.t1.value.search(nam)==-1)
    {
	 alert("enter correct user name");
	 document.f1.t1.focus();
	 return false;
	 }
	 	 
  
 
  else if(document.f1.t3.value.search(phn)==-1)
    {
	 alert("enter correct phone no");
	 document.f1.t3.focus();
	 return false;
	 }
	 
	
	
  else if(document.f1.t4.value.search(add)==-1)
    {
	 alert("enter correct address");
	 document.f1.t4.focus();
	 return false;
	 }
	
	 
	 
	 
	else if(document.f1.t6.value.search(city)==-1)
    {
	 alert("enter correct city");
	 document.f1.t6.focus();
	 return false;
	 }
	 
		
	 
	 else 
	{
	 return true;
	 }
	 }
	
	 
</script> 
</head>
<body>
<div>
<div><br/><center><h2><font face="Lucida Handwriting" size="+2" color="#00CCFF">Welcome 
<?php
$sel=mysql_query("select * from register where id='$id'");
  $arr=mysql_fetch_array($sel);
  echo $arr['title']."&nbsp;".$arr['fname']."&nbsp;".$arr['lname'];
?>
</font></h2></center>
<h2 align="right"><a href="?log=out"><font color="#0099FF">LogOut</font></a></h2>
</div>
<div style="width:25%;float:right">
<br><br><br><br>
<img src="usepics/7.jpg">
</div>
<center><div style="width:70%;float:right" align="center">
<center><h2><font face="Lucida Handwriting" size="+1" color="#00CCFF">Order Form</font></h2></center>
<fieldset style="background:#CC99CC;width:50%">
<br><br>
	<?php
	$sel=mysql_query("select * from items where itemno='$itemno'");
    $mat=mysql_fetch_array($sel);
	?>
<form method="post" name="f1" onSubmit="return vali()">
<table width="366" border="0" align="center">
 <tr>
    <td><div align="center"><strong><font size="+1" face="Comic Sans MS">User ID: </font></strong></div></td>
    <td><label>
    <input name="id1" type="text" id="id1" onChange="return fnam()" readonly="readonly" value="<?php echo $id;?>">

    </label></td>
  </tr>
  <tr>
    <td><div align="center"><strong><font size="+1" face="Comic Sans MS">Product Name: </font></strong></div></td>
    <td><label>
    <input name="m1" type="text" id="m1" onChange="return fnam()" readonly="readonly" value="<?php echo $mat['idisc'];?>">

    </label></td>
  </tr>
  <tr>
    <td width="164"><div align="center"><font size="+1" face="Comic Sans MS"><b> Item No:</b></font></div></td>
    <td width="192">
      
        <input name="m2" type="text" id="m2" onChange="return fnam()" readonly="readonly" value="<?php echo $mat['itemno'];?>">    </td>
  </tr>
  <tr>
    <td><div align="center"><font size="+1" face="Comic Sans MS"><strong>Price:</strong></font></div></td>
    <td><input name="m3" type="text" id="m3" onChange="return lnam()" readonly="readonly" value="Rs<?php echo $mat['price'];?>">  </td>
  </tr>
  <tr>
    <td><div align="center"><font size="+1" face="Comic Sans MS"><b>&nbsp;Size:</b> </font></div></td>
    <td><label>
      <select name="sel" id="sel">
        <option value="Small" selected>Small</option>
        <option value="Medium">Medium</option>
        <option value="Large">Large</option>
        <option value="Xtra Large">Xtra Large</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td><div align="center"><font size="+1" face="Comic Sans MS"><b>&nbsp;User Name  : </b></font></div></td>
    <td><input name="t1" type="text" id="t1" onChange="return fnam()"></td>
  </tr>
  <tr>
    <td><div align="center"><font size="+1" face="Comic Sans MS"><b>&nbsp;Account No: </b> </font></div></td>
    <td><input name="t2" type="text" id="t2" onChange="return pass()"></td>
  </tr>
  <tr> <td><div align="center"><font size="+1" face="Comic Sans MS"><b>Mobile no: </b></font></div></td>
    <td><input name="t3" type="text" id="t3" onChange="return phone()"></td>
  </tr>
  <tr>
    <td><div align="center"><font size="+1" face="Comic Sans MS"><strong>Address:</strong></font></div></td>
    <td><label>
      <textarea name="t4" id="t4" value="return add()"></textarea>
    </label></td>
  </tr>
  <tr>
    <td><div align="center"><font size="+1" face="Comic Sans MS"><strong>Bank:</strong></font></div></td>
    <td><label>
      <select name="sel2" id="sel2">
        <option value="SBBJ">SBBJ</option>
        <option value="SBI" selected>SBI</option>
        <option value="ICICI">ICICI</option>
        <option value="HDFC">HDFC</option>
        <option value="PNB">PNB</option>
        <option value="Axis Bank"> Axis Bank</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td><div align="center"><font size="+1" face="Comic Sans MS"><strong>City:</strong></font></div></td>
    <td><input name="t6" type="text" id="t6" onChange="return city()"></td>
  </tr>
  <tr>
    <td colspan="2"><label><br>
    <center>
      <input name="send" type="submit" id="send" value="Send">
    </center>
    </label></td>
    </tr>
</table>
 </form>
</fieldset>
</div>
</center>

</div>
</body>
