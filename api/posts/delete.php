<?php
  //headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

  //initializing our api
  include_once('../../core/initialize.php');

  //instantiate post
  $post = new Post($db);

  //get the id in the request
  $post->id = isset($_GET["id"]) ? $_GET["id"] : die();

  //create post
  if ($post->delete()) {
    echo json_encode(["message" => "Post deleted"]);
  } else {
    echo json_encode(["error" => "Post not deleted"]);
  }
  
?>