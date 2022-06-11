<?php
  //headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

  //initializing our api
  include_once('../../core/initialize.php');

  //instantiate post
  $post = new Post($db);

  //get row posted data
  $data = json_decode(file_get_contents("php://input"));

  $post->id = $data->id;
  $post->title = $data->title;
  $post->body = $data->body;
  $post->author = $data->author;
  $post->category_id = $data->category_id;

  //create post
  if ($post->update()) {
    echo json_encode(["message" => "Post updated"]);
  } else {
    echo json_encode(["error" => "Post not updated"]);
  }
  
?>