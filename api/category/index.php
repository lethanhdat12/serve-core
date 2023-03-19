<?php
require_once("../../wp-config.php");
require_once("../ResponseInterface/ResponseClass.php");

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

$idcategory = isset($_GET["id"]) ? $_GET["id"] : null ;

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

function get_all_category(){
    $response  = new ResponseApi();
    $categorys = get_categories();
    $cate = array();
    foreach ($categorys as $cat) {  
      $cate_id = $cat->term_id;
      $parent_id = $cat -> parent ? $cat -> parent : null;
      $name = $cat->name;
      $slug = $cat->slug;
      $img =  z_taxonomy_image_url($cat->term_id);
      array_push( $cate , [
        "cate_id" => $cate_id,
        "parent_id" => $parent_id,
        "name" => $name,
        "slug" => $slug,
        "img" => $img
      ]);
    }
    echo $response->respon($cate);
    return;
}
  // ok
function get_all_post_by_category_id($idcategory){
    $response  = new ResponseApi();
    $url = $response->get_url_api()."?categories=".$idcategory;
    $data = $response->fetch_data($url);
    $all_post = render_array_post($data);
    echo $response -> respon($all_post);
    return;
}

if(isset($idcategory)){
    get_all_post_by_category_id($idcategory);
}else{
    get_all_category();
}