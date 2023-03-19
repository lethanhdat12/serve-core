<?php
require_once("../wp-config.php");
require_once("./ResponseInterface/ResponseClass.php");

function get_extenal_post($id , $data){
  $price_house = get_field("house_price" , $id);
  $name_house = get_field("house_name" , $id);
  $cars_house = get_field("house_car" , $id);
  $rooms_house = get_field("house_rooms" , $id);
  $area_house = get_field("house_area" , $id);
  $extenal_link = get_field("extenal_link" , $id);
  $banner_res = wp_get_attachment_url(get_post_thumbnail_id(36));;
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
// ok
function get_post_by_id($id){
    $response = new ResponseApi();
    $url = $response->get_url_api(). $id;
    $data = $response->fetch_data($url);
    $extenal_data = get_extenal_post($id , $data);
    $res = array(
      'title' => $data["title"]["rendered"] ,
      "content" => $data["content"]["rendered"] ,
      "excerpt" => $data["excerpt"]["rendered"] ,
    );
    $data_return = array_merge($res , $extenal_data);
    echo $response->respon(($data_return));
    return;
}
// ok

function render_array_post($all_post){
  $array_data = array();
  if(is_array($all_post)){
    foreach ($all_post as $key => $value) {
        $value_convert = json_decode(json_encode($value) , true);
        $id_post = $value_convert["id"];
        $res = array(
          'title' => $value_convert["title"]["rendered"] ,
        );
        $extenal_data = get_extenal_post($id_post , $value_convert);
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

// ok
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

function search_post_by_title($title){

  $response  = new ResponseApi();
  $url = $response->get_url_api()."?search=".urlencode($title);
  $data = $response->fetch_data($url);
  $all_post = render_array_post($data);
  echo $response -> respon($all_post);
  return;
}

// get_all_post_by_category_id(4);
// get_all_category();
// get_all_post();
// get_post_by_id(43);

// search_post_by_title("người dân quận 2");



