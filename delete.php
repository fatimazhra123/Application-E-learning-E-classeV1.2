<?php

    //fetch data from json
    $data = file_get_contents('students.json');
    $data = json_decode($data,true);

     //get the index
     $email = $_GET['index'];
     $index = getIndexByEmail($Email, $data);


    //delete the row with the index
    unset($data[$index]);
 
    //encode back to json
    $data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('students.json', $data);
 
    header('location: students.json');

    function getIndexByEmail($email, $data){
        $id = null;
        foreach($data as $index=>$user){
            if($user['Email'] === $Email)
                $id = $index;
        }
        return $id;
    }
?>