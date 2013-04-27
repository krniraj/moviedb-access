<?php
/**
 * MovieDB
 * 
 **/
class movieDB{
    private $apiKey = '2eab928b55530289454f69fe5a2f51a4';
    
    /**
     * _call
     * @string url
     * @array arguments
     * @todo use http query builder
     **/
    private function _call($url, $args = NULL){
        $args['api_key'] = $this->apiKey;
        $ch = curl_init();
        $url .= '?';
        foreach($args as $a => $b){
            $url .= $a.'='.urlencode($b).'&';
        }
        echo $url;
        curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3".$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $response = curl_exec($ch);
        curl_close($ch);
        echo "<pre>";
        print_r(json_decode($response));
        echo "</pre>";
        return $response;
    }
    
    public function getMovies($personId){
        // /person/{id}/credits
        $id = $personId;
        $url = '/person/'.$id.'/credits';
        $response = $this->_call($url);
        return json_decode($response);
    }
    
    public function searchPerson($person){
        // /search/person
        $query = $person;
        $url = '/search/person';
        $args = array('query'=>$query);
        $response = $this->_call($url, $args);
        return json_decode($response);
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