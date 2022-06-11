<?php
  //headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

  //initializing our api
  include_once('../../core/initialize.php');

  //instantiate category
  $category = new Category($db);

  //get the id in the request
  $category->id = isset($_GET["id"]) ? $_GET["id"] : die();

  //create category
  if ($category->delete()) {
    echo json_encode(["message" => "category deleted"]);
  } else {
    echo json_encode(["error" => "category not deleted"]);
  }
  
?>