<?php if(!isset($_SESSION)) {session_start();}?>
    <div class="top-nav" style="border-bottom: 1px solid rgba(192, 192, 192, 0.2);">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input id="search" type="text" placeholder="Search" class="search-bar">
            <ul class="chat-top-nav">
                <li class="top-links"><a href="../../index.php">Home</a></li>
                <li class="top-links"><a href="Chat/chat.php">Chats</a></li>
                <li class="top-links"><a href="">About Us</a></li>
<li class="top-links"><a href=""><?php if (isset($_SESSION['username'])) {
echo $_SESSION['username'];
} else {
echo '<a href="auth/login.php">Guest</a>';
} ?></a></li>
            </ul>
            <img width="50px" height="50px" src="../../assets/img/user.png" alt="User Profile" class="session-profile">
    </div>
<script type="text/javascript">
$(document).ready(function(){
  $('#search').keyup(function(){
    var query = $('#search').val();
    var el = document.getElementById('ifplayer2');
    el.src = '../search/index.php?string='+query;
    //load_data(1, query);
  });
  });
  </script>
</script>
