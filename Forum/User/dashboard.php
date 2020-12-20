<?php if(!isset($_SESSION)) {session_start();}
if(isset($_SESSION['user_id'])) {} else{
  $_SESSION['msg']="Session Expired! Please login";
  echo '<a id="link" target="_parent" href="../../../src/auth/login.php"></a>

<script type="text/javascript">
    document.getElementById("link").click();
</script>';}
include "Post_Com/config.php";?>

<?php include 'header.php'; ?>
    <div class="container">
        <div class="side-nav-bar">
            <ul class="chat-side-nav">
              <a href="#exampleModal-4" data-whatever="@fat" id="create-user"><li id="create-chat"><i class="fa fa-pencil side-nav" aria-hidden="true" ></i>Create New</li></a>

                <li class="side-links" style="background-color: rgba(0, 255, 255, 0.2);"><?php $usertype = $_SESSION['usertype']; if($usertype == 'Admin'){echo "<a href='../Admin/admin_dashboard.php' style='color: #00ffff;'><i class='fa fa-signal side-nav' aria-hidden='true'></i>Dashboard</a>";}else{echo "<a href='dashboard.php' style='color: #00ffff;'><i class='fa fa-signal side-nav' aria-hidden='true'></i>Dashboard</a>";}?></li>
                <li class="side-links"><a href="profile.php"><i class="fa fa-user side-nav" aria-hidden="true"></i>Your Profile</a></li>
                <li class="side-links"><a href="forum.php"><i class="fa fa-users side-nav" aria-hidden="true"></i>Forum</a></li>
                <li class="side-links"><a href="Chat/chat.php"><i class="fa fa-comments side-nav" aria-hidden="true"></i>Chat</a></li>
                <li class="side-links"><a href="help_center.php"><i class="fa fa-globe side-nav" aria-hidden="true"></i>Help Center</a></li>
                <li class="side-links cog"><a href=""><i class="fa fa-cog side-nav" aria-hidden="true"></i>Settings</a></li>
                <li class="side-links"><a href="../../src/auth/test_auth.php?logout='1"><i class="fa fa-sign-out side-nav" aria-hidden="true"></i>Logout</a></li>
            </ul>
        </div>

        <div class="main" style="width: 83%;">
          <?php include 'top_nav.php'; ?>
        </div>
    </div>
    <div class="head-dash">
        <h2>Dashboard</h2>
    </div>

        <section class="graph">
            <div class="graph-posts">
                <h3 style="margin-top: 15px;">Total posts</h3>
                    <?php
                    //session_start();
                    //$id = $_SESSION['userid'];

                        $link = mysqli_connect("localhost", "root", "", "educo");


                        if(!$link){
                            die("Could not connect: ".mysqli_error());
                        }

                        $sql = "SELECT * FROM topics WHERE topic_by ='".$_SESSION['user_id']."'";
                        $result = mysqli_query($link, $sql);
                        $row_Count = mysqli_num_rows($result);

                        if($row_Count > 0){
                            echo $row_Count;
                        }else{
                            //echo 0;
                            echo "<div id='postsCount'>0</div>";
                        }
                    ?>

            </div>
            <div class="graph-reply">
                <h3 style="margin-top: 15px;">Total replies</h3>
                    <?php
                        if(!$link){
                            die("Could not connect: ".mysqli_error());
                        }

                        $sql = "SELECT * FROM replies WHERE reply_by ='".$_SESSION['user_id']."'";
                        $result = mysqli_query($link, $sql);
                        $row_Count = mysqli_num_rows($result);

                        if($row_Count > 0){
                            echo $row_Count;
                        }else{
                            echo "<div id='replyCount'>0</div>";
                        }
                    ?>

            </div>

                <h3 id="cont">Contributions</h3>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script>
                    google.charts.load('current', {
  packages: ['corechart', 'line']
});
google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {
  var data = new google.visualization.DataTable();
  data.addColumn('date', 'Date');
  data.addColumn('number', 'Contributions');
  data.addRows([
      [new Date(2020, 0, 3), 0]
    <?php
       $sql2 = "SELECT  DATE(comment_date) topic_dt, COUNT(comment_by) totalCount FROM comments
       WHERE comment_by='".$_SESSION['user_id']."' GROUP BY  DATE(comment_date)";
       $result2 = mysqli_query($link, $sql2);
       foreach($result2 as $row){
           echo ",[new Date(".date("Y,m,d", strtotime('-1 month', strtotime($row['topic_dt'])))."), ".$row['totalCount']."]";
       }
    ?>
    //[new Date(2020-11-09), 5],
    //[new Date(2015, 0, 3), 6]

  ]);

  var options = {
  scales: {
    xAxes: [
      {
        type: "time",
        time: {
          displayFormats: {
            hour: "MMM DD"
          },
          tooltipFormat: "MMM D"
        }
      }
    ],
    yAxes: [
      {
        ticks: {
          beginAtZero: true
        }
      }
    ]
  }
};

  var options = {
    hAxis: {
      title: 'Time'
    },
    vAxis: {
      title: 'Contributions'
    },
    legend: { position: 'bottom', alignment: 'start' }
  };

  var chart = new google.visualization.LineChart(document.getElementById('graph-graph'));
  chart.draw(data, options);
}

                </script>
                <div id="graph-graph" style="width: 600px; height: 300px"></div>
        </section>

        <section class="posts">
            <div class="posts-recent">
                <h3>Recent Posts</h3>
                <?php
                        if(!$link){
                            die("Could not connect: ".mysqli_error());
                        }

                        $sql = "SELECT topic_subject FROM topics WHERE topic_by ='".$_SESSION['user_id']."'";
                        $result = mysqli_query($link, $sql);

                        function getData($result){
                            $rows = array();

                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $rows[] = $row;
                                }
                                return $rows;
                            }
                        }
                        $res = getData($result);

                        if($res > 0){
                            foreach ($res as $key => $value) {
                                //echo $value['topic_subject'];?>
                                <p class="my_posts"><?php echo $value['topic_subject'];?></p>
                                <?php echo "<br>";
                            }
                        }else{
                            echo "<div id='noPosts'>No recent posts</div>";
                        }
                    ?>
            </div>
            <div class="posts-calendar">
                <p id="monthName"></p>
                <p id="dayName"></p>
                <p id="dayNumber"></p>
                <p id="year"></p>
            </div>
            <script>
                const lang = navigator.language;
                let date = new Date();
                let dayNumber = date.getDate();
                let month = date.getMonth();
                let dayName = date.toLocaleString(lang, {weekday: 'long'});
                let monthName = date.toLocaleString(lang, {month: 'long'})
                let year = date.getFullYear();

                document.getElementById('monthName').innerHTML = monthName;
                document.getElementById('dayName').innerHTML = dayName;
                document.getElementById('dayNumber').innerHTML = dayNumber;
                document.getElementById('year').innerHTML = year;

            </script>
        </section>
        <style media="screen">
        /*Dashboard css*/
