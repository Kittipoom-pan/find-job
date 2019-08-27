<!-- <?php 
    include_once('config.php');
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="chats.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <title>Document</title>
</head>
<script>
	function loaddata(){
		$.ajax({
			type : "POST",
			url : "chatt.php",
			success: function(html){
				if(html){
					$('.chat').html("<li class='left clearfix'>Loading message...</li>")
					$('.chat').html(html);
				}else{
					$('.chat').html("No record found");
				}
			},

		})}
		$(document).ready(function(){
	$('#send').click(function(){
		msg = $('#msg').val();
		name =$('#name').val();

		$.ajax({
			type : 'POST',
			url : "insert.php",
			data : "msg=" + msg + "$name" + name,
			success: function(html){
				$('#err').html("Message send");
				$('#msg').val("");
				$('#msg').focus();
			setInterval (function(){loaddata()},1000)
			}, beforeSend: function(){
				$('#err').html("Sending...");
			}
		})
	})
	$('#refresh').click(function(){
		setInterval(function(){loaddata()},1000);
	})
		setInterval(function(){loaddata()},1000);
	})
</script>
<body onload="loaddata()">
    <div class="chatbox">
        <div class="chatlogs">
            <div class="chat">
				<p class="chat-message"></p>   
	    </div>   
    </div>
        
        <div class="chat-form">
            <textarea></textarea>
            <button>Send</button>
        </div>
    </div>
</body>
</html> -->