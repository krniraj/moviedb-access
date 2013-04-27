<?php

class movieDB{
    const $apiKey = '2eab928b55530289454f69fe5a2f51a4';
    
    private function makeCall($url, $args = NULL){
        
    }
    
    public function getMovies($personId){
        // /3/person/{id}/credits
        $id = $personId;
        $url = '/3/person/'.$id.'/credits';
        $response = $this->makeCall($url);
        return json_encode($response);
    }
    
    public function searchPerson($person){
        // /3/search/person
        $query = $person;
        $url = '/3/search/person';
        $args = array('query'=>$query);
        $response = $this->makeCall($url);
        return json_encode($response);
    }
    
    public function queryPersonMovies($person){
        $query = $person;
        $personInfo = $this->searchPerson($query);
        $personId = $personInfo['id'];
        $movies = $this->getMovies($personId);
        return $movies;
    }
    
    
}
?>