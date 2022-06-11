<?php
  //headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  //initializing our api
  include_once('../../core/initialize.php');

  //instantiate category

  $category = new Category($db);
  
  //get the id in the request
  $category->id = isset($_GET["id"]) ? $_GET["id"] : die();
  $category->read_single();
  if ($category->name != null) {

    $category_arr = [
        'id' => $category->id,
        'name' => $category->name,
        'created_at' => $category->created_at,
    ];
  
    //make a json
    print_r(json_encode($category_arr));
  } else {
    print_r(json_encode(["message" => "No match found for this category!"]));
  }
?>