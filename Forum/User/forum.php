<?php
if(!isset($_SESSION)) {session_start();}
if(isset($_SESSION['user_id'])) {} else{
  $_SESSION['msg']="Session Expired! Please login";
  echo '<a id="link" target="_parent" href="../../src/auth/login.php"></a>

<script type="text/javascript">
    document.getElementById("link").click();
</script>';}
include 'Post_Com/config.php';
include 'header.php';
?>

    <div class="container">
        <div class="side-nav-bar">
            <ul class="chat-side-nav">
                <a href="new_topic.php" id="create-user"><li id="create-chat"><i class="fa fa-pencil side-nav" aria-hidden="true" ></i>Create New</li></a>


                <li class="side-links"><?php $usertype = $_SESSION['usertype']; if($usertype == 'Admin'){echo "<a href='../Admin/admin_dashboard.php'><i class='fa fa-signal side-nav' aria-hidden='true'></i>Dashboard</a>";}else{echo "<a href='dashboard.php'><i class='fa fa-signal side-nav' aria-hidden='true'></i>Dashboard</a>";}?></li>

                <li class="side-links"><a href="profile.php"><i class="fa fa-user side-nav" aria-hidden="true"></i>Your Profile</a></li>
                <li class="side-links" style="background-color: rgba(0, 255, 255, 0.2);"><a href="forum.php" style="color: #00ffff;"><i class="fa fa-users side-nav" aria-hidden="true"></i>Forum</a></li>
                <li class="side-links"><a href="Chat/chat.php" ><i class="fa fa-comments side-nav" aria-hidden="true"></i>Chat</a></li>
                <li class="side-links"><a href="help_center.php"><i class="fa fa-globe side-nav" aria-hidden="true"></i>Help Center</a></li>
                <li class="side-links cog"><a href=""><i class="fa fa-cog side-nav" aria-hidden="true"></i>Settings</a></li>
                <li class="side-links"><a href="../../src/auth/test_auth.php?logout='1"><i class="fa fa-sign-out side-nav" aria-hidden="true"></i>Logout</a></li>
            </ul>
        </div>
        <div class="main" style="width: 83%;">
          <?php include 'top_nav.php'; ?>
            <div class="chat-area" style="height: 636px;">
                <div class="topics-bar">
                    <h3 style="padding: 5px; padding-left: 15px;">Topics</h3>
                    <?php
                    $sqlby1="select * from topics order by topic_id desc";
                    $statementby1 = $connect->prepare($sqlby1);
                    if($statementby1->execute()){
                      $resultby1 = $statementby1->fetchAll();
                      foreach($resultby1 as $rowby1)
                      {
                      echo '<p style="width: 190px;word-wrap: break-word;
                      text-overflow: ellipsis;" id='.$rowby1['topic_id'].' class="topic">';
                      echo html_entity_decode($rowby1["topic_subject"]).'</p></b>';
                      echo "
                      <script>
                      document.getElementById('".$rowby1['topic_id']."').onclick = function() {
                      var el = document.getElementById('ifplayer2');
                      el.src = 'Post_Com/index.php?id=".$rowby1['topic_id']."';
                    }
                      </script>";
                    }
                    }else {
                      echo 'No topics';
                    }
                     ?>
                </div>
                <div class="chat-view" style="margin-left: 210px;">
                  <iframe id="ifplayer2" width='100%' height='auto' marginwidth='0' marginheight='0' frameborder='0' allowfullscreen='yes' src='Post_Com/index.php?'></iframe>
                  <script>
                     $(document).ready(function () {
                         $('#ifplayer2').on('load', function () {
                             $('#loader1').hide();
                         });
                     });
                 </script>
  <script>
  $(document).ready(function() {

      function getParameterByName(name, url = localStorage.prevUrl) {
      name = name.replace(/[\[\]]/g, '\\$&');
      var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
          results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, ' '));
      }


      currentLocation1 = localStorage.prevUrl || 'Post_Com/index.php?';
      $('#ifplayer2').attr('src', currentLocation1);
      $('#ifplayer2').load(function() {
          localStorage.prevUrl = $(this)[0].contentWindow.location.href;
          var p_id = getParameterByName('id');
          if(p_id==''){
            $("p").removeClass("selected");
          } else {
            $("p").removeClass("selected");
            $('#'+p_id).addClass("selected");
          }
      });
      $("p.topic").click(function(e){
         // A LI is clicked
         // Set all other li's to not selected
         $("p").removeClass("selected");

         // Add selected class to the clicked li
         $(this).addClass("selected");
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
        <?php include 'newpost.php'; ?>
    </div></div>




</body>
</html>
