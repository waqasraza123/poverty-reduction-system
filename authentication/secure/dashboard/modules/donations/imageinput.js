
	/*
	Using the file input itself to select a file works fine
	*/
	$('input[type=file]').change(function() {
	   alert($(this).val()); 
	   $("img").attr({"src": "UNSTITCHED_3.jpg"});
	   alert($("img").attr("src")); 
	});


	/*
	However, using another element to trigger the file selector 
	does not cause the "change" function to be triggered.
	*/
$('a').click(function() {
    $('input[type=file]').click();
	alert("76543wdfghjm,")

});
