$('document').ready(function() {
	$('#save_button').click(function() {
		var clientName = $('#clientName').val();
		var clientNumber = $('#clientNumber').val();
		var date = $('#date').val();
		var time = $('#time').val();
		var status = $('option:selected', '#status').data('value');
		var clientID = $('#clientName').attr('target');

		$.get('php/editAppointment.php',
			{ clientName: clientName, clientID: clientID, clientNumber: clientNumber, date: date, time: time, status: status },
			function(data) {
				$('#save_status').html(data);
			});
	})
});