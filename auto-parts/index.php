<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ru" xml:lang="ru">
<head>
<title>Интернет магазин автомобльных дворников, аккумуляторов и шин</title>
<meta name="description" content="Интернет магазин автомобльных дворников, аккумуляторов и шин" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
            $("select#type").attr("disabled","disabled");
            $("select#year").attr("disabled","disabled");
            $("select#modification").attr("disabled","disabled");
            
            $("select#category").change(function(){
            $("select#type").attr("disabled","disabled");
            $("select#type").html("<option>wait...</option>");
            var vendor = $("select#category option:selected").attr('value');
            $.post("select_type.php", {vendor:vendor}, function(data){
                $("select#type").removeAttr("disabled");
                $("select#type").html(data);
            });
        });
        
             $("select#type").change(function(){
            $("select#year").attr("disabled","disabled");
            $("select#year").html("<option>wait...</option>");
            var vendor = $("select#category option:selected").attr('value');
            var car = $("select#type option:selected").attr('value');
            $.post("select_year.php", {vendor:vendor,car:car}, function(data){
                $("select#year").removeAttr("disabled");
                $("select#year").html(data);
            });
        });
        
              $("select#year").change(function(){
            $("select#modification").attr("disabled","disabled");
            $("select#modification").html("<option>wait...</option>");
            var vendor = $("select#category option:selected").attr('value');
            var car = $("select#type option:selected").attr('value');
            var year = $("select#year option:selected").attr('value');
            $.post("show_modification.php", {vendor:vendor,car:car,year:year}, function(data){
                $("select#modification").removeAttr("disabled");
                $("select#modification").html(data);
            });
        });
        $("form#select_form").submit(function(){
            var cat = $("select#category option:selected").attr('value');
            var type = $("select#type option:selected").attr('value');            
           
            
            if(cat != "" && type != "")
            {
                var result = $("select#type option:selected").html();
                $("#result").html('your choice: '+result);
            }
            else
            {
                $("#result").html("you must choose two options!");
            }
            return false;
        });
    });
        </script>
</head>
<?php require_once "body.php"; ?>
<div id="content" style="padding-left:0px;">

		<div class="banners-new">

		<div id="banner0" class="banner" style="margin-right: 5px;">
		      <div><a href="dvorniki.php"><img id="b1" src="image/1.png" alt="АВТОМОБИЛЬНЫЕ ДВОРНИКИ" title="АВТОМОБИЛЬНЫЕ ДВОРНИКИ" /></a></div>
		</div>
		<script type="text/javascript"><!--
		var banner = function() {   
			 $("#banner0")
		        .mouseover(function() { 
		            var src = $("#b1").attr("src").match(/[^\.]+/) + "_over.png";
		            $("#b1").attr("src", src);
		        })
		        .mouseout(function() {
		            var src = $("#b1").attr("src").replace("_over.png", ".png");
		            $("#b1").attr("src", src);
		        });
		}

		setTimeout(banner);
		//--></script>
		<div id="banner1" class="banner">
		<div><a href="akb.php"><img id="b2" src="image/2.png" alt="АККУМУЛЯТОРЫ" title="АККУМУЛЯТОРЫ" /></a></div>
		</div>

		<script type="text/javascript"><!--
		 
		var banner = function() {     
		$("#banner1")
		        .mouseover(function() { 
		            var src = $("#b2").attr("src").match(/[^\.]+/) + "_over.png";
		            $("#b2").attr("src", src);
		        })
		        .mouseout(function() {
		            var src = $("#b2").attr("src").replace("_over.png", ".png");
		            $("#b2").attr("src", src);
		        });

		}

		setTimeout(banner);
		//--></script>
		<div id="banner2" class="banner">
		<div><a href="shini.php"><img id="b3" src="image/3.png" alt="ШИНЫ И ДИСКИ" title="ШИНЫ И ДИСКИ" /></a></div>
		</div>

		<script type="text/javascript"><!--

		var banner = function() {
		 $("#banner2")
		        .mouseover(function() { 
		            var src = $("#b3").attr("src").match(/[^\.]+/) + "_over.png";
		            $("#b3").attr("src", src);
		        })
		        .mouseout(function() {
		            var src = $("#b3").attr("src").replace("_over.png", ".png");
		            $("#b3").attr("src", src);
		        });
		}

		setTimeout(banner);
		//--></script>
		</div>
			
	</div>

</div>
</div>
<?php require_once "footer.php"; ?>
</body></html>