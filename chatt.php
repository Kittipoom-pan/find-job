<?php
include_once('config.php');
// $chatid = $_GET["id"];
// var_dump($chatid); 
$query="SELECT * FROM chat  order by chatid DESC";
// $query = "SELECT chat.name, chat.msg, chat.datetime, employee.Firstname, employer.Fullname
//         FROM ((chat
//         INNER JOIN employee ON chat.name = employee.Firstname)
//         INNER JOIN employer ON chat.name = employer.Fullname)";
// $query = "SELECT chat.*,job.* ,chat.*,employee.*  FROM chat
// LEFT JOIN job ON job.chatid = chat.chatid
// LEFT JOIN job ON job.chatid = employee.chatid WHERE chat.chatid";
$run=mysqli_query($conn,$query);
if(mysqli_num_rows($run)>0){
    while($row = mysqli_fetch_assoc($run)){     
?>

<li class="left clearfix">
    <span class="chat-img pull-left">
        <!-- <img src="" alt="user" width="32" height="30" class="img-circle"/> -->
    </span>
    <div class="chat-body clearfix">
        <div class="header">
            <strong class="primary-font"><?=$row['name'];?></strong><small class=
            "pull-right text-muted"><span class="glyphicon glyphicon-time"></span><?=$row['datetime'];?></small>
        </div>
        <p>
            <?=$row['msg'];?>
        </p>
    </div>
</li>
        <!-- <div class="chatlogs">
            <div class="chat">
                <div class="user-photo"><img src="img/click.png" alt=""></div>
                <p class="chat-message"><?=$row['msg'];?></p>
            </div>
        </div> -->
<?php }
    }else{
    echo "เริ่มต้นสนทนากันเลย!!"; 
    }
?>