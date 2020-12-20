<?php if(!isset($_SESSION)) {session_start();}
if(isset($_SESSION['user_id'])) {} else{
  $_SESSION['msg']="Session Expired! Please login";
  echo '<a id="link" target="_parent" href="../../src/auth/login.php"></a>
<script type="text/javascript">
    document.getElementById("link").click();
</script>';}
?>
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

    <div class="container">
        <div class="side-nav-bar">
            <ul class="chat-side-nav">
              <a href="#exampleModal-4" data-toggle="modal" data-target="#exampleModal-4" data-whatever="@fat" id="create-user"><li id="create-chat"><i class="fa fa-pencil side-nav" aria-hidden="true" ></i>Create New</li></a>

              <li class="side-links" style="background-color: rgba(0, 255, 255, 0.2);"><a href="admin_dashboard.php" style="color: #00ffff;"><i class="fa fa-signal side-nav" aria-hidden="true"></i>Dashboard</a></li>


              <li class="side-links"><a href="../User/profile.php"><i class="fa fa-user side-nav" aria-hidden="true"></i>Your Profile</a></li>
              <li class="side-links"><a href="../User/forum.php"><i class="fa fa-users side-nav" aria-hidden="true"></i>Forum</a></li>
              <li class="side-links"><a href="../User/Chat/chat.php"><i class="fa fa-comments side-nav" aria-hidden="true"></i>Chat</a></li>
              <li class="side-links"><a href="../User/help_center.php"><i class="fa fa-globe side-nav" aria-hidden="true"></i>Help Center</a></li>
              <li class="side-links cog"><a href=""><i class="fa fa-cog side-nav" aria-hidden="true"></i>Settings</a></li>
              <li class="side-links"><a href="../../src/auth/test_auth.php?logout='1"><i class="fa fa-sign-out side-nav" aria-hidden="true"></i>Logout</a></li>
        </ul>
        </div>

        <!-- <div class="main" style="width: 83%;">
          <?php //include 'top_nav.php'; ?>
        </div> -->
    </div>
    <div class="head-dash">
        <h2>Welcome back, <?php echo $_SESSION['username']?></h2>
    </div>

            <div class="graph-users">
                <h3><a href="common_view.php?name=users" style="color: #fff">Total users</a></h3>
                <?php

                        $link = mysqli_connect("localhost", "root", "", "educo");

                        if(!$link){
                            die("Could not connect: ".mysqli_error());
                        }

                        $sql = "SELECT * FROM users";
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
            <div class="graph-posts">
                <h3 style="margin-top: 15px;"><a href="common_view.php?name=posts" style="color: #fff">Total posts</a></h3>
                    <?php
                    //session_start();
                    //$id = $_SESSION['userid'];
                    $uid = $_SESSION['user_id'];
                        $sql = "SELECT * FROM topics";
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
                <h3 style="margin-top: 15px;"><a href="common_view.php?name=reply" style="color: #fff">Total replies</a></h3>
                    <?php
                        $sql = "SELECT * FROM replies";
                        $result = mysqli_query($link, $sql);
                        $row_Count = mysqli_num_rows($result);

                        if($row_Count > 0){
                            echo $row_Count;
                        }else{
                            echo "<div id='replyCount'>0</div>";
                        }
                    ?>

            </div>

            <div class="graph-new-issues">
                <h3><a href="common_view.php?name=issues" style="color: #fff">New issues</a></h3>
                <?php

                        $sql = "SELECT * FROM issues WHERE issue_date = CURRENT_DATE() && status = 'Active'";
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

            <div class="total-comments">
                <h3><a href="common_view.php?name=comments" style="color: #fff">Total Comments</a></h3>
                <?php
                        $sql = "SELECT * FROM comments";
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

            <div class="total-categories">
                <h3><a href="common_view.php?name=categories" style="color: #fff">Total Categories</a></h3>
                <?php
                        $sql = "SELECT * FROM categories";
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

            <div class="flagged">
                <h3><a href="common_view.php?name=flagged" style="color: #fff">Flagged posts</a></h3>
                <?php



                        $sql = "SELECT * FROM flags WHERE flag_date = CURRENT_DATE() && status = 'Flagged'";
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

            <div class="graph">

                <h3 id="cont">Contributions</h3>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script>
                    google.charts.load('current', {
  packages: ['corechart', 'line']
});
google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {
  var data = new google.visualization.DataTable();
  data.addColumn('number', 'X');
  data.addColumn('number', 'contributions');

  data.addRows([
    [1, 1],
    [2, 20]

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

  /*var options = {
    hAxis: {
      title: 'Time'
    },
    vAxis: {
      title: 'Contributions'
    },
    backgroundColor: '#f1f8e9'
  };*/

  var chart = new google.visualization.LineChart(document.getElementById('graph-graph'));
  chart.draw(data, options);
}

                </script>
                <div id="graph-graph" style="width: 700px; height: 300px"></div>
            </div>



            <div class="posts-recent">
                <h3>Recent Posts</h3>
                <?php
                        $sql = "SELECT topic_subject FROM topics";
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
                            foreach ($res as $key => $value) {?>
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

        <style media="screen">
        /*Dashboard css*/
.head-dash h2{
margin-left: 17rem;
margin-top: -42rem;
}

.dash{

}

.graph{
box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.526);
margin-left: 16.8rem;
width: 54%;
height: 22rem;
margin-top: 0rem;
}

.graph-users{
border: 2px solid rgba(22, 180, 180);
margin-left: 17rem;
width: 13rem;
height: 5.5rem;
margin-top: 1rem;
text-align: center;
border-radius: 5px;
background-color: rgba(22, 180, 180);
color: white;
}

.graph-posts{
border: 2px solid rgba(22, 180, 180);
margin-left: 33rem;
width: 13rem;
height: 5.5rem;
margin-top: -5.7rem;
text-align: center;
border-radius: 5px;
background-color: rgba(22, 180, 180);
color: white;
}

.graph-reply{
border: 2px solid rgba(22, 180, 180);
margin-left: 49rem;
margin-top: -5.6rem;
width: 13rem;
height: 5.5rem;
text-align: center;
border-radius: 5px;
background-color: rgba(22, 180, 180);
color: white;
}

.graph-new-issues{
border: 2px solid rgba(22, 180, 180);
margin-left: 65rem;
margin-top: -5.7rem;
width: 13rem;
height: 5.5rem;
text-align: center;
border-radius: 5px;
background-color: rgba(22, 180, 180);
color: white;
}

.total-comments{
border: 2px solid rgba(22, 180, 180);
margin-left: 25rem;
margin-top: 2rem;
width: 13rem;
height: 5.5rem;
text-align: center;
border-radius: 5px;
background-color: rgba(22, 180, 180);
color: white;
margin-bottom: 11rem;
}

.total-categories{
border: 2px solid rgba(22, 180, 180);
margin-left: 48rem;
margin-top: -16.5rem;
width: 13rem;
height: 5.5rem;
text-align: center;
border-radius: 5px;
background-color: rgba(22, 180, 180);
color: white;
}

.flagged{
border: 2px solid rgba(22, 180, 180);
margin-left: 65rem;
margin-top: -5.5rem;
width: 13rem;
height: 5.5rem;
text-align: center;
border-radius: 5px;
background-color: rgba(22, 180, 180);
color: white;
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

.posts-recent{
/*border: 2px solid black;
width: 20%;
height: 22rem;
margin-left: 65rem;
text-align: center;
margin-top: -22rem;
overflow-x: auto;
overflow-y: auto;*/
box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.526);
border-radius: 5px;
width: 20%;
height: 22rem;
margin-left: 65rem;
text-align: center;
margin-top: -22rem;
overflow-x: auto;
overflow-y: auto;
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

.posts-recent .my_posts{
    /*padding: -5px;*/
    padding: 5px;
    color: white;
    background: rgba(22, 170, 180);
    margin-top: -6px;
}

.graph .graph-posts #postsCount, .graph .graph-reply #replyCount{
font-size: 30px;
margin-top: -0.5rem;

}
        </style>
</body>
</html>
