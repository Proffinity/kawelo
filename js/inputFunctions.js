$('document').ready(function() {
	$('#enter').click(function() {
  		var firstName = $('#FirstName').val();
  		var otherName = $('#otherName').val();
  		var lastName = $('#LastName').val();
  		var gender = $('#gender').val();
  		var phoneNumber = $('#PhoneNo').val();
  		var email = $('#email').val();
  		var homeAddress = $('#HomeAddress').val();
  		var residence = $('#residence').val();
  		var cases = $('#cases').val();

  		$.get('php/inputClient.php',
  			 { firstName: firstName, otherName: otherName, lastName: lastName, gender: gender, phoneNumber: phoneNumber, email: email, homeAddress: homeAddress, residence: residence, cases: cases },
  			 function(data) {
  			 	$('#client_save').html(data);
  			 });

	});

	$('#appointments_save').click(function() {
		var clientName = $('#clientName').val();
		var number = $('#number').val();
		var appointmentDate = $('#appointmentDate').val();
		var appointmentTime = $('#appointmentTime').val();

		$.get('php/inputAppointment.php',
			{ clientName: clientName, number: number, appointmentDate: appointmentDate, appointmentTime: appointmentTime },
			function(data) {
				$('#save_status').html(data);
			});

	});

});