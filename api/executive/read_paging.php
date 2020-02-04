<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    // include database and object files
    include_once '../../config/Core.php';
    include_once '../../config/Database.php';
    include_once '../../models/Executive.php';
    include_once '../../shared/Utilities.php';
    
    // utilities
    $utilities = new Utilities();
    
    // instantiate database and executive object
    $database = new Database();
    $db = $database->connect();
    
    // initialize object
    $executive = new Executive($db);
    
    // query executives
    $stmt = $executive->read_paging($from_data_num, $datas_per_page);
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if ($num > 0) {
    
        // executives array
        $executives_arr              =    array();
        $executives_arr["data"]      =    array();
        $executives_arr["paging"]    =    array();
    
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);
 
            $executives_item = array(
              'id' => $id,
              'title' => $title,
              'full_name' => $full_name,
              'portfolio' => $portfolio,
              'email' => $email,
              'contact' => $contact
            );
    
            array_push($executives_arr["data"], $executive_item);
        }
    
        // include paging
        $total_rows                 =    $executive->count();
        $page_url                   =    "{$home_url}executive/read_paging.php?";
        $paging                     =    $utilities->get_paging($page, $total_rows, $datas_per_page, $page_url);
        $executives_arr["paging"]   =    $paging;
    
        // set response code - 200 OK
        http_response_code(200);
    
        // make it json format
        echo json_encode(
            array(
                'status' => true,
                'message' => 'Executive(s) Found',
                'data' => $executives_arr["data"]
            )
        );
    } else {

        // set response code - 404 Not found
        http_response_code(404);
    
        // tell the user executives does not exist
        echo json_encode(
            array(
                'status' => false,
                "message" => "No executive(s) Found."
            )
        );
    }
?>