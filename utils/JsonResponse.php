<?php
function success($data, $message = "") {
    echo json_encode(["status"=>"Success",
    "message" => $message,
     "data"=>  $data ]);
} 

function error($data, $message = "") {
    echo json_encode(["status"=>"Error",
    "message" => $message,
     "data"=>  $data ]);
} 

?>