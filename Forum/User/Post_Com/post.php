<?php
include "config.php";
include 'time.php';
// Insert record
if(isset($_POST['action'])&&$_POST['action']!= ''){
	 if ($_POST['action']=="comment") {
		$comment_message=$_POST['long_desc'];
 		$comment_topic=$_POST['comment_topic'];
 		$comment_by=$_POST['comment_by'];
 		echo "Message: ".$comment_message;
     echo "<br>Topic: ".$comment_topic;
 		echo "By: ".$comment_by;
 		if($comment_message != ''){
 			mysqli_query($con, "INSERT INTO comments(comment_message,comment_topic,comment_by,comment_date) VALUES('".$comment_message."','".$comment_topic."','".$comment_by."','".getTime()."') ");
 			//header('location: index.php');
		}
		} else if ($_POST['action']=="reply") {
		$reply_content=$_POST['texta'];
		$reply_to=$_POST['reply_to'];
		$reply_by=$_POST['reply_by'];
		echo "Reply: ".$reply_content;
		echo "<br>to: ".$reply_to;
		echo "By: ".$reply_by;
		if($reply_content != ''){
			mysqli_query($con, "INSERT INTO replies(reply_content,reply_to,reply_by,reply_date) VALUES('".$reply_content."','".$reply_to."','".$reply_by."','".getTime()."') ");
			//header('location: index.php');
	}

		} else {
			echo "Message Blank";
		}

	} if(isset($_POST['action2'])&&$_POST['action2']!= ''){
		  $long_desc=$_POST['long_desc'];
			$short_desc=$_POST['short_desc'];
			$topic_category=$_POST['topic_category'];
			$topic_by=$_POST['topic_by'];

			/*echo $short_desc."<p></p>";
			echo $topic_category."<p></p>";
			echo $long_desc."<p></p>";
			echo $topic_by."<p></p>";*/
			if($long_desc != ''){
				mysqli_query($con, "INSERT INTO topics(topic_subject,topic_date,topic_category,topic_by,topic_description) VALUES('".$short_desc."','".getTime()."','".$topic_category."','".$topic_by."','".$long_desc."') ");
				//header('location: index.php');
		 }
		}
		if(isset($_POST['action3'])&&$_POST['action3']!= ''){
			  $long_desc=$_POST['long_desc'];
				$short_desc=$_POST['problem_id'];

				/*echo $short_desc."<p></p>";
				echo $topic_category."<p></p>";
				echo $long_desc."<p></p>";
				echo $topic_by."<p></p>";*/
				if($long_desc != ''){
					mysqli_query($con, "INSERT INTO flags(topic_id,description) VALUES('".$short_desc."','".$long_desc."') ");
					//header('location: index.php');
			 }
			}

	 else {
		echo "Not Set";
	}
echo mysqli_error($con);
?>
