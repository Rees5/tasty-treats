<?php
if(!isset($_SESSION)) {session_start();}
if(isset($_SESSION['user_id'])) {} else{
  $_SESSION['msg']="Session Expired! Please login";
  echo '<a id="link" target="_parent" href="../../src/auth/login.php"></a>

<script type="text/javascript">
    document.getElementById("link").click();
</script>';}?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
<?php
if(isset($_GET['name'])){


?>

    <div class="container">
        <div class="side-nav-bar">
            <ul class="chat-side-nav">
                <a href="new_topic.php" id="create-user"><li id="create-chat"><i class="fa fa-pencil side-nav" aria-hidden="true" ></i>Create New</li></a>


            <li class="side-links" style="background-color: rgba(0, 255, 255, 0.2);"><a href="admin_dashboard.php" style="color: #00ffff;"><i class="fa fa-signal side-nav" aria-hidden="true"></i>Dashboard</a></li>


                <li class="side-links"><a href="../User/profile.php"><i class="fa fa-user side-nav" aria-hidden="true"></i>Your Profile</a></li>
                <li class="side-links"><a href="../User/forum.php"><i class="fa fa-users side-nav" aria-hidden="true"></i>Forum</a></li>
                <li class="side-links"><a href="../User/Chat/chat.php"><i class="fa fa-comments side-nav" aria-hidden="true"></i>Chat</a></li>
                <li class="side-links"><a href="../User/help_center.php"><i class="fa fa-globe side-nav" aria-hidden="true"></i>Help Center</a></li>
                <li class="side-links cog"><a href=""><i class="fa fa-cog side-nav" aria-hidden="true"></i>Settings</a></li>
                <li class="side-links"><a href="../../src/auth/test_auth.php?logout='1"><i class="fa fa-sign-out side-nav" aria-hidden="true"></i>Logout</a></li>
        </ul>
        </div>
        <div class="main" style="width: 83%;">
            <div class="chat-area" style="height: 636px;">
                <div class="chat-view" style="margin-left: 10px;">
                  <iframe id="ifplayer2" width='100%' height='auto' marginwidth='0' marginheight='0' frameborder='0' allowfullscreen='yes' src="common.php?name=<?php echo $_GET['name']; ?>"></iframe>
                  <script>
                     $(document).ready(function () {
                         $('#ifplayer2').on('load', function () {
                             $('#loader1').hide();
                         });
                     });
                 </script>
  <script>
  $(document).ready(function() {

      function getParameterByName(name, url = localStorage.prevUrlr) {
      name = name.replace(/[\[\]]/g, '\\$&');
      var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
          results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, ' '));
      }


      currentLocation1 = localStorage.prevUrlr || 'Post_Com/index.php?';
      $('#ifplayer2').attr('src', currentLocation1);
      $('#ifplayer2').load(function() {
          localStorage.prevUrlr = $(this)[0].contentWindow.location.href;
      });
  });

  var iframe = document.getElementById("ifplayer2");

    // Adjusting the iframe height onload event
    iframe.onload = function(){
        iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
    }


  </script>
  <style>
  .selected{
    color: brown;
    font-weight: bold;
  }
  p.topic:hover{
    background-color: rgba(0, 255, 255, 0.2);
    cursor: pointer;

  }
    #ifplayer2 {
      min-height:1500px;

  }

    body{
      background-color: inherit;
    }
  </style>
            </div>
        </div>
    </div></div>

<?php } else{
  echo "Bad Gateway";
} ?>

<style media="screen">

/*Tables*/
.users{
  margin-top: -1rem;
  margin-left: 15rem;
  text-align: center;
  border-collapse: collapse;
}

.users table{
  width: 90%;
  margin-left: 1rem;
  margin-top: 1rem;
  border-collapse: collapse;
}

.users table thead tr th{
  margin: 2rem;
  background-color: rgba(22, 180, 180) !important;
  color: #fff;
  padding: 7px;
}

.users table tbody td{
  padding: 10px;

}

.users table td{
  margin-right: groove;
}

table tbody tr:nth-child(odd){
  background-color: #e0e5d5;
}

.users table tbody tr td a{
  text-decoration: none;
  padding: 7px 13px;
  background-color: grey;
  color: white;
  border-radius: 5px;
}

</style>
</body>
</html>
