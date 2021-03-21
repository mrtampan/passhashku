<?php


function createGenerate() {

    $getPassword = $_GET["pass"];
    $getHash = $_GET["hash"];

    
    if(empty($getPassword) || empty($getHash)){
        header('Content-Type: application/json');
        return json_encode(["status" => false, "message" => "Harap Mengisi data password dan hashnya"]);
    
    }
    
    if($getHash == "default"){
        $resultGenerate = password_hash($getPassword, PASSWORD_DEFAULT);

        header('Content-Type: application/json');
        echo json_encode(array("status" => true, "data" => $resultGenerate));

    }

    if($getHash == 'bcrypt'){
        $resultGenerate = password_hash($getPassword, PASSWORD_BCRYPT);

        header('Content-Type: application/json');
        echo json_encode(["status" => true, "data" => $resultGenerate]);

    }

    if($getHash == 'hashlaravel'){
        
        $options = [
            "rounds" => 10
        ];
        $resultGenerate = password_hash($getPassword, PASSWORD_BCRYPT, $options);

        header('Content-Type: application/json');
        echo json_encode(["status" => true, "data" => $resultGenerate]);

    }

    if($getHash == 'argon2I'){
        
        $resultGenerate = password_hash($getPassword, PASSWORD_ARGON2I);
        
        header('Content-Type: application/json');
        echo json_encode(["status" => true, "data" => $resultGenerate]);

    }

}

createGenerate();

?>