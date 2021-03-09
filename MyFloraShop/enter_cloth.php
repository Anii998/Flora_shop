 <?php include "inc-files/before_content.code"; ?>
<div id="content">
 <table align="center"><tr><td>
<form action="add_cloth.php" method="post" enctype="multipart/form-data">
 <u><b>Въвеждане на данни за нова дреха:</b></u><br><br>
Вид: 
<?php
 $mysql=new mysqli("localhost", "root", "", "flora-shop");
		$mysql->set_charset("utf8"); 
$result = $mysql->query("select * from tbl_makes order by make");
echo "<select name='id_make'>";
echo "<option value='0'>Изберете...</option>";
while($row = $result->fetch_assoc())
{
echo "<option value='". $row['id_make'] . "'>" . htmlspecialchars($row['make']) . "</option>";
}
echo "</select> ";
$mysql->close();
?>
	&nbsp;&nbsp;&nbsp;Размер:
<select name="size">
	<option value="XS" />XS
	<option value="S" />S
	<option value="M" />M
	<option value="L" />L
	<option value="XL" />XL </select><br><br>
	Цена: <input type="number" min="0" name="price" value=""> лв.<br><br>
	Наличност (брой):<input type="number" min="0" name="number"><br><br>
	Друга информация:<br><textarea name="moreinfo" rows="10" cols="40">Описание...</textarea><br>
снимка: <input type="file" name="imgFile"><br><br>
<input type="submit" value="Добави">

</form>
</table>
</div>

 <?php include "inc-files/after_content.code"; ?>