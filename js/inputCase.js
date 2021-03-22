$('document').ready(function() {
	$('#save').click(function() {
		var full_name = $('#full_name').val();
		var category = $('#category').val();
		var case_type = $('#case_type').val();
		var assign = $('option:selected', '#AssignTo').data('value');
		var registration_no = $('#Registration_no').val();
		var registration_date = $('#Registration_date').val();
		var courtName = $('#CourtName').val();
		var courtNumber = $('#CourtNO').val();
		var judgeName = $('#Judge_name').val();
		var respondent_name = $('#Respondent').val();
		var filing_no = $('#Filling_No').val();
		var filing_date = $('#Filing_Date').val();
		var firstDate = $('#First_Date').val();
		var nextDate = $('#Next_Date').val();
		var status = $('#Status').val();

		$.get('php/inputCase.php', { full_name: full_name, category: category, case_type: case_type, assign: assign, registration_no: registration_no, registration_date: registration_date, courtName: courtName, courtNumber: courtNumber, judgeName: judgeName, respondent_name: respondent_name, filing_no: filing_no, filing_date: filing_date, firstDate: firstDate, nextDate: nextDate, status: status }, function(data) {
			 	$('#save_status').html(data);
			 });
		/*var registration_date = new Date($('#Registration_date').val());
		var Reg_day = registration_date.getDate();
		var Reg_month = registration_date.getMonth() + 1;
		var Reg_year = registration_date.getFullYear();
		var reg_date = [Reg_year, Reg_month, Reg_day].join('/');

		alert(reg_date);*/
	});
});