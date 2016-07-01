<?php
        header('Content-Type: application/json');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: GET, POST");
        header("Access-Control-Allow-Headers: Content-Type, *");
// Register - Strictly incharge of handling all the "login" data ; eventually it will support Oauth and really c9, no spll check
       
       
       // Important
       
       $auth = ""; // Auth ensures the call is from a trusted source
       $key = ""; // Key is the Write-API Master Token
       
       
     /**
      * Generic Template
      * 
      **/
       
      
        
        // Function h0 handles all inputs (includes json_decode)
        function h0()
        {
                return json_decode(file_get_contents("php://input"));
        }
        
        function t($m)
        {
             
        echo json_encode(array("status" => true, "data" => $m), JSON_UNESCAPED_SLASHES);
        exit;
        }
        
        function f($m)
        {
             
        echo json_encode(array("status" => false, "data" => $m), JSON_UNESCAPED_SLASHES);
        exit;
        }
        
        function hP($data)
            {
            	 $re = '';
                foreach($data as $k => $v) 
                 { 
                   $re .= $k . '='.$v.'&'; 
                 }
                 $re = rtrim($re, '&');
            	 return $re;
            }
        
        @$data = @h0();
        @$command = @$data->command;
        @$u = @$data->u;
        @$p = @$data->p;
        @$e = @$data->e;
        @$a = @$data->a;
        
        if(@$a != $auth) { f("Error: Auth Incorrect"); }
        
        $array = array(
               '_uid' => '1',
               'username' => @$u,
        	   'password' =>  @$p
           );
        $final = hP($array);
        
//   print_r($final);
          
            $r = shell_exec('curl -H "Authorization: Bearer '.$key.'" --data "'.$final.'" http://10.0.3.234:4567/api/ns/login');
            t($r);
       
        
                

?>