<?php include "inc-files/before_content.code"; ?>
<div id="content">
	<?php
if ((!isset($_SESSION["username"])) || ($_SESSION["usertype"]!=2))
{
	echo "<span class='errMsg'>Нямате права...!</span>";
}
else
{
$mysql=new mysqli("localhost", "root", "", "flora-shop");
$mysql->set_charset("utf8");

$result = $mysql->query("select * from tbl_orders where id_order=".$_REQUEST['del_id']);
	$row = $result->fetch_assoc();
	
	if ($mysql->query("delete from tbl_orders where id_order=".$_REQUEST['del_id']))
if ($result) echo "Поръчката е изтрита.";

$mysql->close();
}
?>
<script>setTimeout('self.location.href="list_orders.php"',1500)</script>
</div>

<?php include "inc-files/after_content.code"; ?>