<?php include "inc-files/before_content.code"; ?>
<script type="text/javascript">
function removeOrder(num)
{
   if (confirm("Сигурни ли сте, че искате да откажете поръчката?"))
     self.location.href="delete_order.php?del_id="+num;
}
</script>
<div id="content">
	<?php 
	$mysql=new mysqli("localhost", "root", "", "flora-shop");
 	$mysql->set_charset("utf8"); 

	$strQuery="select tbl_orders.*, tbl_makes.make from tbl_orders join tbl_makes on tbl_orders.id_make=tbl_makes.id_make" ;

echo "<table align='center' width='100%'>";
if (isset($_SESSION["username"]) && $_SESSION["usertype"]==2)
{
	$result=$mysql->query($strQuery);
	echo "<tr><th>Продукт</th><th>Име</th><th>Фамилия</th><th>Адрес</th><th>Брой</th><th>Телефон</th><th>Плащане</th><th>Доставка</th><th colspan='2'>Операции</th></tr>";
	while($row = $result->fetch_assoc())
	{
	echo "<tr align='center'>";
	echo "<td>" .htmlspecialchars($row["make"])."</td>
	<td>" .$row["firstName"]. "</td>
	<td>" .$row["lastName"] . " </td>
	<td>".$row["address"]."</td>
	<td>".$row["count"]."</td>
	<td>+359".$row["phone"]."</td>
	<td>".$row["payment"]."</td>
	<td>".$row["delivery"]."</td>
	<td><a href='sales.php?sales_id=".$row['id_order']."' title='Промяна на наличните бройки'>Изпълни</a></td>
	<td><a href='javascript:removeOrder(".$row['id_order'].")'  title='Изтриване на данните'>Откажи</a></td>";
	echo "</tr>";
	}
}

echo "</table>";
$mysql->close();

	?>	
</div>
<?php include "inc-files/after_content.code"; ?>