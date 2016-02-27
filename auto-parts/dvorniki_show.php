<?php
error_reporting(E_ALL & ~E_NOTICE);
include "db_config.php";
include "select.class.php";
$table = $_POST['table'];
$show = $POST['show'];
$vender = $_POST['vendor'];
$car = $_POST['car'];
$mod = $_POST['mod'];

echo "<h1>Автомобиль: ".$vender."<br /> Марка: ".$car."<br /> Обьем: ".$mod." </h1> ";        
echo "<TABLE BORDER=0 width=\"100%\" >";
echo "<TR><TD><h2>Параметры дворников</h2></TD></TR>";   
$sql = "SELECT * FROM podbor_dvorniki WHERE vendor='".mysql_real_escape_string($_POST["vendor"])."' AND car='".mysql_real_escape_string($_POST["car"])."'  AND modification='".mysql_real_escape_string($_POST["mod"])."'";
$res = mysql_query($sql);            
            while($row = mysql_fetch_array($res))
            {              

		$vendor  = $row['vendor'];
		$car  = $row['car'];
		
		$modification = $row['modification'];

		$pered_vod = $row['pered_vod'];
		$pered_pas = $row['pered_pas'];
		$zad = $row['zad'];
 
		$pered_all = $row['pered_all'];
		$zad_all = $row['zad_all'];
		
         $searchname = "&filter_category_id=76&filter_sub_category=true&filter_description=true";           
           	if ($pered_vod != "" && $pered_pas != "") {
	 		echo "<TR><TD><h3>Размер передних дворников: <a href='../index.php?route=product/search&filter_name=".$pered_vod." ".$pered_pas."$searchname'>".$pered_vod."мм ".$pered_pas."мм</a></h3></TD></TR>";		
			}
		
		if ($pered_all != "") {
			echo "<TR><TD><h3>Подходящие модели передних дворников:</h3></TD></TR>\r\n";
			$pered_all_ = explode('<br>',$pered_all);
			for ($j=0; $j<=count($pered_all_); $j++) {
                $string = str_replace(' ', ', ', $pered_all_[$j]);
				if ($pered_all_[$j] != "") echo "<TR><TD><a href='../index.php?route=product/search&filter_name=".$string.", ".$pered_vod.", ".$pered_pas."$searchname'>" . $pered_all_[$j] . "</a></TD></TR>\r\n";
                }
            }
        if ($zad != "") {
	 		echo "<TR><TD><h3>Размер задних дворников: <a href='../index.php?route=product/search&filter_name=$zad$searchname'>".$zad."мм</a></h3></TD></TR>";		
			}
	   if ($zad_all != "") {
			echo "<TR><TD><h3>Подходящие модели задних дворников:</h3></TD></TR>\r\n";
			$zad_all_ = explode('<br>',$zad_all);
			for ($j=0; $j<=count($zad_all_); $j++) {

				if ($zad_all_[$j] != "") echo "<TR><TD><a href='../index.php?route=product/search&filter_name=$zad_all_[$j]$searchname'>" . $zad_all_[$j] . "</a></TD></TR>\r\n";
                }
                echo "<TR><TD>&nbsp</TD></TR>";
            }
	}

	echo "</TABLE> \r\n";

?>