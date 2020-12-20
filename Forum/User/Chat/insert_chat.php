<?php

//insert_chat.php

include('database_connection.php');
include '../Post_Com/time.php';
session_start();

$data = array(
	':to_user_id'		=>	$_POST['to_user_id'],
	':from_user_id'		=>	$_SESSION['user_id'],
	':chat_message'		=>	$_POST['chat_message'],
	':status'			=>	'1',
	':time' => getTime()
);

$query = "
INSERT INTO chat_message
(to_user_id, from_user_id, chat_message,timestamp, status)
VALUES (:to_user_id, :from_user_id, :chat_message,:time, :status)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
	echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);
}

?>
