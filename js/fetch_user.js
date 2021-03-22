$(document).ready(function() {
	fetch_user();

	function fetch_user()
	{
		$.ajax({
			url:"php/fetch_user.php",
			method:"POST",
			success:function(data) {
				$('#user_details').html(data);
			}
		});
	}
});