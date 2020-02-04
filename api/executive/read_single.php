<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Headers: access");
  header("Access-Control-Allow-Methods: GET");
  header("Access-Control-Allow-Credentials: true");
  header('Content-Type: application/json');
    
  // include database and object files
  include_once '../../config/Database.php';
  include_once '../../models/Executive.php';

  // Instantitiate DB & Connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate executive object
  $executive = new Executive($db);

  // Get ID
  $executive->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get executive
  $executive->read_single();

if ($executive->title != null) {
    // Create array
    $executive_arr = array(
      'id' => $executive->id,
      'title' => $executive->title,
      'full_name' => $executive->full_name,
      'portfolio' => $executive->portfolio,
      'email' => $executive->email,
      'contact' => $executive->contact
    );
      
    // set response code - 200 OK
    http_response_code(200);
  
    // Make JSON
    print_r(json_encode(
      array(
        'status' => true,
        'message' => 'Executive Found',
        'data' => $executive_arr
      )
    ));
} else {
  // set response code - 404 Not found
  http_response_code(404);

  // tell the user executive does not exist
  echo json_encode(
    array(
      'status' => false,
      "message" => "Executive does not exist."
    )
  );
}


  