<?php

include('php/classes.php');
$request = $_POST;
$command = $request['cmd'];
$movieDB = new movieDB;
if($command == 'actor'){
    $actor = $request['actor']; 
    $movies = $movieDB->queryPersonMovies($actor);
    $movieList = $movies['cast'];
    $dates = array();
    foreach($movieList as $mov){
        array_push($dates, strtotime($mov['release_date']));
    }
    array_multisort($dates, SORT_DESC, $movieList);
	header('Content-type: application/json');
	$package = array(
	'movies'=>$movieList,
	'name' =>$movies['name']);
    echo json_encode($package, true);
}



?>