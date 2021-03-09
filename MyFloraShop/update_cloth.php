<?php include "inc-files/before_content.code"; ?>
 <div id="content">
<?php
if ((!isset($_SESSION["username"])) || ($_SESSION["usertype"]!=1))
{
	echo "<span class='errMsg'>Нямате права...!</span>";
}
else
{
	$errMsg="";
	
	if ($errMsg) 
	{
		echo "<span class='errMsg'>".$errMsg."</span><br>";
		echo "<a href='edit_cloth.php?edit_id=".$_POST["id_cloth"]."'> Корекция на данните</a>";
	}
	else
	{
	 $mysql=new mysqli("localhost", "root", "", "flora-shop");
		$mysql->set_charset("utf8"); 
		$str_query="update tbl_clothes set size=' ".addslashes($_POST["size"])." ',  price=".$_POST["price"].", moreinfo='".addslashes($_POST["moreinfo"])."' where id_cloth=".$_POST["id_cloth"];
		if ($mysql->query($str_query))
			echo "Данните са обновени...<br>";
		$mysql->close();
	}
}
?>
 </div>
<?php include "inc-files/after_content.code"; ?>