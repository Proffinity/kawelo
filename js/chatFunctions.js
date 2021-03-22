$(document).ready(function() {
    fetch_user();

    setInterval(function(){
        update_last_activity();
        fetch_user();
        update_chat_history_data();
        fetch_user_type_status();
    }, 5000);

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

    function update_last_activity()
    {
        $.ajax({
            url:"php/update_last_activity.php",
            success:function()
            {

            }
        })
    }

    function make_chat_box(to_user_ID, to_user_name)
    {
      //removed css class and pasted in the php for better viewport
        var modal_content = '<div>';
        modal_content += '<div class="py-2 px-4 border-bottom d-none d-lg-block">';
        modal_content += '<div class="d-flex align-items-center py-1">';
        modal_content += '<div class="position-relative">';
        modal_content += '<img src="assets/images/users/user-1.jpg" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">';
        modal_content += '</div>';
        modal_content += '<div id="user_dialog_'+to_user_ID+'" class="flex-grow-1 pl-3">';
        modal_content += '<strong>'+to_user_name+'</strong>';
        modal_content += '<div id="type_status" class="text-muted small"><em></em></div>';
        modal_content += '</div>';
        modal_content += '<div class="dropdown">';
        modal_content += '<a class="btn btn-outline-info btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        modal_content += '<i class="mdi mdi-dots-vertical mdi-18px"></i>';
        modal_content += '</a>';
        modal_content += '<div class="dropdown-menu text-center dropdown-menu-sm-left" aria-labelledby="dropdownMenuButton">';
        modal_content += '<a class="dropdown-item" href="#"> <i class="fa fa-file-upload fa-2x"></i></a>';
        modal_content += '<a class="dropdown-item" href="#"> <i class="fa fa-user fa-2x"></i></a>';
        modal_content += '</div>';
        modal_content += '</div>';
        modal_content += '</div>';
        modal_content += '</div>';
        modal_content += '<div class="position-relative chat_history" data-touserid="'+to_user_ID+'" id="chat_history_'+to_user_ID+'"">';
        modal_content += fetch_user_chat_history(to_user_ID);
        modal_content += '</div>';
        modal_content += '<div class="flex-grow-0 py-3 px-4 border-top overflow-auto">';
        modal_content += '<div data-emojiarea="" class="input-group" data-type="unicode" data-global-picker="true">';
        modal_content += '	<div  class="emoji-button">😄 <label class="hide" for="chat_message_"></label></div>';
        modal_content += '<textarea name="chat_message_'+to_user_ID+'" data-touserid="'+to_user_ID+'" id="chat_message_'+to_user_ID+'"  class="form-control chat_message nn textarea-control" rows="2" placeholder="Type your message"></textarea>';
        modal_content += '<button name="send_chat" id="'+to_user_ID+'" class="btn btn-primary send_chat">Send</button>';
        modal_content += '</div>';
        modal_content += '</div>';
        $('#user_model_details').html(modal_content);
    }

    $(document).on('click', '.start_chat', function() {
        var to_user_ID = $(this).data('touserid');
        var to_user_name = $(this).data('tousername');
        make_chat_box(to_user_ID, to_user_name);
//fix this so that the imoji show
        $('#chat_message_'+to_user_ID).on('chat_message_'+to_user_ID, function() {
          $('#value1'+to_user_ID).text($('#chat_message_'+to_user_ID).val());
        });
        $('#value1'+to_user_ID).text($('#chat_message_'+to_user_ID).val());
/* this is the original code
        $('#input1').on('input1', function() {
          $('#value1').text($('#input1').val());
        });
        $('#value1').text($('#input1').val());
        */
    });

    $(document).on('click', '.send_chat', function() {
        var to_user_ID = $(this).attr('id');
        var chat_message = $('#chat_message_'+to_user_ID).val();
        $.ajax({
            url:"php/insert_chat.php",
            method:"POST",
            data:{to_user_ID: to_user_ID, chat_message: chat_message},
            success:function(data)
            {
                $('#chat_message_'+to_user_ID).val('');
                $('#chat_history_'+to_user_ID).html(data);
            }
        });
    });

    function fetch_user_chat_history(to_user_ID)
    {
        $.ajax({
            url:"php/fetch_user_chat_history.php",
            method:"POST",
            data:{to_user_ID: to_user_ID},
            success:function(data) {
                $('#chat_history_'+to_user_ID).html(data);
            }
        });
    }

    function fetch_user_type_status()
    {
        $.ajax({
            url:"php/type_status.php",
            method:"POST",
            success:function(data) {
				$('#type_status').html(data);
			}
        });
    }

    function update_chat_history_data()
    {
        $('.chat_history').each(function() {
            var to_user_ID = $(this).data('touserid');
            fetch_user_chat_history(to_user_ID);
        });
    }

    $(document).on('focus', '.chat_message', function() {
        var is_type = 'yes';
        var to_user_ID = $(this).data('touserid');

        $.ajax({
            url:"php/update_is_type_status.php",
            method:"POST",
            data:{is_type:is_type},
            success:function()
            {

            }
        });
    });

    $(document).on('blur', '.chat_message', function() {
        var is_type = 'no';
        $.ajax({
            url:"php/update_is_type_status.php",
            method:"POST",
            data:{is_type:is_type},
            success:function()
            {

            }
        });
    });

});
