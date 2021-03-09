<?php include "inc-files/before_content.code"; ?>
 <div id="content">
 	<?php
	$mysql=new mysqli("localhost", "root", "", "flora-shop");
	$mysql->set_charset("utf8");

	$result = $mysql->query("select tbl_clothes.*, tbl_makes.make from tbl_clothes join tbl_makes on tbl_clothes.id_make=tbl_makes.id_make where id_cloth=".$_REQUEST['edit_id']);
$row = $result->fetch_assoc();
echo "<form action='update_cloth.php' method='post'>";
echo "<input type='hidden' value='".$_REQUEST['edit_id']."' name='id_cloth'>";
echo "<table border='1' align='center'>";
echo "<tr valign='top'>";
echo "<td> вид: <b>".htmlspecialchars($row['make']) . "</b><br>
	<nobr>размер: <b><select value='".$row['size']. "' name='size'>
	<option value='XS'  />XS
	<option value='S' />S
	<option value='M '  />M
	<option value='L'  />L
	<option value='XL'  />XL </b></select></nobr><br><br>
	<nobr>цена: <b><input type='number' value='".$row['price']. "' name='price'></b> лв.</nobr><br>
	<hr><textarea rows='10' cols='30' name='moreinfo'>".$row['moreinfo']."</textarea>
	<br><input type='submit' value='Запис'></td><td>".($row['picture']?"<img src='pictures/".$row['picture']."'>":"Няма снимка...")."</td>";
echo "</tr>";
echo "</table>";
echo "</form>";
$mysql->close();
?>
 </div>
<?php include "inc-files/after_content.code"; ?> 	