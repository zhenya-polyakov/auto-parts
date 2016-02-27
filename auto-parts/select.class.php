<?php
class SelectList
{
    protected $conn; 
        public function __construct()
        {
            $this->DbConnect();
        } 
        protected function DbConnect()
        {          
            include "db_config.php";             
            $this->conn = mysql_connect($host,$user,$password) OR die("Unable to connect to the database");
            mysql_query("SET CHARACTER SET UTF8");
            mysql_query("SET NAMES UTF8");
            mysql_select_db($db,$this->conn) OR die("can not select the database $db");
            return TRUE;
        } 
        public function ShowCategory($table)
        {
            $this->table = $table;
            $sql = "SELECT DISTINCT vendor FROM $table ";
            $res = mysql_query($sql,$this->conn);
            $category = '<option value="0">Выбрать...</option>';
            while($row = mysql_fetch_array($res))
            {
                $category .= '<option value="' . $row['vendor'] . '">' . $row['vendor'] . '</option>';
            }
            return $category;
        } 
        public function ShowType($table)
        {         
            $this->table = $table;
            $vendor = $_POST["vendor"];
            $vendor = htmlspecialchars(stripslashes($vendor));
            //$vendor = quotemeta($vendor);            
            $sql = "SELECT DISTINCT car FROM $table WHERE vendor='".mysql_escape_string($vendor)."'";
            //$sql = "SELECT DISTINCT car FROM podbor_shini_i_diski WHERE vendor=".(int)$_POST['id'];
            $res = mysql_query($sql,$this->conn);
            $type = '<option value="0">Выбрать...</option>';
            while($row = mysql_fetch_array($res))
            {
                $type .= '<option value="' . $row['car'] . '">' . $row['car'] . '</option>';
            }
            return $type;
        }        
        public function ShowYear()
        {
            $vendor = $_POST["vendor"];
            $vendor = htmlspecialchars(stripslashes($vendor));
            //$vendor = quotemeta($vendor);
            $car = $_POST["car"];
            $car = htmlspecialchars(stripslashes($car));
            //$car = quotemeta($car);
            $sql = "SELECT DISTINCT year FROM podbor_shini_i_diski WHERE vendor='".mysql_escape_string($vendor)."' AND car='".mysql_escape_string($car)."'";
            
            $res = mysql_query($sql,$this->conn);
            $type = '<option value="0">Выбрать...</option>';
            while($row = mysql_fetch_array($res))
            {
                $type .= '<option value="' . $row['year'] . '">' . $row['year'] . '</option>';
            }
            return $type;
        }        
          public function ShowModification($table)
        {
            $vendor = $_POST["vendor"];
            $vendor = htmlspecialchars(stripslashes($vendor));
            //$vendor = quotemeta($vendor);
            $car = $_POST["car"];
            $car = htmlspecialchars(stripslashes($car));
            //$car = quotemeta($car);
            $year = $_POST["year"];
            $year = htmlspecialchars(stripslashes($year));
            //$year = quotemeta($year);
            $this->table = $table;
            if ($table == "podbor_shini_i_diski"){
            $sql = "SELECT  modification FROM $table WHERE vendor='".mysql_escape_string($vendor)."' AND car='".mysql_escape_string($car)."' AND year='".mysql_escape_string($year)."'";
            } else {$sql = "SELECT  modification FROM $table WHERE vendor='".mysql_escape_string($vendor)."' AND car='".mysql_escape_string($car)."'";}
            
            $res = mysql_query($sql,$this->conn);
            $type = '<option value="0">Выбрать...</option>';
            while($row = mysql_fetch_array($res))
            {
                $type .= '<option value="' . $row['modification'] . '">' . $row['modification'] . '</option>';
            }
            return $type;
        }
} 
$opt = new SelectList();
?>