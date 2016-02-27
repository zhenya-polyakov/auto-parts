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

$sql = "SELECT * FROM podbor_akb WHERE vendor='".mysql_real_escape_string($_POST["vendor"])."' AND car='".mysql_real_escape_string($_POST["car"])."'  AND modification='".mysql_real_escape_string($_POST["mod"])."'";
$res = mysql_query($sql);            
            while($row = mysql_fetch_array($res))
            {              
echo "<TR><TD><h2>Параметры Аккумулятора</h2></TD></TR>";   
		$vendor  = $row['vendor'];
		$car  = $row['car'];		
		$modification = $row['modification'];

		$date_start = $row['date_start'];
		$date_end = $row['date_end'];
		$mochnost = $row['mochnost'];
 
		$emkost_ot = $row['emkost_ot'];
		$emkost_do = $row['emkost_do'];
        $polarnost = $row['polarnost'];
        $dlina = $row['dlina'];
        $shirina = $row['shirina'];
        $visota = $row['visota'];
        $diametr_klem = $row['diametr_klem'];
        $tok_xol_prok = $row['tok_xol_prok'];
		$searchname = "&filter_category_id=75&filter_sub_category=true&filter_description=true";           
       	if ($mochnost != "" ) {
       	    $mochnost_ = explode('/',$mochnost);    
	 		echo "<TR><TD><h3>Мощность аккумулятора: <a href='../index.php?route=product/search&filter_name=".$mochnost_[0]." ".$mochnost_[1]."$searchname'>".$mochnost_[0]." / ".$mochnost_[1]."</a></h3></TD></TR>";		
		}
		if ($emkost_ot != "" && $emkost_ot != "") {
		  echo "<TR><TD><h3>Емкость аккумулятора: от <a href='../index.php?route=product/search&filter_name=".$emkost_ot."Ah".$searchname." '>".$emkost_ot."Ah</a> до <a href='../index.php?route=product/search&filter_name=".$emkost_do."Ah".$searchname." '>".$emkost_do."Ah</a></h3></TD></TR>";		
		}
        if ($polarnost != "") {
	 		echo "<TR><TD><h3>Полярность: <a href='../index.php?route=product/search&filter_name=$polarnost$searchname'>".$polarnost."</a></h3></TD></TR>";		
		}
        if ($dlina != "" && $shirina != "" && $visota != "") {
	 		echo "<TR><TD><h3>Размеры(Длина - Ширина - Высота): <a href='../index.php?route=product/search&filter_name=".$dlina."x".$shirina."x".$visota."$searchname'>".$dlina."мм - ".$shirina."мм - ".$visota."мм</a></h3></TD></TR>";		
}
        if ($diametr_klem != "") {
	 		echo "<TR><TD><h3>Диаметр клем: <a href='../index.php?route=product/search&filter_name=$diametr_klem$searchname'>".$diametr_klem."</a></h3></TD></TR>";		
		}
        
        if ($tok_xol_prok != "") {
	 		echo "<TR><TD><h3>ток холодной прокрутки: <a href='../index.php?route=product/search&filter_name=$tok_xol_prok$searchname'>".$tok_xol_prok."A</a></h3></TD></TR>";		
		echo "<TR><TD>&nbsp</TD></TR>";
        }
	  
	}

	echo "</TABLE> \r\n";
    

?>