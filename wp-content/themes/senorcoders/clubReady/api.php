<?php 
class ClubReady {
    private  $api_key = 'a441e84a-c60f-4c57-a70f-2f5a58d7c425';
    private  $store_id = 6657;
    private  $BASE_API = 'https://www.clubready.com:443/api/';

    function getAllUsers(){
        $endpoint = 'current/club/'.$this->store_id.'/Users/all?ApiKey='.$this->api_key;        
        $request = new WP_Http();
        $allUsers = $request->request( $this->BASE_API . $endpoint, array( 'method'=>'GET', 'headers'=>$headers ) );
        
        return  json_decode( $allUsers['body'] );
    }
}
 

 
    