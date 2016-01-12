$(document).ready( function(){
	/* done(); */
});

$("#adminSub").click(function() {
	
	var reg = /^[a-z]{1,8}$/;
	if (!reg.test($("#myAdminForm :input").val())){
         alert ("!! You did not enter a uniqname here !!");
    } else {
		$.ajax({
			type: 'post',
			url: 'myAdminFormSubmit.php',
			data: $("#myAdminForm :input"),
			success: done()
		});
	}
	clearInput();
});				

$("a.delete").click(function(e) {
		e.preventDefault();
		var parent = $(this).parent();
		$.ajax({
			type: 'get',
			url: 'adminMngmt.php',
			data: 'ajax=1&delete=' + parent.attr('id').replace('record-',''),
			beforeSend: function() {
				parent.animate({'backgroundColor':'#fb6c6c'},200);
			},
			success: function() {
				parent.slideUp(300,function() {
					parent.remove();
				});
			}
		});
	});
		
function clearInput(){
		$("#myAdminForm :input").each( function() {
			$(this).val('');
		});
}

function done(){
	setTimeout( function(){
	updates();
	}, 200);	
}

function updates(){
	$.getJSON("myAdminFormView.php", function(data){
	   	$("span#currAdmins").empty();
	   	$.each(data.result, function(){	
	   		$("span#currAdmins").append("<div class='record' id='record-" + this['adminID'] + "'><a href='?delete=" + this['adminID'] + "' class='delete'><span style=color:red;font-weight:bold;;>X</span></a>&nbsp;<strong>" + this['admin'] + "</strong> -- " + this['adminFname'] + " " + this['adminLname'] + "</div>"); 		
	   	    });
	});

}

$( ".dp" ).datepicker({
  numberOfMonths: 2,
  showButtonPanel: true,
  dateFormat: "yy-mm-dd"
});
