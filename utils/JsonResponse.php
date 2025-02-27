<?php
function success($data, $message = "", $meta = []) {
    echo json_encode(["status"=>"Success",
    "message" => $message,
    "data"=>  $data, 
    "meta" => $meta     
     ]
    
    );
} 

function error($data, $message = "", $meta = []) {
    echo json_encode(["status"=>"Error",
    "message" => $message,
    "data"=>  $data, 
     "meta" => $meta  ]);
} 
?>