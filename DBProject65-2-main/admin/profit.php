<?php
include ('assets/headadmin.php');
include 'connect.php';
$sql = "Select sum(Price*OrderQty) as 'base' ,sum(cost*OrderQty)  as 'base1' 
from orderdetail o join product p on o.productid = p.productid join transactions t on o.transactionID = t.transactionID
where t.Status ='2'";
$result = mysqli_query($conn , $sql);
$row = mysqli_fetch_array($result);

?><br><br><br><br><br><br><br>
<center>
<a style="font-size:large;color:red"><?php
echo "ราคาต้นทุนทั้งหมด ".number_format($row['base1'])." บาท";
?></a> <br>

<a style="font-size:large;color:blueviolet"><?php
 echo "ขายได้ทั้งหมด ".number_format($row['base'])." บาท";
 ?></a><br>
 <a style="font-size:large;color:green"><?php
$s =  $row['base'] - $row['base1'] ;
echo "ได้กำไรทั้งหมด " .number_format($s) ." บาท" ;
 ?></a>
</center>