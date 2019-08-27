<?php //if(!isset($_SESSION['Email'])){ header("location:job.php");} else {
	include_once('config.php');
	// require_once('loginemy.php');
	$chatid = $_GET["id"];
	
	// var_dump($chatid); 
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel = "stylesheet" type = "text/css" href = "chat.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<title>Chat</title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<style>
.col-md-12{
	min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
    border: aqua;
    padding: 30px 30px;
    margin-top: 50px;
    margin-left: auto;
    margin-right: auto;
    -webkit-box-shadow: 2px 2px 4px 0 rgba(0,0,0,.2);
    box-shadow: 2px 2px 4px 0 rgba(0,0,0,.2);
    border: 1px solid #f1f1f1;
    background-color: whitesmoke;
}
.h1, h1 {
    font-size: 2.5rem;
    text-align: center;
    margin-top: 50px;
}
</style>
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
			data : "msg=" + msg + "&name=" + name,
			success: function(html){
				$('#err').html("Message sent");
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
</head>      
                   
<body onload="loaddata()">
<h1>สนทนา</h1>
	<div class="container">	
		<div class="row">
			<div class="col-md-12" style="padding-top:50px;">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-comment"></span> 
						<div class="btn-group pull-right">
							<!-- <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
								<?= $_SESSION['Email'];?>
							</button>
							<ul class="dropdown-menu slidedown">
								<li><img src="upload/" width="80" height="80" class="img-responsive img-circle center-block" /></li>
								<li><a href="" id="refresh"><span class="glyphicon glyphicon-refresh"></span>Refresh</a></li>
                                <li><a href="" ><span class="glyphicon glyphicon-ok-sign"></span>Available</a></li>
                                <li><a href="" ><span class="glyphicon glyphicon-remove">Busy</span></a></li>
								<li><a href="" ><span class="glyphicon glyphicon-time">Away</span></a></li>
								<li class="divider"></li>
								<li><a href="" id="logout"><span class="glyphicon glyphicon-off"></span>Sign out</a></li>
							</ul> -->
						</div>
					</div>
					<div class="panel-body">
						<ul class="chat">
							
						</ul>
					</div>
					<div class="panel-footer">
						<div class="input-group">
							<!-- <div class="err" id="err">Send Message</div> -->
							<input type="text" name="name" disabled class="form-control" id="name" style="margin:10px 0px" value="<?= $_SESSION['Email'];?>" readonly/>
							
							<!-- <textarea name="msg" id="msg" class="form-control" cols="30" rows="8" style="margin:10px 0px"; type="text"></textarea> -->
					
						</div>
						<textarea name="msg" id="msg" class="form-control" cols="30" rows="8" style="margin:10px 0px"; type="text"></textarea>
						<button type="submit" name="send" id="send" class="btn btn-danger" style="margin:10px">Send Message</button>
					</div>
				</div>
			</div>
		</div>
	</div>	
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->
</body>
</html>	