<?php 

require_once("../../wp-config.php");
require_once("../ResponseInterface/ResponseClass.php");

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

$idpost = isset($_GET["id"]) ? $_GET["id"] : null ;

$search = isset($_GET["search"]) ? $_GET["search"] : null ;

function get_post_by_id($id){
    $response = new ResponseApi();
    $url = $response->get_url_api(). $id;
    $data = $response->fetch_data($url);
    if(isset($data)){
        $extenal_data = $response->get_extenal_post($id , $data);
        $res = array(
          'title' => $data["title"]["rendered"] ,
          "content" => $data["content"]["rendered"] ,
          "excerpt" => $data["excerpt"]["rendered"] ,
        );
        $data_return = array_merge($res , $extenal_data);
        echo $response->respon(($data_return));
    }else{
        echo $response->respon((null));
    }
    return;
}

function render_array_post($all_post){
    $array_data = array();
    $response = new ResponseApi();
    if(is_array($all_post)){
      foreach ($all_post as $key => $value) {
          $value_convert = json_decode(json_encode($value) , true);
          $id_post = $value_convert["id"];
          $res = array(
            'title' => $value_convert["title"]["rendered"] ,
          );
          $extenal_data = $response->get_extenal_post($id_post , $value_convert);
          $data_return = array_merge($res , $extenal_data);
          array_push($array_data , $data_return);
      }
    } 
    return $array_data;
}

function get_all_post(){
    $response = new ResponseApi();
    $url = $response->get_url_api();
    $all_post = $response->fetch_data($url);
    $array_data = render_array_post($all_post);
    echo $response->respon($array_data);
    return;
}

function search_post_by_title($title){
    $response  = new ResponseApi();
    $url = $response->get_url_api()."?search=".urlencode($title);
    $data = $response->fetch_data($url);
    $all_post = render_array_post($data);
    echo $response -> respon($all_post);
    return;
  }

if(isset($idpost) && $idpost > 0) {
    get_post_by_id($idpost);
}else if(isset($search)){
    search_post_by_title($search);
}else{
    get_all_post();
}


