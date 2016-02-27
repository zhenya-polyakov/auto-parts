<?php
error_reporting(E_ALL & ~E_NOTICE);
include "db_config.php";
include "select.class.php";
$table = $_POST['table'];
$show = $POST['show'];
$vender = $_POST['vendor'];
$car = $_POST['car'];
$mod = $_POST['mod'];

echo "<h1>".$vender." ".$car." ".$year." ".$mod." </h1> \r\n";        
echo "<TABLE BORDER=0 width=\"100%\">\r\n";
echo "<TR><TD><b><h2>Параметры шин</h2></b></TD></TR>\r\n";   
$sql = "SELECT * FROM podbor_shini_i_diski WHERE vendor='".mysql_real_escape_string($_POST["vendor"])."' AND car='".mysql_real_escape_string($_POST["car"])."' AND year='".mysql_real_escape_string($_POST["year"])."'  AND modification='".mysql_real_escape_string($_POST["mod"])."'";
$res = mysql_query($sql);            
            while($row = mysql_fetch_array($res))
            {              
		$vendor  = $row['vendor'];
		$car  = $row['car'];
		$year  = $row['year'];
		$modification = $row['modification'];

		$zavod_shini = $row['zavod_shini'];
		$zamen_shini = $row['zamen_shini'];
		$tuning_shini = $row['tuning_shini'];
 
		$pcd = $row['pcd'];
		$diametr = $row['diametr'];
		$gaika = $row['gaika'];

		$zavod_diskov = $row['zavod_diskov'];
		$zamen_diskov = $row['zamen_diskov'];
		$tuning_diski = $row['tuning_diski'];
        
        $searchname = "&filter_category_id=74&filter_sub_category=true&filter_description=true";
           
           	if ($zavod_shini != "") {
	 		echo "<TR><TD><h3>Заводская комплектация</h3></TD></TR>\r\n";

			$zavod_shini_ = explode('|',$zavod_shini);

			for ($j=0; $j<=count($zavod_shini_); $j++) {

				if ($zavod_shini_[$j] != "")  echo "<TR><TD><a href='../index.php?route=product/search&filter_name=$zavod_shini_[$j]$searchname'>" . $zavod_shini_[$j] . "</a></TD></TR>\r\n";

			}

		}
		
		if ($zamen_shini != "") {
			echo "<TR><TD><h3>Варианты замены</h3></TD></TR>\r\n";


			$zamen_shini_ = explode('|',$zamen_shini);

			for ($j=0; $j<=count($zamen_shini_); $j++) {

				if ($zamen_shini_[$j] != "") echo "<TR><TD><a href='../index.php?route=product/search&filter_name=$zamen_shini_[$j]$searchname'>" . $zamen_shini_[$j] . "</a></TD></TR>\r\n";

			}

		}

		if ($tuning_shini != "") {
			echo "<TR><TD><h3>Тюнинг</h3></TD></TR>\r\n";
			$tuning_shini_ = explode('|',$tuning_shini);
			for ($j=0; $j<count($tuning_shini_); $j++) {
				$tuning_shini__ = explode('#',$tuning_shini_[$j]);
					if (count($tuning_shini__) >= 2 ) {
						echo "<TR><TD>передняя ось: <a href='../index.php?route=product/search&filter_name=$tuning_shini__[0]$searchname'> " . $tuning_shini__[0] . "</a> задняя ось: <a href='../index.php?route=product/search&filter_name=$tuning_shini__[1]$searchname'>" . $tuning_shini__[1] . "</a></TD></TR>\r\n";
					} else {
						echo "<TR><TD><a href='../index.php?route=product/search&filter_name=$tuning_shini_[$j]$searchname'>" . $tuning_shini_[$j] . "</a></TD></TR>\r\n";
					}
			}
		#echo "<br><br>\r\n";
		}

      

 		echo "<TR><TD><b><h2>Параметры дисков</h2></b></TD></TR>\r\n";
		echo "<TR><TD>PCD: $pcd; диаметр: $diametr; $gaika</TD></TR>\r\n";


		if ($zavod_diskov != "") {
			echo "<TR><TD><h3>Заводская комплектация</h3></TD></TR>\r\n";
			$zavod_diskov_ = explode('|',$zavod_diskov);
			for ($j=0; $j<count($zavod_diskov_); $j++) {
				$zavod_diskov__ = explode('#',$zavod_diskov_[$j]);
					if (count($zavod_diskov__) >= 2 ) {
						echo "<TR><TD>передняя ось:<a href='../index.php?route=product/search&filter_name=$zavod_diskov__[0]$searchname'> " . $zavod_diskov__[0] . "</a> задняя ось: <a href='../index.php?route=product/search&filter_name=$zavod_diskov__[1]$searchname'>" . $zavod_diskov__[1] . "</a></TD></TR>\r\n";
					} else {
						echo "<TR><TD><a href='../index.php?route=product/search&filter_name=$zavod_diskov__[0]$searchname'>" . $zavod_diskov__[0] . "</a></TD></TR>\r\n";
					}
			}
		#echo "<br><br>\r\n";
		}



		if ($zamen_diskov != "") {
			echo "<TR><TD><h3>Варианты замены</h3></TD></TR>\r\n";
			$zamen_diskov_ = explode('|',$zamen_diskov);
			for ($j=0; $j<count($zamen_diskov_); $j++) {
				$zamen_diskov__ = explode('#',$zamen_diskov_[$j]);
					if (count($zamen_diskov__) >= 2 ) {
						echo "<TR><TD>передняя ось: <a href='../index.php?route=product/search&filter_name=$zamen_diskov__[0]$searchname'>" . $zamen_diskov__[0] . "</a> задняя ось: <a href='../index.php?route=product/search&filter_name=$zamen_diskov__[1]$searchname'>" . $zamen_diskov__[1] . "</a></TD></TR>\r\n";
					} else {
						echo "<TR><TD><a href='../index.php?route=product/search&filter_name=$zamen_diskov_[$j]$searchname'> " . $zamen_diskov_[$j] . "</a></TD></TR>\r\n";
					}
			}
		#echo "<br><br>\r\n";
		}



		if ($tuning_diski != "") {
			echo "<TR><TD><h3>тюнинг</h3></TD></TR>\r\n";
			$tuning_diski_ = explode('|',$tuning_diski);
			for ($j=0; $j<count($tuning_diski_); $j++) {
				$tuning_diski__ = explode('#',$tuning_diski_[$j]);
					if (count($tuning_diski__) >= 2 ) {
						echo "<TR><TD>передняя ось: <a href='../index.php?route=product/search&filter_name=$tuning_diski__[0]'>" . $tuning_diski__[0] . "</a> задняя ось: <a href='../index.php?route=product/search&filter_name=$tuning_diski__[0]'>" . $tuning_diski__[1] . "</a></TD></TR>\r\n";
					} else {
						echo "<TR><TD><a href='../index.php?route=product/search&filter_name=$tuning_diski_[$j]'>" . $tuning_diski_[$j] . "</a></TD></TR>\r\n";
					}
			}
		#echo "<br><br>\r\n";
		}

	}

	echo "</TABLE> \r\n";


?>