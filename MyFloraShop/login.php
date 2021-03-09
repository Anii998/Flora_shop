<?php include "inc-files/before_content.code"; ?>
 <div id="content">
 	<?php
 	$mysql=new mysqli("localhost", "root", "", "flora-shop");
	$mysql->set_charset("utf8");
	$result = $mysql->query("select * from tbl_users where username='". addslashes($_POST["username"]) . "' and passwd='" . addslashes($_POST["passwd"]) . "'");
	$mysql->close();
	if ($row = $result->fetch_assoc())
	{
		$_SESSION["username"]=$row["username"];
		$_SESSION["usertype"]=$row["usertype"];
		$_SESSION["personname"]=htmlspecialchars($row["personname"]);
		header("Location: .");
		exit;
	}
	else echo "<span class='errMsg'>Невалидно потребителско име или грешна парола!</span>";
	?>
 </div>
<?php include "inc-files/after_content.code"; ?>