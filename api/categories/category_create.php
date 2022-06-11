<?php
  //headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

  //initializing our api
  include_once('../../core/initialize.php');

  //instantiate category
  $category = new Category($db);

  //get row category data
  $data = json_decode(file_get_contents("php://input"));

  $category->name = $data->name;

  //create category
  if ($category->create()) {
    echo json_encode(["message" => "category created"]);
  } else {
    echo json_encode(["error" => "category not created"]);
  }
  
?>