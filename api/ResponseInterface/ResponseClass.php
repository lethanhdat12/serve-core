<?php
header("Content-Type: application/json");
 class ResponseApi{
    private $status_success = "success";
    private $status_fail = "failed";
    private $api_url;
    public function __construct(){ 
        $this->api_url = get_site_url().'/wp-json/wp/v2/posts/';
    }
    public function respon($data){
        if($data){
            return json_encode([
                "message" => $this->status_success,
                "code" => 1,
                "data" => $data,
              ]);
        }else{
            return json_encode([
                "message" => $this->status_fail,
                "code" => 0,
                "data" => null,
              ]);
        }
    }
    public function get_url_api(){
        return $this->api_url;
    }
    public function fetch_data($url){
        $fetch_data = file_get_contents($url);
        $respon = json_decode($fetch_data , true);
        return $respon;
    }
 }
