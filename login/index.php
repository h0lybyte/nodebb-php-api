<?php
// Login - Strictly incharge of handling all the "login" data ; eventually it will support Oauth and really c9, no spll check
       
       
       
     /**
      * Generic Template
      * 
      **/
       
        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: GET, POST");
        header("Access-Control-Allow-Headers: Content-Type, *");
        
        // Function h0 handles all inputs (includes json_decode)
        function h0()
        {
                return json_decode(file_get_contents("php://input"));
        }
        
        @$data = @h0();
        @$command = @$data->command;
        @$u = @$data->u;
        @$p = @$data->p;


// login script start(); @IDE
        
        $url = 'http://10.0.3.234:4567/api/login/ns';
        $fields = array(
        	'username' => urlencode(@$u),
        	'password' => urlencode(@$p)
        );
        
        //url-ify the data for the POST
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');
        
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        
        //execute post
        $result = curl_exec($ch);
        print_r($result);
        //close connection
        curl_close($ch);
        
      //  $final = array("status" => true, "data" => $result);
    //    echo json_encode($final, JSON_UNESCAPED_SLASHES);
        exit;
                

?>