<?php
$first = new DateTime($first);
$second = new DateTime($second);
$interval = $first->diff($second);
$hrs = $interval->format('%h');
$mins = $interval->format('%i');
$mins = $mins/60;
$int = $hrs + $mins;
if($int > 4){
  $int = $int - 1;
}

echo $int;

?>

<!--- Author By: MH RONY
// Author Website: https://developerrony.com
// Github Link: https://github.com/dev-mhrony
// Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw