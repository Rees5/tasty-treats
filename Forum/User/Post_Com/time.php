<script>
function time_ago(time) {

  switch (typeof time) {
    case 'number':
      break;
    case 'string':
      time = +new Date(time);
      break;
    case 'object':
      if (time.constructor === Date) time = time.getTime();
      break;
    default:
      time = +new Date();
  }
  var time_formats = [
    [60, 'seconds', 1], // 60
    [120, '1 minute ago', '1 minute from now'], // 60*2
    [3600, 'minutes', 60], // 60*60, 60
    [7200, '1 hour ago', '1 hour from now'], // 60*60*2
    [86400, 'hours', 3600], // 60*60*24, 60*60
    [172800, 'Yesterday', 'Tomorrow'], // 60*60*24*2
    [604800, 'days', 86400], // 60*60*24*7, 60*60*24
    [1209600, 'Last week', 'Next week'], // 60*60*24*7*4*2
    [2419200, 'weeks', 604800], // 60*60*24*7*4, 60*60*24*7
    [4838400, 'Last month', 'Next month'], // 60*60*24*7*4*2
    [29030400, 'months', 2419200], // 60*60*24*7*4*12, 60*60*24*7*4
    [58060800, 'Last year', 'Next year'], // 60*60*24*7*4*12*2
    [2903040000, 'years', 29030400], // 60*60*24*7*4*12*100, 60*60*24*7*4*12
    [5806080000, 'Last century', 'Next century'], // 60*60*24*7*4*12*100*2
    [58060800000, 'centuries', 2903040000] // 60*60*24*7*4*12*100*20, 60*60*24*7*4*12*100
  ];
  var seconds = (+new Date() - time) / 1000,
    token = 'ago',
    list_choice = 1;

  if (seconds == 0) {
    return 'Just now'
  }
  if (seconds < 0) {
    seconds = Math.abs(seconds);
    token = 'from now';
    list_choice = 2;
  }
  var i = 0,
    format;
  while (format = time_formats[i++])
    if (seconds < format[0]) {
      if (typeof format[2] == 'string')
        return format[list_choice];
      else
        return Math.floor(seconds / format[2]) + ' ' + format[1] + ' ' + token;
    }
  return time;
}

//var aDay = 24 * 60 * 60 * 1000;
//console.log(time_ago(new Date("2020-11-09 00:00:00")));
//console.log(time_ago(new Date(Date.now() - aDay * 2)));
</script>
<?php
date_default_timezone_set("Africa/Nairobi");
function time_elapsed_string($time_ago)
{
  $time_ago = strtotime($time_ago);
      $cur_time   = time();
      $time_elapsed   = $cur_time - $time_ago;
      $seconds    = $time_elapsed ;
      $minutes    = round($time_elapsed / 60 );
      $hours      = round($time_elapsed / 3600);
      $days       = round($time_elapsed / 86400 );
      $weeks      = round($time_elapsed / 604800);
      $months     = round($time_elapsed / 2600640 );
      $years      = round($time_elapsed / 31207680 );
      // Seconds
      if($seconds <= 60){
          return "just now";
      }
      //Minutes
      else if($minutes <=60){
          if($minutes==1){
              return "one minute ago";
          }
          else{
              return "$minutes minutes ago";
          }
      }
      //Hours
      else if($hours <=24){
          if($hours==1){
              return "an hour ago";
          }else{
              return "$hours hrs ago";
          }
      }
      //Days
      else if($days <= 7){
          if($days==1){
              return "yesterday";
          }else{
              return "$days days ago";
          }
      }
      //Weeks
      else if($weeks <= 4.3){
          if($weeks==1){
              return "a week ago";
          }else{
              return "$weeks weeks ago";
          }
      }
      //Months
      else if($months <=12){
          if($months==1){
              return "a month ago";
          }else{
              return "$months months ago";
          }
      }
      //Years
      else{
          if($years==1){
              return "one year ago";
          }else{
              return "$years years ago";
          }
      }
}
function getTime(){
  date_default_timezone_set("Africa/Nairobi");
  return date("Y-m-d H:i:s");
}
?>
