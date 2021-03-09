<?php include "inc-files/before_content.code"; ?>
 <div id="content">
	<h1 style="text-align: center;">Поръчка на дреха</h1>
	
	<form action="file01.php" method="post" enctype="multipart/form-data">	
		Вид: 
		<?php 
		$mysql=new mysqli("localhost", "root", "", "flora-shop");
		$mysql->set_charset("utf8");
		$result = $mysql->query("select tbl_clothes.*, tbl_makes.make from tbl_clothes join tbl_makes on tbl_clothes.id_make=tbl_makes.id_make 
			where id_cloth=".$_REQUEST['id_order']);
		$row = $result->fetch_assoc();
		echo "<b>".htmlspecialchars($row['make']) . "</b><br>";
		echo ($row['picture']?"<img src='pictures/".$row['picture']."'>":"Няма снимка...") "<br>";
		$idmake = $row['id_make'];
		echo "<input type='hidden' name='id_make' value=".$idmake.">";
		$mysql->close();

		?>
	Име: <input type="text" name="firstName"> <br>
	<small style="color: red">Пример: Ивана</small> <br>
	Фамилия: <input type="text" name="lastName"> <br>
	<small style="color: red">Пример: Иванова</small> <br>
	
	Адрес: <input type="text" name="address"> <br>
	<small style="color: red">гр. Габрово бул.Столетов 70</small> <br>
	Брой: <input type="number" name="count" value="1" min="1" step="1" maxlength="1"> <br>
	<small style="color: red">Пример: 5</small> <br>
	Телефон: <input type="tel" id="phone" name="phone" pattern="[0-9]{10}"required> <br>
	<small style="color: red">Пример:087123456</small> <br>

	Начин на плащане: 
	<input type="radio" name="payment" value="bank">Банков превод
	<input type="radio" name="payment" value="cache"> Наложен платеж <br>
	
	<u> <b> Доставка: </b> </u>
	<select name="delivery">
		<option value="Speedy">Спийди</option>
		<option value="Econt">Еконт</option>
		<option value="Bg-Post">БГ-Пощи</option>
	</select> <br>
	<input type="submit" value="Изпрати">
	</form>
</div>
<?php include "inc-files/after_content.code"; ?> 