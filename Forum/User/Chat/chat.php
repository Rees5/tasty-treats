<?php include '../header.php';include('database_connection.php');
include '../Post_Com/time.php';
 ?>
<?php if(!isset($_SESSION)) {session_start();}if(isset($_SESSION['user_id'])) {} else{
  $_SESSION['msg']="Session Expired! Please login";
  echo '<a id="link" target="_parent" href="../../../src/auth/login.php"></a>

<script type="text/javascript">
    document.getElementById("link").click();
</script>';} ?>
    <div class="container">
        <div class="side-nav-bar">
            <ul class="chat-side-nav">
              <a href="../new_topic.php" id="create-user"><li id="create-chat"><i class="fa fa-pencil side-nav" aria-hidden="true" ></i>Create New</li></a>

                <li class="side-links"><?php $usertype = $_SESSION['usertype']; if($usertype == 'Admin'){echo "<a href='../../Admin/admin_dashboard.php'><i class='fa fa-signal side-nav' aria-hidden='true'></i>Dashboard</a>";}else{echo "<a href='dashboard.php'><i class='fa fa-signal side-nav' aria-hidden='true'></i>Dashboard</a>";}?></li>

                <li class="side-links"><a href="../profile.php"><i class="fa fa-user side-nav" aria-hidden="true"></i>Your Profile</a></li>
                <li class="side-links"><a href="../forum.php"><i class="fa fa-users side-nav" aria-hidden="true"></i>Forum</a></li>
                <li class="side-links" style="background-color: rgba(0, 255, 255, 0.2);"><a href="" style="color: #00ffff;"><i class="fa fa-comments side-nav" aria-hidden="true"></i>Chat</a></li>
                <li class="side-links"><a href="../help_center.php"><i class="fa fa-globe side-nav" aria-hidden="true"></i>Help Center</a></li>
                <li class="side-links cog"><a href=""><i class="fa fa-cog side-nav" aria-hidden="true"></i>Settings</a></li>
                <li class="side-links"><a href="../../../src/auth/test_auth.php?logout='1"><i class="fa fa-sign-out side-nav" aria-hidden="true"></i>Logout</a></li>
            </ul>
        </div>
        <div class="main" style="width: 100%;">
          <div class="top-nav" style="border-bottom: 1px solid rgba(192, 192, 192, 0.2);">
                  <i class="fa fa-search" aria-hidden="true"></i>
                  <input type="text" placeholder="Search" class="search-bar">
                  <ul class="chat-top-nav">
                      <li class="top-links"><a href="">Home</a></li>
                      <li class="top-links"><a href="">Chats</a></li>
                      <li class="top-links"><a href="">About Us</a></li>
      <li class="top-links"><a href=""><?php if (isset($_SESSION['username'])) {
      echo $_SESSION['username'];
      } else {
      echo '<a href="auth/login.php">Guest</a>';
      } ?></a></li>
                  </ul>
                  <img width="50px" height="50px" src="../../../assets/img/user.png" alt="User Profile" class="session-profile">
          </div>

            <div class="chat-area" style="height: 636px;">
                <div class="topics-bar" >
                    <h3 style="padding: 5px; padding-left: 15px;">Chats</h3>
                    <div id="user_details1" style="margin-bottom:10px"></div>
                    <h3 style="padding: 5px; padding-left: 15px;">Contacts</h3>
                    <div id="user_details" style="margin-bottom:10px"></div>
                    <p></p><p></p>
                </div>
                <style media="screen">
                  .chat-view{
                    height: 400px !important;
                  }
                </style>
                <div class="chat-view" style="margin-left: 185px;">
                    <ul class="chat-links">
                        <li id="all" style="cursor:pointer">All messages</li>
                        <li>Archive</li>
                        <li>Deleted</li>
                    </ul>
                    <script>
                		document.getElementById("all").onclick = function() {
                		//document.getElementById("top_'.$row['user_id'].'").style.color = "brown";
                		var el = document.getElementById("ifplayer2");
                		el.src = "chats.php";

                		}
                		</script>
                    <div class="text-box" style="padding: 10px; height: 465px;">
                      <iframe id="ifplayer2" width='100%' height='auto' marginwidth='0' marginheight='0' frameborder='0' allowfullscreen='yes' src='index.php?'></iframe>
                      </div>
                </div>
            </div>
</div>
    </div>
    <?php include '../newpost.php'; ?>
    </div>
    <script>
      $(document).ready(function(){
        //$('.desc1').find('*').addClass('desc');
        currentLocation1 = localStorage.prevUrl1 || 'index.php?';
        function getParameterByName(name, url = currentLocation1) {
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

        //var search_id = getParameterByName('string');
        var iframe = document.getElementById("ifplayer2");

          // Adjusting the iframe height onload event
          iframe.onload = function(){
              iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
          }
          currentLocation1 = localStorage.prevUrl1 || 'index.php?';
          $('#ifplayer2').attr('src', localStorage.prevUrl1);
          $('#ifplayer2').load(function() {
              localStorage.prevUrl1 = $(this)[0].contentWindow.location.href;
          });

      });
      function fetch_user()
    	{
        var action = "user";
    		$.ajax({
    			url:"fetch_user.php",
    			method:"POST",
          data:{action:action},
    			success:function(data){
    				$('#user_details').html(data);
    			}
    		})
    	}
      function fetch_message()
    	{
        var action = "message";
    		$.ajax({
    			url:"fetch_user.php",
    			method:"POST",
          data:{action:action},
    			success:function(data){
    				$('#user_details1').html(data);
    			}
    		})
    	}
      fetch_message();
      fetch_user();
      setInterval(function(){
    		//update_last_activity();
        fetch_message();
    		fetch_user();
    	}, 5000);
    </script>
<style>
.selected{
  color: brown;
  font-weight: bold;
}
div.topic:hover{
  background-color: rgba(0, 255, 255, 0.2);
  cursor: pointer;

}
</style>
</body>
</html>
