<?php

include('/php/classes.php');
$request = $_GET;
$command = $request['cmd'];
$movieDB = new movieDB;
if($command == 'actor'){
    $actor = $request['actor']; 
    $movies = $movieDB->queryPersonMovies($actor);
    $movieList = $movies['results'];
    $dates = array();
    foreach($movieList as $mov){
        array_push($dates, strtotime($mov['release_date']));
    }
    array_multisort($dates, SORT_DESC, $movieList);
    echo json_encode($movieList);
}



?>