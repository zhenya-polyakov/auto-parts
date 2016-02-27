$(function() {
    $("#banner0")
        .mouseover(function() { 
            var src = $("#b1").attr("src").match(/[^\.]+/) + "_over.png";
            $("#b1").attr("src", src);
        })
        .mouseout(function() {
            var src = $("#b1").attr("src").replace("_over.png", ".png");
            $("#b1").attr("src", src);
        });

  $("#banner1")
        .mouseover(function() { 
            var src = $("#b2").attr("src").match(/[^\.]+/) + "_over.png";
            $("#b2").attr("src", src);
        })
        .mouseout(function() {
            var src = $("#b2").attr("src").replace("_over.png", ".png");
            $("#b2").attr("src", src);
        });

  $("#banner2")
        .mouseover(function() { 
            var src = $("#b3").attr("src").match(/[^\.]+/) + "_over.png";
            $("#b3").attr("src", src);
        })
        .mouseout(function() {
            var src = $("#b3").attr("src").replace("_over.png", ".png");
            $("#b3").attr("src", src);
        });
});
