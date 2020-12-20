<?php if(!isset($_SESSION)) {session_start();}
if(isset($_SESSION['user_id'])) {} else{
  $_SESSION['msg']="Session Expired! Please login";
  echo '<a id="link" target="_parent" href="../../../src/auth/login.php"></a>

<script type="text/javascript">
    document.getElementById("link").click();
</script>';}
include "config.php";?>
<?php include 'time.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="../../../ckeditor/ckeditor.js" ></script>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <title>Chats</title>
</head>
<body>
  <script>
  function title(str) {
  return str.replace(/(^|\s)\S/g, function(t) { return t.toUpperCase() });
}
  function GetFilename(url)
{
 if (url)
 {
    var m = url.toString().match(/.*\/(.+?)\./);
    if (m && m.length > 1)
    {
       return title(m[1]);
    }
 }
 return "";
}
  $(document).ready(function() {

    document.title = GetFilename(window.location.href);
  });
  </script>

  <body>
    <style>
        .preloader {
            width: 100%;
            height: 100%;
            position: fixed;

            background: white;
            z-index: 99999999;
        }

        #preloader-logo {
            position: absolute;

            margin: auto;
        }

        .loading-msg {
            width: 100%;
            font-size: 0.75em;
            color: #555;
            position: absolute;
            left: 50%;
            transform: translate(-50%, 50%);
            text-align: center;
        }

        .spinner {
            width: 80px;
            height: 80px;
            border: 2px solid #f3f3f3;
            border-top: 3px solid #2489CE;
            border-radius: 100%;
            position: absolute;
            margin-top: 40;
            top: 10%;
            left: 0;
            right: 0;
            margin: auto;
            animation: spin 1s infinite ease;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        #loading-msg {
            width: 100%;
            position: absolute;
            top: 30%;

            text-align: center;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #333;
            font-size: 0.8em;
        }
        a {
          color: #3CA8FF;
          text-decoration: initial;
        }

        a:hover {
          text-decoration: underline;
        }
    </style>
    <div class="preloader">
        <div class="spinner"></div>
        <span id="loading-msg"></span>
    </div>
    <script>
    setTimeout(function() {
      $(".preloader").fadeOut(1000, function() {
        //$(".preloader").hide();
      });
    }, 10);
        (function() {
            var loaderText = document.getElementById("loading-msg");
            loaderText.innerHTML = getLoadingText();
            var refreshIntervalId = setInterval(function() {
                loaderText.innerHTML = getLoadingText();
            }, 10);

            function getLoadingText() {
                var strLoadingText;
                var arrLoadingText = ["Adjusting Bell Curves"
                ];
                var rand = Math.floor(Math.random() * arrLoadingText.length);
                return "Educo: "+arrLoadingText[rand];
            }
        })();
    </script>

