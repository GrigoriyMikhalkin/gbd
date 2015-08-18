function funcBefore(){
    $("#result").text("Wait for data");
}

function pricesSuccess(data){
    $("#result").html(data);
}

function gamesSuccess(data){
    $("#result").html(data);
	    
    $("p").bind("mouseenter",function() {
	$(this).css("color","red");
	$(this).css("cursor","hand");
    });
    $("p").bind("mouseleave",function() {
	$(this).css("color","blue");
	$(this).css("cursor","pointer");
    });
    
    $("p").bind("click",function(){
	var pair = $(this).text().split(" ID:");
	var name = pair[0];
	var id = pair[1];
	$.ajax({
	    url: "result/prices.php",
	    type: "POST",
	    data: ({name: name, id: id}),
	    dataType: "html",
	    beforeSend: funcBefore,
	    success: pricesSuccess
	});
    });
}

$(document).ready (function () {
    $("#submit").bind("click", function () {
	$.ajax({
	    url: "result/games.php",
	    type: "POST",
	    data: ({gameName: $("#name").val()}),
	    dataType: "html",
	    beforeSend: funcBefore,
	    success: gamesSuccess
	});
    });
});
