<?php include "inc-files/before_content.code"; ?>
 <div id="content">

<?php
$mysql=new mysqli("localhost", "root", "", "flora-shop");
$mysql->set_charset("utf8");
$sales_id=$_GET["sales_id"];


$result = $mysql->query("select * from tbl_clothes where id_cloth=".$_REQUEST['sales_id']);
		$row = $result->fetch_assoc();
echo "<form action='update_number.php' method='post'>";

if ($row=$result->fetch_assoc()) 
{
	$oldnumber=$row["number"];
}
$mysql->close();
?>
<form action="update_number.php" method="post">
	<b>Тук може да въведете само колко бройки са останали!</b><br><br>
	&nbsp;&nbsp;&nbsp;Наличност (брой): <input type="number" min="0" name="number" value="<?=$number?>"><br><br>
	<input type="hidden" name="updatenumber_id" value="<?=$sales_id?>">
	<input type="submit" value="Запис">
</form>
 </div>
<?php include "inc-files/after_content.code"; ?>