<?php

include('/php/classes.php');
$request = $_GET;
$command = $request['cmd'];
$movieDB = new movieDB;
if($command == 'actor'){
    $actor = urlencode($request['actor']);  
}
elseif($command == 'movie'){
    $movie = urlencode($request['movie']);
}



?>