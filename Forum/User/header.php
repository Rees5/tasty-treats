<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://educo.epizy.com/educo/assets/img/favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
