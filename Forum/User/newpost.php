  <style>
  @import 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css';
    label { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var dialog, form;

    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }

    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Length of " + n + " must be between " +
          min + " and " + max + "." );
        return false;
      } else {
        return true;
      }
    }

    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }

    function addUser() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
      //return valid;
    }

    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 425,
      width: 350,
      modal: true,
      buttons: {
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        //form[ 0 ].reset();
        //allFields.removeClass( "ui-state-error" );
      }
    });


    $( "#create-user" ).on( "click", function() {
      //dialog.dialog( "open" );
    });
  } );
  </script>
<div id="dialog-form" title="Create new topic">
  <p class="validateTips">All form fields are required.</p>

  <form action="upload_post.php" method="post">
    <fieldset>
      <label for="topic_subject">Subject</label>
      <input type="text" name="topic_subject" id="topic_subject	"  class="text ui-widget-content ui-corner-all">
      <label for="topic_category">Category</label>
      <input type="text" name="topic_category" id="topiccategoryt	"  class="text ui-widget-content ui-corner-all">
      <label for="topic_description">Description</label>
      <div ng-app="editorApp">
        <div ng-controller="editorCtrl1">
          <div id="toolbar-container1"></div>
          <div id="editor1">
            <textarea  name="topic_description" id="topic_description" placeholder="Add a description..." class="text ui-widget-content ui-corner-all"></textarea>
          </div>
        </div>
      </div>
      <button type="submit" name="post" class="ui-button ui-corner-all ui-widget">Post</button>
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
  </fieldset>
  </form>
</div>
