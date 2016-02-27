<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ru" xml:lang="ru">
<head>
<title>Интернет магазин автомобльных дворников, аккумуляторов и шин</title>
<meta name="description" content="Интернет магазин автомобльных дворников, аккумуляторов и шин" />
<link href="http://automehanik.seomax.biz/image/data/favicon.png" rel="icon" />
<link rel="stylesheet" type="text/css" href="../catalog/view/theme/theme_free/stylesheet/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="../catalog/view/theme/theme_free/stylesheet/simple_menu.css" />
<script type="text/javascript" src="../catalog/view/javascript/menu_auto.js"></script>
<script type="text/javascript" src="../catalog/view/javascript/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
            var table = "podbor_dvorniki";
            $("select#type1").attr("disabled","disabled");            
            $("select#modification1").attr("disabled","disabled");
            
            $("select#category1").change(function(){
            $("select#type1").attr("disabled","disabled");
            $("select#type1").html("<option>Ждите...</option>");
            var vendor = $("select#category1 option:selected").attr('value');
            $.post("select_type.php", {vendor:vendor,table:table}, function(data){
                $("select#type1").removeAttr("disabled");
                $("select#type1").html(data);
            });
        });                    
        
              $("select#type1").change(function(){
            $("select#modification1").attr("disabled","disabled");
            $("select#modification1").html("<option>Ждите...</option>");
            var vendor = $("select#category1 option:selected").attr('value');
            var car = $("select#type1 option:selected").attr('value');           
            $.post("show_modification.php", {vendor:vendor,car:car,table:table}, function(data){
                $("select#modification1").removeAttr("disabled");
                $("select#modification1").html(data);
            });
        });
        
          /* $("form#select_form").submit(function(){
           var vendor = $("select#category1 option:selected").attr('value');
            var car = $("select#type1 option:selected").attr('value');
            var year = $("select#year1 option:selected").attr('value'); 
            var mod = $("select#modification1 option:selected").attr('value');      
        var show = 1;    
        $.post("dvorniki_show.php", {vendor:vendor,car:car,mod:mod,table:table,show:show}, function(data){
                
                $("#result").html(data);
                 }); 
                 return false;           
            });  */
            
         }); 
  
   
        </script>

</head>
<?php require_once "body.php"; ?>
<?php 
require_once "db_config.php";
require_once "select.class.php";
?>  
<div id="content">
 <form id="select_form" action="../index.php?route=product/search&filter_name=%20&filter_category_id=76&filter_sub_category=true&filter_description=true" method="post">
 <h3>Подбор дворников</h3>
        Производитель:<br />
        <select id="category1" name="vendor" style="width: 200px;">
            <?php echo $opt->ShowCategory(podbor_dvorniki); ?>
        </select>
        <br /><br /> 
           Марка:<br />
            <select id="type1" name="car" style="width: 200px;">
                <option value="0">Выбрать...</option>
            </select> 
            <br /><br />
            Модификация:<br />
            <select id="modification1" name="mod" style="width: 200px;">
                <option value="0">Выбрать...</option>
            </select>            
            <br /><br />
            <input type="submit" class="button" value="Подтвердить" />
        </form>
<div id="result"></div>



</div>


<div class="clear"></div>
<?php include "footer.php"; ?>
</body></html>