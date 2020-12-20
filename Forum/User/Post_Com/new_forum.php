<?php
include "config.php";
if(!isset($_SESSION)) {session_start();}
include "config.php";
if(isset($_SESSION['user_id'])) {} else{
  $_SESSION['msg']="Session Expired! Please login";
  echo '<a id="link" target="_parent" href="../../../src/auth/login.php"></a>

<script type="text/javascript">
    document.getElementById("link").click();
</script>';}
// Insert record


?>

<!DOCTYPE html>
<html>
<head>
	<title>New Forum</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<!-- CSS -->
	<style type="text/css">
	.cke_textarea_inline{
		border: 1px solid black;
	}
	</style>

	<!-- CKEditor -->
</head>
<body>
  <style>
  @import 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css';
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>

<a class="btn btn-primary" target="_parent" href="../forum.php">Back</a>
<h1>New Topic</h1>
<a id="link2"  target="_parent" href="../forum.php"></a>
	<form id="form1" action="post.php" method='post'>

<p></p>
		Topic :<p></p>
		<textarea id='short_desc' name='short_desc' style='border: 1px solid black; width:80%;'  ></textarea><br>
    <input type="hidden" name="comment_by" id="comment_by" value="<?php echo $_SESSION['user_id'] ?>">
<p></p>
		Category:<p></p>
    <select class="phone-select" multiple="multiple" name="category" id="category" size="10" style="width:300px">
    <?php
    $sqlcat="select * from categories order by category_name";
    $statementcat = $connect->prepare($sqlcat);
    if($statementcat->execute()){
      $resultcat = $statementcat->fetchAll();
      foreach($resultcat as $rowcat)
      {
        echo "<option value='".$rowcat['category_id']."'>".$rowcat['category_name']."</option>";
      //$topic_category=$rowcat['category_name'];
      }
    }
     ?>
   </select>
<script type="text/javascript">
  $(document).ready(function() {
    $(".phone-select").select2();
  /*  var o = new Option("option text", "value");
/// jquerify the DOM object 'o' so we can use the html method
    $(o).html("option text");
    $(".phone-select").append(o);*/
  });
</script>
<p></p>
		Problem Description:<p></p>
		<textarea id='long_desc' name='long_desc' ></textarea><br>
<p></p>
		<input id="post_topic" style="cursor:pointer;width: 100px; height: 40px; font-size: 15px; border-radius: 25px; border: none; margin: 5px; color: white; background-color: rgba(22, 180, 180);" type="button" name="submit" value="Submit">
	</form>
  <p id="result"></P>
  <div id="dialog-message" title="Success">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>

    Your Post has been saved.
  </p>
  </div>
  <div id="dialog-message2" title="Failed">
  <p>
    <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 50px 0;"></span>

    Please Fill in all the fields
  </p>
  </div>
    <hr>
	<script>
		$(function () {
			$('#post_topic').bind('click', function (event) {
        var long_desc  = CKEDITOR.instances['long_desc'].getData();
        var short_desc  =  document.getElementById('short_desc').value;
        var topic_category = document.getElementById('category').value;
        var topic_by =  document.getElementById('comment_by').value;
        var action2 = "post";
			event.preventDefault();
      if(long_desc!=''&&short_desc!=''&&topic_category!=''&&topic_by!=''){
        $.ajax({
          type: 'POST',
          url: 'post.php',
          data:{long_desc:long_desc,short_desc:short_desc,topic_category:topic_category,topic_by:topic_by,action2:action2},
          success:function(data)
          {
            //CKEDITOR.instances.short_desc.setData( '', function() { this.updateElement(); } );
            CKEDITOR.instances.long_desc.setData( '', function() { this.updateElement(); } );
            $('.phone-select').val(null).trigger('change');
            document.getElementById('short_desc').value="";
            $("#result").html(data);
            $( "#dialog-message" ).dialog( "open" );
          }
        });
      } else {

        $( "#dialog-message2" ).dialog( "open" );
      }


			});
		});
    //dialog 1
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
    "New Post": function() {
      $( this ).dialog( "close" );
    },
    "View Forums": function() {
      document.getElementById("link2").click();
      $( this ).dialog( "close" );
      //document.getElementById("link2").click();
    }
  }
  });
//dialog 2
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
	</script>
  <script src="../../../ckeditor/ckeditor.js" ></script>
	<!-- Script -->
	<script type="text/javascript">
	//config.extraPlugins = 'codesnippetgeshi';
		// Initialize CKEditor
		//CKEDITOR.inline( 'short_desc');

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
		 image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
		 image2_disableResizer: true
,
			width: "100%",
        	height: "200px"

		});


	</script>
</body>
</html>
