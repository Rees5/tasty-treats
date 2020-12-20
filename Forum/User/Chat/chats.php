<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Droppable - Simple photo manager</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  #gallery { float: left; width: 50%; min-height: 12em; }
  .gallery.custom-state-active { background: #eee; }
  .gallery li { float: left; width: 96px; padding: 0.4em; margin: 0 0.4em 0.4em 0; text-align: center; }
  .gallery li h5 { margin: 0 0 0.4em; cursor: move; }
  .gallery li a { float: right; }
  .gallery li a.ui-icon-zoomin { float: left; }
  .gallery li img { width: 100%; cursor: move; }

  #trash { float: rightx; width: 32%; min-height: 18em; padding: 1%; }
  #trash h4 { line-height: 16px; margin: 0 0 0.4em; }
  #trash h4 .ui-icon { float: left; }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>

  </script>
</head>
<body>
<p id="gallery1"></p>
<div class="ui-widget ui-helper-clearfix" style="display:flex">

<ul id="gallery" style="padding: 5px; padding-left: 15px;" class="gallery ui-helper-reset ui-helper-clearfix">
</ul>

<div id="trash" class="ui-widget-content ui-state-default">
  <h4 class="ui-widget-header"><span class="ui-icon ui-icon-trash">Trash</span> Trash</h4>
</div>

</div>

<script>

$( function() {


    function delete_message(id,act)
    {

        if(act=="delete"){
          var action = "messaged";
          $.ajax({
            url:"fetch_user.php",
            method:"POST",
            data:{action:action,id:id,act:act},
            success:function(data){

              //alert(act);
              $('#gallery1').html(data);
            }});
        } else if(act=="restore") {
          var action = "messaged";
          $.ajax({
            url:"fetch_user.php",
            method:"POST",
            data:{action:action,id:id,act:act},
            success:function(data){
              //alert(act);
              $('#gallery1').html(data);
            }
        });
      }
    }
  function fetch_message()
  {
    var action = "message1";
    $.ajax({
      url:"fetch_user.php",
      method:"POST",
      data:{action:action},
      success:function(data){
        $('#gallery').html(data);
        // There's the gallery and the trash
        var $gallery = $( "#gallery" ),
          $trash = $( "#trash" );

        // Let the gallery items be draggable
        $( "li", $gallery ).draggable({
          cancel: "a.ui-icon", // clicking an icon won't initiate dragging
          revert: "invalid", // when not dropped, the item will revert back to its initial position
          containment: "document",
          helper: "clone",
          cursor: "move"
        });

        // Let the trash be droppable, accepting the gallery items
        $trash.droppable({
          accept: "#gallery > li",
          classes: {
            "ui-droppable-active": "ui-state-highlight"
          },
          drop: function( event, ui ) {
            deleteImage( ui.draggable );
          }
        });
        $('a.ui-icon-trash').click(function() {
              var id = $(this).attr('id');
              delete_message(id,"delete");
          });
          $('a.ui-icon-refresh').click(function() {
                var id = $(this).attr('id');
                delete_message(id,"restore");
            });
        // Let the gallery be droppable as well, accepting items from the trash
        $gallery.droppable({
          accept: "#trash li",
          classes: {
            "ui-droppable-active": "custom-state-active"
          },
          drop: function( event, ui ) {
            recycleImage( ui.draggable );
          }
        });

        // Image deletion function
        function deleteImage( $item ) {
          $item.fadeOut(function() {
            var $list = $( "ul", $trash ).length ?
              $( "ul", $trash ) :
              $( "<ul class='gallery ui-helper-reset'/>" ).appendTo( $trash );
            $item.find( "a.ui-icon-trash" ).remove();
            $item.append( recycle_icon ).appendTo( $list ).fadeIn(function() {
              $item
                .animate({ width: "60px" })
                .find( "img" )
                  .animate({ height: "56px" });
            });
          });
        }

        // Image recycle function
      function recycleImage( $item ) {
          $item.fadeOut(function() {
            $item
              .find( "a.ui-icon-refresh" )
                .remove()
              .end()
              .css( "width", "96px")
              .append( trash_icon )
              .find( "img" )
                .css( "height", "72px" )
              .end()
              .appendTo( $gallery )
              .fadeIn();
          });
        }

        // Image preview function, demonstrating the ui.dialog used as a modal window
        function viewLargerImage( $link ) {
          var src = $link.attr( "href" ),
            title = $link.siblings( "img" ).attr( "alt" ),
            $modal = $( "img[src$='" + src + "']" );

          if ( $modal.length ) {
            $modal.dialog( "open" );
          } else {
            var img = $( "<img alt='" + title + "' width='384' height='288' style='display: none; padding: 8px;' />" )
              .attr( "src", src ).appendTo( "body" );
            setTimeout(function() {
              img.dialog({
                title: title,
                width: 400,
                modal: true
              });
            }, 1 );
          }
        }

        // Resolve the icons behavior with event delegation
        $( "ul.gallery > li" ).on( "click", function( event ) {
          var $item = $( this ),
            $target = $( event.target );

          if ( $target.is( "a.ui-icon-trash" ) ) {
            deleteImage( $item );
          } else if ( $target.is( "a.ui-icon-zoomin" ) ) {
            viewLargerImage( $target );
          } else if ( $target.is( "a.ui-icon-refresh" ) ) {
            recycleImage( $item );
          }

          return false;
        });
      }
    })
  }

  fetch_message();
  /*fetch_user();
  setInterval(function(){
    //update_last_activity();
    fetch_message();
    //fetch_user();
  }, 5000);*/


} );
</script>
</body>
</html>