<?php
  if(isset($_GET['id'])){
    $id=$_GET['id'];

  $sql="select * from topics where topic_id ='$id'";
  $statement = $connect->prepare($sql);
  if($statement->execute())
  {
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
    $topic_id= $row['topic_id'];
    $topic_subject=$row['topic_subject'];
    //category name
    $sqlcat="select * from categories where category_id='".$row['topic_category']."'";
    $statementcat = $connect->prepare($sqlcat);
    if($statementcat->execute()){
      $resultcat = $statementcat->fetchAll();
      foreach($resultcat as $rowcat)
      {
      $topic_category=$rowcat['category_name'];
    }
    }else {
      $topic_category='Undefined';
    }
    //user name
    $sqlby="select * from users where user_id='".$row['topic_by']."'";
    $statement1 = $connect->prepare($sqlby);
    if($statement1->execute()){
      $result1 = $statement1->fetchAll();
      foreach($result1 as $row1)
      {
      $topic_by=$row1['full_name'];
    }
    }else {
      $topic_by='Anonymous';
    }

    $topic_description=$row['topic_description'];
    $topic_date=$row['topic_date'];

?>

<div id="report" title="Flag Topic">
  <p>Please type a problem to continue.<br>
  You can report the post after providing a reason for your action</p>
  <form action="post.php" method="post">

    <fieldset>
      <label for="topic_description">Topic</label>
      <input type="text" id="problem_id" name="problem_id" value="<?php echo $topic_id; ?>"  class="text ui-widget-content ui-corner-all" readonly>
      <label for="topic_description">Reason</label>
      <input type="text" name="problem" id="problem" placeholder="Add a description..." class="text ui-widget-content ui-corner-all">
      <button type="submit" id="post_complain" name="post" class="ui-button ui-corner-all ui-widget">Submit</button>
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
  </fieldset>
  </form>
</div>
<div id="dialog-message" title="Success">
<p>
  <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>

  Your issue has been received.
</p>
</div>
<div id="dialog-message2" title="Failed">
<p>
  <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 50px 0;"></span>

  Please Fill in all the fields
</p>
</div>
<?php include '../newpost.php'; ?>
<script>
$( function() {
  $( "#dialog-message2" ).dialog({
    autoOpen: false,
    modal: true,
    show: {
      effect: "slide",
      duration: 100
    },
    hide: {
      effect: "explode",
      duration: 100
    }
    ,
    buttons: {
  "Ok": function() {
    $( this ).dialog( "close" );
  }
  }
  });
  $( "#report" ).dialog({
    autoOpen: false,
    modal: true,
    show: {
      effect: "slide",
      duration: 100
    },
    hide: {
      effect: "explode",
      duration: 100
    }
    ,
    buttons: {
  "Cancel": function() {
    $( this ).dialog( "close" );
  }
  }
  });

  $( "#flagit" ).on( "click", function() {
    $( '#report' ).dialog( "open" );
  });
  $( "#dialog-message" ).dialog({
    autoOpen: false,
    modal: true,
    show: {
      effect: "slide",
      duration: 100
    },
    hide: {
      effect: "explode",
      duration: 100
    }
    ,
    buttons: {
  "Ok": function() {
    $( this ).dialog( "close" );
    $( '#report' ).dialog( "close" );
  }
}
});

$('#post_complain').bind('click', function (event) {
  var long_desc  = document.getElementById('problem').value;
  var problem_id  = document.getElementById('problem_id').value;
  var action3 = "post";
  event.preventDefault();
if(long_desc!=''&&problem_id!=''){
  $.ajax({
    type: 'POST',
    url: 'post.php',
    data:{long_desc:long_desc,problem_id:problem_id,action3:action3},
    success:function(data)
    {
      //CKEDITOR.instances.short_desc.setData( '', function() { this.updateElement(); } );
      $( "#dialog-message" ).dialog( "open" );
    }
  });
} else {

  $( "#dialog-message2" ).dialog( "open" );
}


});
} );

</script>
    <?php
       echo "<h1>".$topic_subject."</h1>";
       echo "<article>
        ".$topic_description."
         </article>";
       echo "<p><b>By: <i>".$topic_by."</i></b></p>
       <p><b>Posted: <i><script>document.write(time_ago(new Date('".$topic_date."')));</script>: (".$topic_date.")</i></b></p>
       <p><b>Category: <i>".$topic_category."</i></b></p>
       <p style='cursor:pointer;'><a id='flagit'>Flag this post <i class='fa fa-flag'></i></a></p>
       ";
    ?>


      <div id="com" class="box_comment col-md-11">
        <h2>Type Your answer</h2>
        <form id="form2" action="post.php" method="post">
          <div ng-app="editorApp">
            <div ng-controller="editorCtrl">
              <div id="toolbar-container"></div>
              <div id="editor">
                <input type="hidden" name="comment_by" id="comment_by" value="<?php echo $_SESSION['user_id'] ?>">
                <input type="hidden" name="comment_topic" id="comment_topic" value="<?php echo $topic_id ?>">
                <textarea  name="long_desc" id="long_desc" placeholder="Add a comment..."></textarea>
              </div>
            </div>
          </div>
          <div class="box_post">
          <div class="pull-left">
            <span>
           <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar" />
           <i style="font-size:12px">Posting as <b><?php if(isset($_SESSION['username'])) {echo $_SESSION['username'];} else{echo "Guest";} ?><b></i>
           </span>
          </div>
         <div class="pull-right">
           <button type="submit" id="comment" name="submit"  value="com" style="width: 100px; height: 40px; font-size: 15px; border-radius: 25px; border: none; margin: 5px; color: white; background-color: rgba(22, 180, 180);" >Post</button>
         </div>
         </div>
        </form>
      </div>
      <div id="result">

      </div>
      <script>

        $(function () {
          $('#comment').bind('click', function (event) {
            var long_desc  = CKEDITOR.instances['long_desc'].getData();
        		var comment_topic = document.getElementById('comment_topic').value;
        		var comment_by =  document.getElementById('comment_by').value;
        		var action = "comment";
            event.preventDefault();

            $.ajax({
              type: 'POST',
              url: 'post.php',
              data:{comment_by:comment_by,comment_topic:comment_topic,long_desc:long_desc,action:action},
      				success:function(data)
      				{
      					//load_cart_data();
                //$("#result").html(data);
      					submit_comment();
      				}
            });
          });
        });

      </script>
      <div class="row">
        <h3>Responses</h3>
        <ul id="list_comment" class="col-md-12">
        <?php

          $sqlcom="select * from comments where comment_topic='".$row['topic_id']."' order by comment_date desc";
          $statementcom = $connect->prepare($sqlcom);
          if($statementcom->execute()){
            $resultcom = $statementcom->fetchAll();
            foreach($resultcom as $rowcom)
            {

          //comment user name
          $sqlby1="select * from users where user_id='".$rowcom['comment_by']."'";
          $statementby1 = $connect->prepare($sqlby1);
          if($statementby1->execute()){
            $resultby1 = $statementby1->fetchAll();
            foreach($resultby1 as $rowby1)
            {
            $comment_by=$rowby1['full_name'];
          }
          }else {
            $comment_by='Anonymous';
          }

          $comment_id=$rowcom['comment_id'];
          $comment_message=$rowcom['comment_message'];
          //$comment_topic=$rowcom['comment_topic'];

          $comment_date=$rowcom['comment_date'];
        ?>

    <?php
    echo '
    <li class="box_result row">
    <div class="avatar_comment col-md-1">
    <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
    </div>
    <div class="result_comment col-md-11">
    <h4>'.$comment_by.'</h4>
    <p>'.$comment_message.'</p>
    <div class="tools_comment">
    <a class="like" >Like</a>
    <span aria-hidden="true"> · </span>
    <a id="'.$comment_id.'" class="replay" >Reply</a>
    <span aria-hidden="true"> · </span>
    <i class="fa fa-thumbs-o-up"></i> <span class="count">1</span>
    <span aria-hidden="true"> · </span>
    <span><script>document.write(time_ago(new Date("'.($comment_date).'")));</script></span>
    </div>
    <ul class="child_replay">
    ';
    $sqlrp="select * from replies where reply_to='".$rowcom['comment_id']."' order by reply_date desc";
    $statementrp = $connect->prepare($sqlrp);
    if($statementrp->execute()){
      $resultrp = $statementrp->fetchAll();
      foreach($resultrp as $rowrp)
      {
        $reply_id=$rowrp['reply_id'];
        $reply_content=$rowrp['reply_content'];
        $reply_to=$rowrp['reply_to'];

        $sqlby2="select * from users where user_id='".$rowrp['reply_by']."'";
        $statementby2 = $connect->prepare($sqlby2);
        if($statementby2->execute()){
          $resultby2 = $statementby2->fetchAll();
          foreach($resultby2 as $rowby2)
          {
          $reply_by=$rowby2['full_name'];
        }
        }else {
          $reply_by='Anonymous';
        }
        $reply_date=$rowrp['reply_date'];
        echo'
        <li class="box_reply row">
        <div class="avatar_comment col-md-1">
        <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
        </div>
        <div class="result_comment col-md-11">
        <h4>'.$reply_by.'</h4>
        <p>'.$reply_content.'</p>
        <div class="tools_comment">
        <a class="like" >Like</a>
        <span aria-hidden="true"> · </span>
        <a class="replay" >Reply</a>
        <span aria-hidden="true"> · </span>
        <i class="fa fa-thumbs-o-up"></i> <span class="count">1</span>
        <span aria-hidden="true"> · </span>
        <span><script>document.write(time_ago(new Date("'.($reply_date).'")));</script></span>
        </div>
        <ul class="child_replay"></ul>
        </div>
        </li>';
    }

    echo'

    </ul>
    </div>
    </li>
    ';
  }
}
    ?>


        </ul>
      </div>
      <?php }
    }
  } } else {
    echo '
    <div class="maincontainer">
  <div class="bat">
    <img class="wing leftwing"
         src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-wing.png">
    <img class="body"
         src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-body.png" alt="bat">
    <img class="wing rightwing"
         src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-wing.png">
  </div>
  <div class="bat">
    <img class="wing leftwing"
         src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-wing.png">
    <img class="body"
         src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-body.png" alt="bat">
    <img class="wing rightwing"
         src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-wing.png">
  </div>
  <div class="bat">
    <img class="wing leftwing"
         src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-wing.png">
    <img class="body"
         src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-body.png" alt="bat">
    <img class="wing rightwing"
         src="https://www.blissfullemon.com/wp-content/uploads/2018/09/bat-wing.png">
  </div>
  <img class="foregroundimg" src="https://www.blissfullemon.com/wp-content/uploads/2018/09/HauntedHouseForeground.png" alt="haunted house">

</div>
<h1 class="errorcode">ERROR 403</h1>
<div class="errortext">This area is forbidden. Turn back now!</div>

<style>
body,html {
  background-color: #000121;
  font-family: "Roboto", sans-serif;
  overflow:hidden;
}

.maincontainer {
  position: relative;
  top: -50px;
  transform: scale(0.8);
  background: url("https://www.blissfullemon.com/wp-content/uploads/2018/09/HauntedHouseBackground.png");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 700px 600px;
  width: 800px;
  height: 600px;
  margin: 0px auto;
  display: grid;
}

.foregroundimg {
  position: relative;
  width: 100%;
  top: -230px;
  z-index: 5;
}

.errorcode {
  position: relative;
  top: -200px;
  font-family: "Creepster", cursive;
  color: white;
  text-align: center;
  font-size: 6em;
  letter-spacing: 0.1em;
}

.errortext {
  position: relative;
  top: -260px;
  color: #FBD130;
  text-align: center;
  text-transform: uppercase;
  font-size: 1.8em;
}

.bat {
  opacity: 0;
  position: relative;
  transform-origin: center;
  z-index: 3;
}

.bat:nth-child(1) {
  top: 380px;
  left: 120px;
  transform: scale(0.5);
  animation: 13s 1s flyBat1 infinite linear;
}

.bat:nth-child(2) {
  top: 280px;
  left: 80px;
  transform: scale(0.3);
  animation: 8s 4s flyBat2 infinite linear;
}

.bat:nth-child(3) {
  top: 200px;
  left: 150px;
  transform: scale(0.4);
  animation: 12s 2s flyBat3 infinite linear;
}

.body {
  position: relative;
  width: 50px;
  top: 12px;

}

.wing {
  width: 150px;
  position: relative;
  transform-origin: right center;
}

.leftwing {
  left: 30px;
  animation: 0.8s flapLeft infinite ease-in-out;
}

.rightwing {
  left: -180px;
  transform: scaleX(-1);
  animation: 0.8s flapRight infinite ease-in-out;
}

@keyframes flapLeft {
  0% { transform: rotateZ(0); }
  50% { transform: rotateZ(10deg) rotateY(40deg); }
  100% { transform: rotateZ(0); }
}

@keyframes flapRight {
  0% { transform: scaleX(-1) rotateZ(0); }
  50% { transform: scaleX(-1) rotateZ(10deg) rotateY(40deg); }
  100% { transform: scaleX(-1) rotateZ(0); }
}

@keyframes flyBat1 {
  0% { opacity: 1; transform: scale(0.5)}
  25% { opacity: 1; transform: scale(0.5) translate(-400px, -330px) }
  50% { opacity: 1; transform: scale(0.5) translate(400px, -800px) }
  75% { opacity: 1; transform: scale(0.5) translate(600px, 100px) }
  100% { opacity: 1; transform: scale(0.5) translate(100px, 300px) }
}

@keyframes flyBat2 {
  0% { opacity: 1; transform: scale(0.3)}
  25% { opacity: 1; transform: scale(0.3) translate(200px, -330px) }
  50% { opacity: 1; transform: scale(0.3) translate(-300px, -800px) }
  75% { opacity: 1; transform: scale(0.3) translate(-400px, 100px) }
  100% { opacity: 1; transform: scale(0.3) translate(100px, 300px) }
}

@keyframes flyBat3 {
  0% { opacity: 1; transform: scale(0.4)}
  25% { opacity: 1; transform: scale(0.4) translate(-350px, -330px) }
  50% { opacity: 1; transform: scale(0.4) translate(400px, -800px) }
  75% { opacity: 1; transform: scale(0.4) translate(-600px, 100px) }
  100% { opacity: 1; transform: scale(0.4) translate(100px, 300px) }
}

/*@media only screen and (max-width: 850px) {
  .maincontainer {
    transform: scale(0.6);
    width: 600px;
    height: 400px;
    background-size: 600px 400px;
  }

  .errortext {
    font-size: 1em;
  }
}*/</style>
    ';
  } ?>



      <script>

      //CKEDITOR.inline( 'texta');
      CKEDITOR.replace('long_desc',{
        extraPlugins: 'uploadimage',
  			uploadUrl: '../../../apps/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

  		 // Configure your file manager integration. This example uses CKFinder 3 for PHP.
  		 filebrowserBrowseUrl: '../../../apps/ckfinder/ckfinder.html',
  		 filebrowserImageBrowseUrl: '../../../apps/ckfinder/ckfinder.html?type=Images',
  		 filebrowserUploadUrl: '../../../apps/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
  		 filebrowserImageUploadUrl: '../../../apps/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
  		 // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
  		 // resizer (because image size is controlled by widget styles or the image takes maximum
  		 // 100% of the editor width).
  			width: "100%",
          	height: "200px"

  		});


      function submit_comment(){
        var comment = CKEDITOR.instances['long_desc'].getData();
        el = document.createElement('li');
        el.className = "box_result row";
        el.innerHTML =
         '<div class=\"avatar_comment col-md-1\">'+
           '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\"/>'+
         '</div>'+
         '<div class=\"result_comment col-md-11\">'+
         '<h4><?php if(isset($_SESSION['username'])) {echo $_SESSION['username'];} else{echo "Guest";}?></h4>'+
         '<p>'+ comment +'</p>'+
         '<div class=\"tools_comment\">'+
         '<a class=\"like\" >Like</a><span aria-hidden=\"true\"> · </span>'+
         '<i class=\"fa fa-thumbs-o-up\"></i> <span class=\"count\">0</span>'+
         '<span aria-hidden=\"true\"> · </span>'+
         '<a class=\"replay\" >Reply</a><span aria-hidden=\"true\"> · </span>'+
           '<span>Just Now</span>'+
         '</div>'+
         '<ul class="child_replay"></ul>'+
         '</div>';
       document.getElementById('list_comment').prepend(el);
       document.getElementById('com').innerHTML="Your answer has been posted";
       $('.commentar').val('');
      }



      $(document).ready(function() {
       $('#list_comment').on('click', '.like', function (e) {
         $current = $(this);
         var x = $current.closest('div').find('.like').text().trim();
         var y = parseInt($current.closest('div').find('.count').text().trim());

         if (x === "Like") {
           $current.closest('div').find('.like').text('Unlike');
           $current.closest('div').find('.count').text(y + 1);
         } else if (x === "Unlike"){
           $current.closest('div').find('.like').text('Like');
           $current.closest('div').find('.count').text(y - 1);
         } else {
           var replay = $current.closest('div').find('.like').text('Like');
           $current.closest('div').find('.count').text(y - 1);
         }
       });

          var counter = 0;
          window.uniqueId = function(){
            return 'myid-' + counter++
          }

       $('#list_comment').on('click', '.replay', function (e) {
         cancel_reply();
         $current = $(this);
         var elmId = $($current).attr("id");
         //alert(elmId);
         el = document.createElement('li');
         el.className = "box_reply row";
         var id= uniqueId();
         //el.id=id;
         el.innerHTML =
           '<div class=\"col-md-12 reply_comment\">'+
             '<form id="form3" action="post.php" method="post"><div class=\"row\">'+
               '<div class=\"avatar_comment col-md-1\">'+
                 '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\"/>'+
               '</div>'+
               '<div class=\"box_comment col-md-10\">'+
                 '<textarea id="texta" name="texta" class=\"comment_replay\" placeholder=\"Add a comment...\"></textarea>'+
                 '<input id="reply_to" name="reply_to" value="'+elmId+'" hidden/>'+
                 '<input id="reply_by" name="reply_by" value="<?php if(isset($_SESSION['user_id'])) {echo $_SESSION['user_id'];} else{echo "Guest";} ?>" hidden/>'+
                 '<div class=\"box_post\">'+
                 '<div class=\"pull-right\">'+
                   '<span>'+
                   '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\" />'+
                   '<i class=\"fa fa-caret-down\"></i>'+
                   '</span>'+
                   '<button class=\"cancel\" onclick=\"cancel_reply()\" type=\"button\">Cancel</button>'+
                   '<button id="reply" type=\"submit\" value=\"1\">Reply</button>'+
                 '</div>'+
                 '</div>'+
               '</div>'+
             '</div></form>'+
           '</div>';
         $current.closest('li').find('.child_replay').prepend(el);
         //CKEDITOR.inline( 'texta');
         CKEDITOR.replace('texta',{
           extraPlugins: 'uploadimage',
     			uploadUrl: '../../../apps/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

     		 // Configure your file manager integration. This example uses CKFinder 3 for PHP.
     		 filebrowserBrowseUrl: '../../../apps/ckfinder/ckfinder.html',
     		 filebrowserImageBrowseUrl: '../../../apps/ckfinder/ckfinder.html?type=Images',
     		 filebrowserUploadUrl: '../../../apps/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
     		 filebrowserImageUploadUrl: '../../../apps/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
     		 // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
     		 // resizer (because image size is controlled by widget styles or the image takes maximum
     		 // 100% of the editor width).
     			width: "100%",
             	height: "200px"

     		});
         /*CKEDITOR.inline( 'texta', {
           customConfig: 'editableConfig.js',
           width: "100%",
           height: "200px"
} );*/
       });
      });

      $(document).on('click', '#reply', function (event) {
        //$('#reply').bind('click', function (event) {
          var texta  = CKEDITOR.instances['texta'].getData();
          var reply_to = document.getElementById('reply_to').value;
          var reply_by =  document.getElementById('reply_by').value;
          var action = "reply";
          event.preventDefault();

          $.ajax({
            type: 'POST',
            url: 'post.php',
            data:{texta:texta,reply_to:reply_to,reply_by:reply_by,action:action},
            success:function(data)
            {
              //load_cart_data();
              //$("#result").html(data);
              submit_reply();
            }
          });
        });


      function submit_reply(){


        //var comment_replay = $('.comment_replay').val();
        var comment_replay = CKEDITOR.instances['texta'].getData();
        el = document.createElement('li');
        el.className = "box_reply row";
        el.innerHTML =
         '<div class=\"avatar_comment col-md-1\">'+
           '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\"/>'+
         '</div>'+
         '<div class=\"result_comment col-md-11\">'+
         '<h4><?php if(isset($_SESSION['username'])) {echo $_SESSION['username'];} else{echo "Guest";}?></h4>'+
         '<p>'+ comment_replay +'</p>'+
         '<div class=\"tools_comment\">'+
         '<a class=\"like\" >Like</a><span aria-hidden=\"true\"> · </span>'+
         '<i class=\"fa fa-thumbs-o-up\"></i> <span class=\"count\">0</span>'+
         '<span aria-hidden=\"true\"> · </span>'+
         '<a class=\"replay\" >Reply</a><span aria-hidden=\"true\"> · </span>'+
           '<span>Just Now</span>'+
         '</div>'+
         '<ul class="child_replay"></ul>'+
         '</div>';
       $current.closest('li').find('.child_replay').prepend(el);
       $('.comment_replay').val('');
       cancel_reply();
      }

      function cancel_reply(){
       $('.reply_comment').remove();
      }

      </script>
  </body>
</html>
