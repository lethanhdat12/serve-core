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
    public function get_extenal_post($id , $data){
        $price_house = get_field("house_price" , $id);
        $name_house = get_field("house_name" , $id);
        $cars_house = get_field("house_car" , $id);
        $rooms_house = get_field("house_rooms" , $id);
        $area_house = get_field("house_area" , $id);
        $extenal_link = get_field("extenal_link" , $id);
        $banner_res = wp_get_attachment_url(get_post_thumbnail_id($id));
        return array(
            "name_house" => $name_house,
            "price_house" => $price_house,
            "cars_house"=> $cars_house,
            "rooms_house"=> $rooms_house,
            "area_house" => $area_house ,
            "extenal_link" => $extenal_link,
            "banner" => $banner_res,
        );
    }
    public function fetch_data($url){
        try{
            $fetch_data = @file_get_contents($url);
            $respon = json_decode($fetch_data , true);
            return $respon;
        }catch(Exception $e){
            return null;
        }
       
    }
 }
