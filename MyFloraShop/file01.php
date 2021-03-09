<?php include "inc-files/before_content.code"; ?>
 <div id="content">

	<h1 style="text-align: center;">Поръчка на дреха</h1>
	<?php 
	$txt="";
		if (empty($_POST["payment"]))echo "Не сте избрали начин за плащане!";
		else{
		$mysql=new mysqli("localhost", "root", "", "flora-shop");
		$mysql->set_charset("utf8");
		
		$str_query="insert into tbl_orders(id_make, firstName, lastName, address, count, phone, payment, delivery) values('".$_POST['id_make']."','".$_POST["firstName"]."','".$_POST["lastName"]."','".$_POST["address"]."','".$_POST["count"]."','".$_POST["phone"]."','".$_POST["payment"]."','".$_POST["delivery"]."')";

		if ($mysql->query($str_query)) 
		echo "Успешна поръчка! <br>";
	
		$txt .="Здравейте, " . $_POST["firstName"] . " " .	$_POST["lastName"] . "!<br>";
		$txt .="Вие избрахте да получите пратката чрез " .$_POST["delivery"]. "!<br> За връзка с нас посетете страница Контакти. Ако желаете да откажете поръчката, моля уведомете ни до 24 часа! <br> <b> Поздрави!";
		echo $txt;
//	$result = $mysql->query("select tbl_clothes.*, tbl_makes.make from tbl_clothes join tbl_makes on tbl_clothes.id_make=tbl_makes.id_make where id_cloth=".$_REQUEST['id_order']);
	//	$row = $result->fetch_assoc();
		
		$mysql-> close();	
	}
	?>
<br><a href="list_clothes.php">Обратно в списъка</a> 
  </div>
<?php include "inc-files/after_content.code"; ?>