<?php

session_start();

file_get_contents('https://s.yeetlabs.de/del/');

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
/*
if(isset($_SESSION['loggedin']) && $_SESSION['username'] !== '') {
    $loggedin = true;
    $username = $_SESSION['username'];
    $license = $_SESSION['license'];
    $checkLicense = file_get_contents('https://s.yeetlabs.de/auth/validate/?license='.$license);

    if ($checkLicense == 'valid') {
        if ($_FILES['file']['size'] > 5000000000) {
            exit;
        }else{
            $expiration = date('Y-m-d H:i:s', strtotime('+30 day', time())); 
        }
    }else{
        if ($_FILES['file']['size'] > 1000000000) {
            exit;
        }else{
            $expiration = date('Y-m-d H:i:s', strtotime('+1 day', time())); 
        }
    }
}else{
    if ($_FILES['file']['size'] > 1000000000) {
        exit;
    }else{
        $expiration = date('Y-m-d H:i:s', strtotime('+1 day', time())); 
    }
}
*/
$expiration = date('Y-m-d H:i:s', strtotime('+1 day', time())); 
$uri = generateRandomString(6);

if ($db_link = mysqli_connect('localhost', 'flo', 'ihFuha7AG', 'share.it')) {
    $query = "SELECT * FROM files WHERE uri = '$uri'";

    $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/files/';
    $target_path = $uploads_dir.generateRandomString(15);
    $file_basename = basename($_FILES['file']['name']);
    $upload_ip = $_SERVER['REMOTE_ADDR'];

    if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)){
        $uri_available = false;
            
            while ($uri_available == false) {
                if ($exec = mysqli_query($db_link, $query)) {
                    if (mysqli_num_rows($exec) > 0) {
                        $uri = generateRandomString(6);
                    }else{
                        $uri_available = true;
                    }
                }
            }

            
            if ($loggedin = true) {
                $insert_query = "INSERT INTO files (uri, file_location, file_basename, user, upload_ip, expiration) VALUES ('$uri', '$target_path', '$file_basename', '$username', '$upload_ip', '$expiration')";
            }else{
                $insert_query = "INSERT INTO files (uri, file_location, file_basename, upload_ip, expiration) VALUES ('$uri', '$target_path', '$file_basename', '$upload_ip', '$expiration')";
            }
            if ($exec_insert = mysqli_query($db_link, $insert_query)) {
                echo $uri;
            }else{
                unlink($target_path);
                echo 'db_query_err';
            }
            
        
    }else{
        echo 'mv_err';
    }
}else{
    echo 'db_conn_err';
}


?>