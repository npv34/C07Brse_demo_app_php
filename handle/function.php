<?php

function readFileToData($filePath){
    $dataJson = file_get_contents($filePath);
    return json_decode($dataJson, true);
}

function writeFileToData($filePath, $data){
    $dataJson = json_encode($data);
    file_put_contents($filePath, $dataJson);
}

function checkUser($users, $email, $password) {
    foreach ($users as $index => $user) {
        if (
            $user['email'] == $email  &&
            $user['password'] == $password
        ) {
            return true;
        }
    }

    return false;

}

function createUser($filePath,$name, $email, $password){
        // chuyen doi du lieu tu json -> array
        $users = readFileToData($filePath);

        $userRegister = [
            "name" => $name,
            "email" => $email,
            "password" => $password
        ];
        array_push($users, $userRegister);
        writeFileToData($filePath, $users);
}

function getAllUsers($filePath) {
    return readFileToData($filePath);
}

function deleteUser($filePath, $index) {
    $users = readFileToData($filePath);
    unset($users[$index]);
    writeFileToData($filePath, $users);
}

function findByIndex($filePath, $index){
    $users = readFileToData($filePath);
    return $users[$index];
}

function updateUser($filePath, $index, $name, $email) {
    $users = readFileToData($filePath);
    $users[$index]['email'] = $email;
    $users[$index]['name'] = $name;
    writeFileToData($filePath, $users);
}

