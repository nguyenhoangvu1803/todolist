$( function() {
	
	var dateFormat = "yy-mm-dd";
	
	$( ".datepicker" ).datepicker({
		dateFormat: dateFormat
	});
	 
	var from = $( "#from_date" )
	.datepicker({
		dateFormat: dateFormat,
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 2
	})
	.on( "change", function() {
		to.datepicker( "option", "minDate", getDate( this ) );
	}),
	to = $( "#to_date" ).datepicker({
		dateFormat: dateFormat,
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 2
	})
	.on( "change", function() {
		from.datepicker( "option", "maxDate", getDate( this ) );
	});

	function getDate( element ) {
		var date;
		try {
			date = $.datepicker.parseDate( dateFormat, element.value );
		} catch( error ) {
			date = null;
		}
		return date;
	}
	
	$("#form_add_work").validate({
		rules: {
			work_name: "required",
			starting_date: "required",
			ending_date: "required",
			status: "required"
		},
		messages: {
			work_name: "Please enter Work Name",
			starting_date: "Please enter Starting Date",
			ending_date: "Please enter Ending Date",
			status: "Please enter Status"
		}
	});
	
	$("#form_find_word").validate({
		rules: {
			from_date: "required",
			to_date: "required"
		},
		messages: {
			from_date: "Please enter Starting Date",
			to_date: "Please enter Ending Date"
		}
	});
	
} );