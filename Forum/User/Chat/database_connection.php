<?php
$connect = new PDO("mysql:host=localhost;dbname=educo;charset=utf8mb4", "root", "");
date_default_timezone_set('Africa/Nairobi');
$mysqli = new mysqli("localhost", "root", "", "educo");
$link = mysqli_connect("localhost", "root", "", "educo");

function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
	$query = "
	SELECT * FROM chat_message
	WHERE (from_user_id = '".$from_user_id."'
	AND to_user_id = '".$to_user_id."')
	OR (from_user_id = '".$to_user_id."'
	AND to_user_id = '".$from_user_id."')
	ORDER BY timestamp ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$user_name = '';
		if($row["from_user_id"] == $from_user_id)
		{
			$user_name = '<b class="text-success">You</b>';
			$output .= '
			<div class="sender">
			<p>'.$user_name.': '.$row["chat_message"].'</p>
			<div align="right">

				<small><em>'.$row['timestamp'].'</em></small>
			</div>
			</div><br>

			';
		}
		else
		{
			$user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
			$output .= '
			<div class="receiver">
			<p>'.$user_name.': '.$row["chat_message"].'</p>
			<div align="left">

				<small><em>'.$row['timestamp'].'</em></small>
			</div>
			</div><br>
			';
		}

	}
	$output .= '<p id="btm"></p>';
	$query = "
	UPDATE chat_message
	SET status = '0'
	WHERE from_user_id = '".$to_user_id."'
	AND to_user_id = '".$from_user_id."'
	AND status = '1'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $output;
}

function get_user_name($user_id, $connect)
{
	$query = "SELECT * FROM users WHERE user_id = '$user_id'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row['full_name'];
	}
}

function count_unseen_message($from_user_id, $to_user_id, $connect)
{
	$query = "
	SELECT * FROM chat_message
	WHERE from_user_id = '$from_user_id'
	AND to_user_id = '$to_user_id'
	AND status = '1'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
	$output = '';
	if($count > 0)
	{
		$output = '<span class="w3-badge w3-green">'.$count.'</span>';
	}
	return $output;
}

function fetch_is_type_status($user_id, $connect)
{
	$query = "
	SELECT is_type FROM login_details
	WHERE user_id = '".$user_id."'
	ORDER BY last_activity DESC
	LIMIT 1
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		if($row["is_type"] == 'yes')
		{
			$output = ' - <small><em><span class="text-muted">Typing...</span></em></small>';
		}
	}
	return $output;
}


?>
