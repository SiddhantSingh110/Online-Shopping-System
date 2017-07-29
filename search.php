<?php

include("config.php");
$se=$_REQUEST['se'];

$sel=mysql_query("SELECT * FROM items WHERE idisc LIKE '%$se%'");
	    while($arr=mysql_fetch_array($sel))
         {

		 $a=$arr['itemno'];
		
		  echo"<form method='post'><br><br><center><table width='450' border='1' cellspacing='0' cellpadding='0'>
  <tr>
  <br>
    <td  rowspan='4'><img src='itempics/$a.jpg' width=200 height=200></td>
    <td ><br><b>&nbsp;Item No:</b>". $arr['itemno']."
<br><br> <b>&nbsp;Product:</b>". $arr['idisc']."
<br><br><b>&nbsp;Price:</b>".$arr['price']."
<br><br><b>&nbsp;Details:</b>".$arr['info']."
 <br><br><br><br><a href='order.php? itemno=$a'><img src='images/MetalPlakDa5new.gif' width='70' height='20'/></a>
      <a href='index.php?con=14 & itemno=$a'><img src='images/view7.jpg' width='70' height='20'/></a>
 </td>

  </tr>
</table></center></form>";
		  }
		
		   ?>
