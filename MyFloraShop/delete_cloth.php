<?php include "inc-files/before_content.code"; ?>
<div id="content">
	<?php
if ((!isset($_SESSION["username"])) || ($_SESSION["usertype"]!=1))
{
	echo "<span class='errMsg'>Нямате права...!</span>";
}
else
{
$mysql=new mysqli("localhost", "root", "", "flora-shop");
$mysql->set_charset("utf8");

$result = $mysql->query("select * from tbl_clothes where id_cloth=".$_REQUEST['del_id']);
	$row = $result->fetch_assoc();
	if ($row['picture']) unlink("pictures/".$row['picture']);
	if ($mysql->query("delete from tbl_clothes where id_cloth=".$_REQUEST['del_id']))
if ($result) echo "Данните за дрехата са изтрити.";

$mysql->close();
}
?>
<script>setTimeout('self.location.href="list_clothes.php"',1500)</script>
</div>

<?php include "inc-files/after_content.code"; ?>