.head-dash h2{
margin-left: 17rem;
margin-top: -38rem;
}

.dash{

}

.graph{
box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.526);
margin-left: 16.5rem;
width: 45%;
height: 30rem;
}

.graph .graph-posts{
border: 2px solid rgba(22, 180, 180);
margin-left: 3rem;
width: 12rem;
height: 5.5rem;
margin-top: 1rem;
text-align: center;
border-radius: 5px;
background-color: rgba(22, 180, 180);
color: white;
}

.graph .graph-reply{
border: 2px solid rgba(22, 180, 180);
margin-left: 22rem;
margin-top: -5.6rem;
width: 12rem;
height: 5.5rem;
text-align: center;
border-radius: 5px;
background-color: rgba(22, 180, 180);
color: white;
}

.graph .graph-graph{
border: 2px solid black;
margin-left: 5px;
margin-top: 3rem;
width: 70%;
height: 20rem;
text-align: center;
}

.graph #cont{
text-align: center;

}

.posts{
box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.526);
float: right;
width: 33%;
margin-top: -30.2rem;
margin-right: 15px;
height: 30rem;
}

.posts .posts-recent{
/*border: 2px solid black;
width: 50%;
height: 10rem;
margin-left: 6rem;
text-align: center;
margin-top: 1rem;*/
box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.526);
border-radius: 5px;
width: 50%;
height: 10rem;
margin-left: 6rem;
text-align: center;
margin-top: 1rem;
overflow-x: auto;
overflow-y: auto;
}
.posts .posts-recent .my_posts{
   padding: 5px;
    color: white;
    background: rgba(22, 170, 180);
    margin-top: -6px;
}

.posts .posts-calendar{

margin-top: 2rem;
margin-left: 8rem;
text-align: center;
width: 40%;
height: 13rem;
background: rgb(255, 255, 255);
border-radius: 10px;
overflow: hidden;
box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.526);
}

.posts .posts-calendar #monthName{
position: relative;
background: rgba(22, 180, 180);
padding: 5px 10px;
font-size: 32px;
font-weight: 700;
color: white;
}

.posts .posts-calendar #dayName{
margin-top: 10px;
font-size: 20px;
font-weight: 289;
color: rgb(100, 97, 97);
}

.posts .posts-calendar #dayNumber{
line-height: 1em;
font-size: 20px;
font-weight: 289;
color: rgba(22, 180, 180);
}

.posts .posts-recent #noPosts{
font-size: 20px;
}

.graph .graph-posts #postsCount, .graph .graph-reply #replyCount{
font-size: 30px;
margin-top: -0.5rem;

}
        </style>
</body>
</html>
