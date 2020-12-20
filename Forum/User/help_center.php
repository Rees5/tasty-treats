<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Help Center</title>
</head>
<body>
	<?php if(!isset($_SESSION)) {session_start();}?>
	<div class="container">
	        <div class="side-nav-bar">
	            <ul class="chat-side-nav">
	              <a href="#exampleModal-4" data-toggle="modal" data-target="#exampleModal-4" data-whatever="@fat" id="create-user"><li id="create-chat"><i class="fa fa-pencil side-nav" aria-hidden="true" ></i>Create New</li></a>

	                <li class="side-links"><?php $usertype = $_SESSION['usertype']; if($usertype == 'Admin'){echo "<a href='../Admin/admin_dashboard.php'><i class='fa fa-signal side-nav' aria-hidden='true'></i>Dashboard</a>";}else{echo "<a href='dashboard.php'><i class='fa fa-signal side-nav' aria-hidden='true'></i>Dashboard</a>";}?></li>
	           


	                <li class="side-links"><a href="profile.php"><i class="fa fa-user side-nav" aria-hidden="true"></i>Your Profile</a></li>
	                <li class="side-links"><a href="forum.php"><i class="fa fa-users side-nav" aria-hidden="true"></i>Forum</a></li>
	                <li class="side-links"><a href="Chat/chat.php"><i class="fa fa-comments side-nav" aria-hidden="true"></i>Chat</a></li>
	                <li class="side-links" style="background-color: rgba(0, 255, 255, 0.2);"><a href="help_center.php" style="color: #00ffff;"><i class="fa fa-globe side-nav" aria-hidden="true"></i>Help Center</a></li>
	                <li class="side-links cog"><a href=""><i class="fa fa-cog side-nav" aria-hidden="true"></i>Settings</a></li>
	                <li class="side-links"><a href="../../src/auth/test_auth.php?logout='1"><i class="fa fa-sign-out side-nav" aria-hidden="true"></i>Logout</a></li>
	            </ul>
	        </div>

	    <div class="main" style="width: 83%;">
	  		<?php include 'top_nav.php'; ?>
			</div>
	</div>

	<div class="contact-form">
		<form method="POST" action="../../src/auth/server_auth.php">
			<h1>Contact Form</h1>
			<p style="color: brown"><?php if(isset($_SESSION['msg'])) {echo $_SESSION['msg']; unset($_SESSION['msg']); echo "<br>";}?></p>
			<label style="font-size: 20px;">Issue</label><br>
			<input type="text" name="issue" required id="issue_iss"><br><br>
			<label style="font-size: 20px;">Description</label><br>
			<textarea required name="desc"></textarea><br>
			<br><input type="submit" name="sub">
		</form>
	</div>

	<?php
		include_once '../../src/auth/db_connect.php';
		$link = connect();
		//session_start();
		//if(!isset($_SESSION)) {session_start();}
		if(isset($_SESSION['user_id'])){
			$uid = $_SESSION['user_id'];
		}
		$uid = $_SESSION['user_id'];

        $query = "SELECT issue_name, issue_desc FROM issues LIMIT 2";
        $result = mysqli_query($link, $query);
        $res = getData($result);
		?>

	<div class="contact-faqs">
		<h2>FAQs</h2>
		<div class="faqs">
			<?php
			if($res > 0){
                foreach ($res as $key => $value) {
                    ?>
                    <div class="faqs">
                    <details>
                    	<summary><?php echo $value['issue_name'];?></summary>
	                    <p class="iss"><?php echo $value['issue_desc'];?></p>
	                    <?php echo "<br>";?>
                    </details>
                    </div>
                <?php }
                }else{?>
                	<p class="noPosts"><?php echo "No issues posted"?></p>
                <?php }
			?>
		</div>
	</div>

	<div class="my_issues">
		<h2>My Issues</h2>
		<p>
			<?php
				include_once '../../src/auth/db_connect.php';
				$link = connect();
				//session_start();
				//if(!isset($_SESSION)) {session_start();}
				if(isset($_SESSION['user_id'])){
					$uid = $_SESSION['user_id'];
				}
				$uid = $_SESSION['user_id'];

		        $sql = "SELECT issue_name, issue_desc FROM issues WHERE issue_by = '$uid' LIMIT 5";
		        $result = mysqli_query($link, $sql);
		        $res = getData($result);

				if($res > 0){
	                foreach ($res as $key => $value) {
	                    ?>
	                    <div class="faqs">
	                    <details>
	                    	<summary><?php echo $value['issue_name'];?></summary>
		                    <p class="iss"><?php echo $value['issue_desc'];?></p>
		                    <?php echo "<br>";?>
	                    </details>
	                    </div>
	                <?php }
	                }else{?>
	                	<p class="noPosts"><?php echo "No issues posted"?></p>
	                <?php }
			?>
		</p>
	</div>

	<div class="resolved_issues">
		<h2>Resolved Issues</h2>
		<p>
			<?php
				include_once '../../src/auth/db_connect.php';
				$link = connect();
				//session_start();
				//if(!isset($_SESSION)) {session_start();}
				if(isset($_SESSION['user_id'])){
					$uid = $_SESSION['user_id'];
				}
				$uid = $_SESSION['user_id'];

		        $sql = "SELECT issue_name, issue_desc FROM issues WHERE issue_by = '$uid' && status = 'Resolved'  ORDER BY issue_id DESC";
		        $result = mysqli_query($link, $sql);
		        $res = getData($result);

				if($res > 0){
	                foreach ($res as $key => $value) {
	                    ?>
	                    <div class="faqs">
	                    <details>
	                    	<summary><?php echo $value['issue_name'];?></summary>
		                    <p class="iss"><?php echo $value['issue_desc'];?></p>

		                    <?php echo "<br>";?>
	                    </details>
	                    </div>
	                <?php }
	                }else{?>
	                	<p class="noPosts"><?php echo "No issues Resolved"?></p>
	                <?php }
			?>
		</p>
	</div>

</div>
</body>
</html>
