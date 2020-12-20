<?php if(!isset($_SESSION)) {session_start();}
if(isset($_SESSION['user_id'])) {} else{
  $_SESSION['msg']="Session Expired! Please login";
  echo '<a id="link" target="_parent" href="../../src/auth/login.php"></a>
<script type="text/javascript">
    document.getElementById("link").click();
</script>';}
include "Post_Com/config.php";?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Profile</title>
</head>
<body>

    <div class="container">
        <div class="side-nav-bar">
            <ul class="chat-side-nav">
              <a href="#exampleModal-4" data-toggle="modal" data-target="#exampleModal-4" data-whatever="@fat" id="create-user"><li id="create-chat"><i class="fa fa-pencil side-nav" aria-hidden="true" ></i>Create New</li></a>

                <li class="side-links"><a href="dashboard.php"><i class="fa fa-signal side-nav" aria-hidden="true"></i>Dashboard</a></li>
                <li class="side-links" style="background-color: rgba(0, 255, 255, 0.2);"><a href="profile.php" style="color: #00ffff;"><i class="fa fa-user side-nav" aria-hidden="true"></i>Your Profile</a></li>
                <li class="side-links"><a href="forum.php"><i class="fa fa-users side-nav" aria-hidden="true"></i>Forum</a></li>
                <li class="side-links"><a href="chat.php"><i class="fa fa-comments side-nav" aria-hidden="true"></i>Chat</a></li>
                <li class="side-links"><a href="help_center.php"><i class="fa fa-globe side-nav" aria-hidden="true"></i>Help Center</a></li>
                <li class="side-links cog"><a href=""><i class="fa fa-cog side-nav" aria-hidden="true"></i>Settings</a></li>
                <li class="side-links"><a href="../../src/auth/test_auth.php?logout='1"><i class="fa fa-sign-out side-nav" aria-hidden="true"></i>Logout</a></li>
            </ul>
      </div>

    <div class="main" style="width: 83%;">
  <?php include 'top_nav.php'; ?>
</div>
</div>

    <?php
            require_once("../../src/auth/db_connect.php");
            $link = connect();

            $uid = $_SESSION['user_id'];

            $query = "SELECT * FROM users WHERE user_id = '$uid'";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
        ?>

    <div class="content">
        <div class="pic-section">
            <img src="../../assets/images/<?php echo $row['user_image']?>">
            <div id="icon">
                <i class="fa fa-pencil"></i>
                <i class="fa fa-trash"></i>
            </div>
        </div>

        <div class="profile-info">
            <form method="POST" id="pwdf" action="../../src/auth/server_auth.php">
                <h2>Change Password</h2>
                <p style="color:brown"><?php if(isset($_SESSION['msg'])) {echo $_SESSION['msg']; unset($_SESSION['msg']);}?></p>

                <label>Old Password</label><br>
                <input type="password" name="o_pwd" required><br>

                <br><label>New Password</label><br>
                <input type="password" name="n_pwd" required><br>

                <br><label>Confirm New Password</label><br>
                <input type="password" name="c_npwd" required><br>
                <br>
                <!--<br><a href="#">Change Password</a>
                <a href="#">Save</a>-->
                <input type="text" name="save_pwd" hidden>
                <div onClick='submitDetailsForm()' style="border-radius: 50px; cursor: pointer; background-color: rgba(22, 180, 180); width: 120px; padding-top: 15px; padding-bottom: 15px; padding-left: 35px; padding-right: 5px;">
                                <i class="fa fa-floppy-o" aria-hidden="true" style="color: white;"></i><a style="text-decoration: none; margin-left: 10px; color: white;">Save</a>
                                <!--<a href="#" onclick="this.parentNode.parentNode.submit();" style="text-decoration: none; margin-left: 10px; color: white;" name="save"><input type="submit" name="Save"></a>-->
                </div>


                <div style="border-radius: 50px; background-color: rgba(22, 180, 180); cursor: pointer; width: 120px; padding-top: 15px; padding-bottom: 15px; padding-left: 30px; padding-right: 10px; margin-top: -3rem; margin-left: 15rem;">
                                <i class="fa fa-times" aria-hidden="true" style="color: white;"></i> <a href="profile.php" style="text-decoration: none; margin-left: 10px; color: white;">Cancel</a>
                </div>
            </form>
            <script language="javascript" type="text/javascript">
                function submitDetailsForm() {
                   $("#pwdf").submit();
                }
            </script>

             </div>
         </form>
    </div>

</body>
</html>
