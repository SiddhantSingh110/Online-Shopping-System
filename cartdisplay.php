<body>
<center><h2><font face="Lucida Handwriting" size="+2" color="#00CCFF">Welcome 
<?php
session_start();
$id=$_SESSION['eid'];
if($_REQUEST['log']=='out')
{
session_destroy();
header("location:index.php?con=12");
}
else if($id=="")
{
header("location:index.php?con=12");
}
include("config.php");
$sel1=mysql_query("select * from register where id='$id'");
  $arrr=mysql_fetch_array($sel1);
  echo $arrr['fname']."&nbsp;".$arrr['lname']."&nbsp;".Your ."&nbsp;".Orders."&nbsp;". Are; 


?>
</font></h2></center></br></br></br><h2 align="right"><a href="?log=out"><font color="#0099FF">LogOut</font></a></h2>

<?php
session_start();
$id=$_SESSION['eid'];

include("config.php");


$sel=mysql_query("select * from orders WHERE id='$id'");
$arr=mysql_fetch_array($sel);
if($arr=="")
{
echo "</br></br></br>No Items Avaliable";
echo "</br></br></br><a href='gallery.php'>Click Here!</a> To Shop Now";
} 

while($arr)
 {
     $i=$arr['itemno'];
	
     $j=$arr['order_no'];
	echo "<center><fieldset style='width:60%'><table border='0'>
	<tr>
	<td><img src='itempics/$i.jpg' width=200 height=200></td>
	<td><h3>Product Details:</h3><b>Product:</b> ".$arr['pname']."<br>
	<b>Item No:</b> ".$arr['itemno']."<br>
	<b>Price:</b> ".$arr['price']."<br>
	<b>Size:</b> ".$arr['size']."<br>
	</td>

	<td><h3>Buyer Details:</h3><b>Buyer:</b>  ".$arr['uname']."<br>
	<b>Account No:</b> ".$arr['ac_no']."<br>
	<b>Mobile No:</b> ".$arr['mob_no']."<br>
	<b>Address:</b> ".$arr['add']."<br>
	<b>Bank:</b> ".$arr['bank']."<br>
	<b>City:</b> ".$arr['city']."<br>
	<b>Order No:</b> ".$arr['order_no']."<br></td>	
<a href='cancelorder.php? order_no=$j'><img src='cancel.jpg' width='90' height='30'/></a>
      
	</tr>
	</table>
</fieldset><br>
</center>";
}

	
	?>
