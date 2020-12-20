<!DOCTYPE html>
<html>
  <head>
    <title>Educo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
    <style>
    li a {
      color: #3CA8FF;
      text-decoration: initial;
    }

    li a:hover {
      text-decoration: underline;
    }

    .show {
      display: block;
    }

    h2,
    h3 {
      margin: 0px 0;
      line-height: 23px;
      font-size: 18px;
    }

    div#wrap {
      margin: 17px;
    }

    ul,
    ol {
      padding: 0;
    }
    .container{
      padding-right: 0px !important;
      padding-left: 0px !important;
      margin:5px !important;
      max-width: 98% !important;

    }
    html,body {
    margin:0;
    padding:0;
}
p.desc {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
}
.desc1 {
  position: relative;
  
  /* exactly three lines */
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}
.desc1:after {
  content: "";
  text-align: right;
  position: absolute;
  bottom: 0;
  right: 0;
  width: 70%;
  height: 1.2em;
  background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1) 50%);
}
    </style>

<style>




</style>

  </head>
  <body>
    <br />
    <div class="container">
      <div class="card">
        <div class="card-header">Results</div>
        <div class="card-body">
          <?php  ?>
          <div class="form-group">
            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Type your search query here" />
          </div>
          <div class="table-responsive" id="dynamic_content">

          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script>
  $(document).ready(function(){
    //$('.desc1').find('*').addClass('desc');
    function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    var search_id = getParameterByName('string');
    //alert( search_id );
    if(search_id==''){
      load_data(1);
    } else {
      document.getElementById('search_box').value = search_id;
      var query = $('#search_box').val();
      load_data(1, query);
    }


    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });

  });
</script>
