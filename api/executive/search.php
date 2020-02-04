<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json; charset=UTF-8');

  include_once '../../config/Database.php';
  include_once '../../models/Executive.php';
 
  // include database and object files
  $database = new Database();
  $db = $database->connect();

  // Instantiate executive object
  $executive = new Executive($db);

  // get keywords
  $keywords = isset($_GET["s"]) ? $_GET["s"] : "";
 
  // query executives
  $result = $executive->search($keywords);
  // Get row count
  $num = $result->rowCount();

  // CHeck if any executives
  if ($num > 0) {
    // executive Array
    $executives_arr = array();
    $executives_arr['data'] = array();
    
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      // extract row
      // this will make $row['name'] to
      // just $name only
      extract($row);
 
      $executive_item = array(
        'id' => $id,
        'title' => $title,
        'full_name' => $full_name,
        'portfolio' => $portfolio,
        'email' => $email,
        'contact' => $contact
      );

      // Push to "data"
      array_push($executives_arr['data'], $executive_item);
      // array_push($executives_arr, $executive_item);

    }
 
    // set response code - 200 OK
    http_response_code(200);

    // Turn to JSON & output
    echo json_encode(
      array(
        'status' => true,
        'message' => 'Searched Executive Found',
        'data' => $executives_arr['data']
      )
    );
  } else {
 
    // set response code - 404 Not found
    http_response_code(404);
    
    // No Executives
    echo json_encode(
      array(
        'status' => false,
        'message' => 'No Executive Found'
      )
    );
  }
  