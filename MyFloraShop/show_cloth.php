<?php include "inc-files/before_content.code"; ?>
 <div id="content">
<?php
$mysql=new mysqli("localhost", "root", "", "flora-shop");
$mysql->set_charset("utf8");

$result = $mysql->query("select tbl_clothes.*, tbl_makes.make from tbl_clothes join tbl_makes on tbl_clothes.id_make=tbl_makes.id_make where id_cloth=".$_REQUEST['show_id']);
$row = $result->fetch_assoc();
echo "<table border='1' align='center'>";
echo "<tr valign='top'>";
echo "<td width='250'> вид: <b>".htmlspecialchars($row['make']) . "</b><br>размер: <b>" . $row['size'] . "</b><br><br>цена: <b>" . $row['price'] . "</b> лв.<br><hr><span style='font-size:16px'><pre>".htmlspecialchars($row['moreinfo'])."</pre></span></td><td>".($row['picture']?"<img src='pictures/".$row['picture']."'>":"Няма снимка...")." <br> <a href='form01.php?id_order=".$row['id_cloth']."' title='Поръчай'>Поръчай</a></ </td>";

echo "</tr>";
echo "</table>";
echo "<a href='javascript:history.back()' title='Връщане към предходната страница'> Обратно към списъка</a>";

?>
 </div>
<?php include "inc-files/after_content.code"; ?>