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
	if ($_POST["id_make"]==0) $errMsg .="Не е избран вид!<br>";
	if (empty($_POST["price"]))

		$errMsg .="Не е въведена цена!<br>";
	else
		if (!is_numeric($_POST["price"])) $errMsg .="Некоректно въведена цена!<br>";
	
	if ($errMsg) 
	{
		echo "<span class='errMsg'>".$errMsg."</span><br>";
		echo "<a href='enter_cloth.php'>Ново въвеждане</a>";
	}
	else
	{
	 	$mysql=new mysqli("localhost", "root", "", "flora-shop");
		$mysql->set_charset("utf8"); 

		$str_query="insert into tbl_clothes(id_make, size, price, number, moreinfo, picture) values ('".$_POST["id_make"]."','".$_POST["size"]."','".$_POST["price"]."','".$_POST["number"]."','".addslashes($_POST["moreinfo"])."', '')";
		if ($mysql->query($str_query))
			echo "Данните са записани в базата...<br>";

		$fileErr=$_FILES["imgFile"]["error"]>0;
		if ($fileErr)
		  {
			echo "<span class='errMsg'>Не е заредена снимка.</span><br>";
		  }
		else
		  {
			$allowedExt = array("gif", "jpeg", "jpg", "png");
			$arrName = explode(".", $_FILES["imgFile"]["name"]);
			$ext = end($arrName);
			if (in_array($ext, $allowedExt) && ($_FILES["imgFile"]["size"] < 280000))
			{
				$idCloth=$mysql->insert_id;
				$picName="Pic".$idCloth.".".$ext;
				move_uploaded_file($_FILES["imgFile"]["tmp_name"], "pictures/".$picName);
				$str_query="update tbl_clothes set picture='".addslashes($picName)."' where id_cloth=".$idCloth;
				if ($mysql->query($str_query))
					echo "Снимката е качена...<br>";
			}
			else
			{
				echo "<span class='errMsg'>Невалиден Image-файл!</span><br>";
			}
		  }

		$mysql->close();
	}
}	
	?>
 </div>
<?php include "inc-files/after_content.code"; ?>