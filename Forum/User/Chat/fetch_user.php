<?php

//fetch_user.php

include('database_connection.php');
include '../Post_Com/config.php';
session_start();

if(isset($_POST['action'])&&$_POST['action']== 'user'){

	$query = "
	SELECT * FROM users
	WHERE user_id != '".$_SESSION['user_id']." order by first_name ASC'
	";

	$statement = $connect->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	$output = '

	';

	foreach($result as $row)
	{
		$status = '';
		$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
		$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);

		$output .= '
		<div id="cont_'.$row['user_id'].'" class="topic">
			<p  class="top" id="top_'.$row['user_id'].'">'.get_user_name($row['user_id'],$connect).' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</p>

			</div>
			<script>
			document.getElementById("cont_'.$row['user_id'].'").onclick = function() {
			//document.getElementById("top_'.$row['user_id'].'").style.color = "brown";
			var el = document.getElementById("ifplayer2");
			el.src = "index.php?touserid='.$row['user_id'].'&tousername='.get_user_name($row['user_id'],$connect).'";

			}
			</script>
		';
	}

	$output .= '';

	echo $output;


} else if(isset($_POST['action'])&&$_POST['action']== 'message'){
	$query = "
	select DISTINCT to_user_id from chat_message where from_user_id='".$_SESSION['user_id']."' or to_user_id='".$_SESSION['user_id']."' order by timestamp DESC
	";
	$statement = $connect->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	$output = '

	';
	$result1=$mysqli->query($query);
	while ($r = mysqli_fetch_assoc($result1)){
  foreach($r as $row) {
		$status = 'offline';
		$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
		$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
		if($row!=$_SESSION['user_id']){
			$output .= '
			<div id="'.$row.'" class="topic">
				<p  class="top" id="top_'.$row.'">'.get_user_name($row,$connect).' '.count_unseen_message($row, $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row, $connect).'</p>

				</div>
				<script>
				document.getElementById("'.$row.'").onclick = function() {
				//document.getElementById("top_'.$row.'").style.color = "brown";
				var el = document.getElementById("ifplayer2");
				el.src = "index.php?touserid='.$row.'&tousername='.get_user_name($row,$connect).'";

				}
				</script>
			';
  }
}
}


		$output .='';

		echo $output;

	} else if(isset($_POST['action'])&&$_POST['action']== 'message1'){
			$query = "
			select DISTINCT to_user_id from chat_message where from_user_id='".$_SESSION['user_id']."' or to_user_id='".$_SESSION['user_id']."' order by timestamp DESC
			";
			$statement = $connect->prepare($query);

			$statement->execute();

			$result = $statement->fetchAll();

			$output = '

			';
			$result1=$mysqli->query($query);
			while ($r = mysqli_fetch_assoc($result1)){
		  foreach($r as $row) {
				$status = 'offline';
				$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
				$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
				$q="'";
				if($row!=$_SESSION['user_id']){
					$output .= '
					<li  class="ui-widget-content ui-corner-tr">
				    <h5 id="msg_'.$row.'" class="ui-widget-header">'.get_user_name($row,$connect).' '.count_unseen_message($row, $_SESSION['user_id'], $connect).'</h5>
				    <img src="../../../assets/img/chat.png" alt="The peaks of High Tatras" width="96" height="72">
				    <a href="../../../assets/img/chat.png" title="View larger image" class="ui-icon ui-icon-zoomin">View larger</a>
				    <a id="'.$row.'" href="link/to/trash/script/when/we/have/js/off" title="Delete this Message" class="ui-icon ui-icon-trash">Delete image</a>
				  </li>
						<script>
						document.getElementById("msg_'.$row.'").onclick = function() {
							window.location.href = "index.php?touserid='.$row.'&tousername='.get_user_name($row,$connect).'";
						}
						var recycle_icon = '.$q.'<a id="'.$row.'" href="link/to/recycle/script/when/we/have/js/off" title="Recycle this image" class="ui-icon ui-icon-refresh">Recycle image</a>'.$q.';
						var trash_icon = '.$q.'<a id="'.$row.'" href="link/to/trash/script/when/we/have/js/off" title="Delete this image" class="ui-icon ui-icon-trash">Delete image</a>'.$q.';

						</script>
					';
		  }
		}
		}



				$output .='';

				echo $output;

		}
			else if(isset($_POST['action'])&&$_POST['action']== 'messaged'){
				if ($_POST['act']=="delete") {
					$query="update chat_message set st='off' where to_user_id='".$_POST['id']."' and from_user_id='".$_SESSION['user_id']."'";
					if(mysqli_query($con,$query)){
						echo "success";
					} else {
						echo mysqli_error($con);
					}
				} elseif ($_POST['act']=="restore") {
					$query="update chat_message set st='on' where to_user_id='".$_POST['id']."' and from_user_id='".$_SESSION['user_id']."'";
					if(mysqli_query($con,$query)){
						echo "success1";
					} else {
						echo mysqli_error($con);
					}
				}

			}





?>
