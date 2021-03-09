<?php include "inc-files/before_content.code"; ?>
<div id="content">

<?php
if ((!isset($_SESSION["username"])) || ($_SESSION["usertype"]!=2))
{
	echo "<span class='errMsg'>Нямате права...!</span>";
}
else 
{ 
	$number=$_POST["number"];
	$updatenumber_id=$_POST["updatenumber_id"];

	if (empty($number) )
	{
		echo "<span class='errMsg'>Непълни данни!</span><br>";
		echo "<a href='javascript:history.back()' title='Връщане към предходната страница'>Обратно към списъка</a>";
	}

	else
	{
		$mysql=new mysqli("localhost", "root", "", "flora-shop");
		$mysql->set_charset("utf8"); 
		$result = $mysql->query("select * from tbl_clothes where id_cloth=".$_REQUEST['updatenumber_id']);
		$row = $result->fetch_assoc();
  		if ($row=$result->fetch_assoc()) 
       {
       	if ($result) $oldnumber=$row["number"];
       	else die("Грешка в БД!");
	   }
	$oldnumber=$row["number"];
	if ($oldnumber > $number)
		{
			echo "<span class='errMsg'>Некоректни данни!</span><br>";
			echo "<a href='javascript:history.back()' title='Връщане към предходната страница'>Обратно към списъка</a>";
			
		}
		else
		{
		$mysql=new mysqli("localhost", "root", "", "flora-shop");
		$mysql->set_charset("utf8"); 
 			$result= $mysql->query("update tbl_clothes set number=$number where id_cloth=".$_REQUEST['updatenumber_id']);
			if ($result)
			echo "Данните за дрехата са обновени...<br>";
		
		$mysql->close();
		}
	}
}
?>
</div>
<?php include "inc-files/after_content.code"; ?>