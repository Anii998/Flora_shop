 <?php include "inc-files/before_content.code"; ?>

<script type="text/javascript">
function removeCloth(num)
{
   if (confirm("Сигурни ли сте, че искате да изтриете данните за дрехата?"))
     self.location.href="delete_cloth.php?del_id="+num;
}
</script>
<div id="content">
<?php
$idMake=0; $prc=""; $insertText=""; $addWord=" where "; $addWordEnd="make";
if (isset($_GET["id_make"]))
{
	$idMake=$_GET['id_make']; $prc=$_GET['price'];
	if ($_GET['id_make']!=0)
		{$insertText .=$addWord."tbl_clothes.id_make=".$_GET["id_make"]; $addWord=" and "; $addWordEnd="price";}
	if (!empty($_GET['price']))
		if (is_numeric($_GET['price']))
			{$insertText .=$addWord."price<=".$_GET['price']; $addWordEnd="price";}
		else $prc=$_GET['price']="";
}

 $mysql=new mysqli("localhost", "root", "", "flora-shop");
 $mysql->set_charset("utf8"); 

$result = $mysql->query("select * from tbl_makes order by make");

echo "<form action='".$_SERVER['PHP_SELF']."' method='get'>";
echo "<p align='center'>";
echo "Вид: <select name='id_make'>";
echo "<option value='0'>Всички дрехи</option>";
while($row = $result->fetch_assoc())
{
echo "<option value='" . $row['id_make'] . "'".(($row['id_make']==$idMake)?' selected':'').">" . htmlspecialchars($row['make']) . "</option>";
}
echo "</select>";
echo " цена до <input type='number' name='price' value='".$prc."'> лв.";
echo " <input type='submit' value='Справка'>";
echo "</p>";
echo "</form>";

$strQuery="select tbl_clothes.*, tbl_makes.make from tbl_clothes join tbl_makes on tbl_clothes.id_make=tbl_makes.id_make".$insertText." order by ".$addWordEnd;
if (!($result = $mysql->query($strQuery)))
	echo "Грешка";


echo "<table align='center' width='80%'>";
if (isset($_SESSION["username"]) && $_SESSION["usertype"]==1)
{
	echo "<tr><th>Вид</th><th>Размер</th><th>Цена</th><th>Наличност (брой)</th><th colspan='2'>операции</th></tr>";
	while($row = $result->fetch_assoc())
	{
	echo "<tr align='center'>";
	echo "<td>
	<a href='show_cloth.php?show_id=".$row['id_cloth']."' title='Подробна информация'>" . htmlspecialchars($row['make']) . " </a></td>
	<td>" .$row['size']. "</td>
	<td>" .$row['price'] . " лв.</td>
	<td>".$row["number"]."</td>
		<td><a href='edit_cloth.php?edit_id=".$row['id_cloth']."' title='Промяна на цената и на допълнителната информация'>редактиране</a></td>
		<td><a href='javascript:removeCloth(".$row['id_cloth'].")'  title='Изтриване на данните'>изтриване</a></td>";
	echo "</tr>";
	}
}
else if (isset($_SESSION["username"]) && $_SESSION["usertype"]== 2)
{
	echo "<tr><th>Вид</th><th>Размер</th><th>Цена</th><th>Наличност (брой)</th><th colspan='3'>операции</th></tr>";
	while($row = $result->fetch_assoc())
	{
	echo "<tr align='center'>";
	echo "<td>
	<a href='show_cloth.php?show_id=".$row['id_cloth']."' title='Подробна информация'>" . htmlspecialchars($row['make']) . " </a></td>
	<td>" .$row['size']. "</td>
	<td>" .$row['price'] . " лв.</td>
	<td>".$row["number"]."</td>
		<td><a href='edit_cloth.php?edit_id=".$row['id_cloth']."' title='Промяна на цената и на допълнителната информация'>редактиране</a></td>
		<td><a href='sales.php?sales_id=".$row['id_cloth']."' title='Промяна на наличните бройки'>продажби</a></td>
		<td><a href='javascript:removeCloth(".$row['id_cloth'].")'  title='Изтриване на данните'>изтриване</a></td>";
	echo "</tr>";
	}
}
else
{
	echo "<tr><th>Изглед</th><th>вид</th><th>размер</th><th>цена</th></tr>";
	while($row = $result->fetch_assoc())
	{
	echo "<tr align='center'>";
	echo "<td width='20%'>".($row['picture']?"<img src='pictures/".$row['picture']."'>":"Няма снимка...")." </td>
	<td><a href='show_cloth.php?show_id=".$row['id_cloth']."' title='Подробна информация'>" . htmlspecialchars($row['make']) . " </a></td>
	<td>" .$row['size'] . " </td>
	<td>" .$row['price'] . " лв.</td>";
	echo "</tr>";
	}
}
echo "</table>";
$mysql->close();
?>
</div>
<?php include "inc-files/after_content.code"; ?>
