<?php if(!isset($_SESSION)) {session_start();}if(isset($_SESSION['user_id'])) {} else{
  $_SESSION['msg']="Session Expired! Please login";
  echo '<a id="link" target="_parent" href="../../../src/auth/login.php"></a>

<script type="text/javascript">
    document.getElementById("link").click();
</script>';} ?>
<html>
    <head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
    </head>
    <body>
<?php if(isset($_GET['touserid'])){
if(!isset($_SESSION)) {session_start();}
include('database_connection.php');?>
<h5 style="margin-left:2%;font-weight:bold;font-size:18px;color:brown; border-bottom:1px dotted black"><?php echo get_user_name($_GET['touserid'],$connect); ?><h5/>
                    <div class="text-box" style="padding: 10px; height: 380px;">
              				<div id="user_model_details"></div>
                    </div>

    <?php include '../newpost.php'; ?>
    </div>
    <script>
    $(document).ready(function(){

    	//fetch_user();

    	setInterval(function(){
    		//update_last_activity();
    		//fetch_user();
    		update_chat_history_data();
    		//fetch_group_chat_history();
    	}, 5000);



    	function make_chat_dialog_box(to_user_id, to_user_name)
    	{
    		var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
    		modal_content += '<div style="height:350px; border:0px solid #ccc; overflow-y: auto; margin-bottom:4px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
    		modal_content += fetch_user_chat_history(to_user_id);
    		modal_content += '</div>';
    		modal_content += '<div class="form-group">';
    		modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
    		modal_content += '</div><div class="form-group" align="right">';
    		modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
    		$('#user_model_details').html(modal_content);
        var scrolled = false;
        function updateScroll(){
          if(!scrolled){
          var element = document.getElementById("chat_history");
          element.scrollDown = element.scrollHeight;
        }
      }

        $("#chat_history").on('scroll', function(){
          scrolled=true;
        });
    	}
      function getParameterByName(name, url = window.location.href) {
      name = name.replace(/[\[\]]/g, '\\$&');
      var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
          results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, ' '));
      }
    		var to_user_id = getParameterByName('touserid');
    		var to_user_name = getParameterByName('tousername');
    		make_chat_dialog_box(to_user_id, to_user_name);

    	$(document).on('click', '.send_chat', function(){
    		var to_user_id = $(this).attr('id');
    		var chat_message = $('#chat_message_'+to_user_id).val();
    		$.ajax({
    			url:"insert_chat.php",
    			method:"POST",
    			data:{to_user_id:to_user_id, chat_message:chat_message},
    			success:function(data)
    			{
    				$('#chat_message_'+to_user_id).val('');
    				$('#chat_history_'+to_user_id).html(data);
    			}
    		})
    	});

    	function fetch_user_chat_history(to_user_id)
    	{
    		$.ajax({
    			url:"fetch_user_chat_history.php",
    			method:"POST",
    			data:{to_user_id:to_user_id},
    			success:function(data){
    				$('#chat_history_'+to_user_id).html(data);
    			}
    		})
    	}

    	function update_chat_history_data()
    	{
    		$('.chat_history').each(function(){
    			var to_user_id = $(this).data('touserid');
    			fetch_user_chat_history(to_user_id);
    		});
    	}

    	$(document).on('click', '.ui-button-icon', function(){
    		$('.user_dialog').dialog('destroy').remove();
    		$('#is_active_group_chat_window').val('no');
    	});

    	$(document).on('focus', '.chat_message', function(){
    		var is_type = 'yes';
    		$.ajax({
    			url:"update_is_type_status.php",
    			method:"POST",
    			data:{is_type:is_type},
    			success:function()
    			{

    			}
    		})
    	});

    	$(document).on('blur', '.chat_message', function(){
    		var is_type = 'no';
    		$.ajax({
    			url:"update_is_type_status.php",
    			method:"POST",
    			data:{is_type:is_type},
    			success:function()
    			{

    			}
    		})
    	});

    });
    </script>
<?php }else{echo "Bad Gateway";} ?>
</body>
</html>
