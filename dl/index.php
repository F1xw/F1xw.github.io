<?php
if ($_SERVER['REQUEST_URI'] !== '/dl/') {
    $uri_array = explode('?', $_SERVER['REQUEST_URI']);
    $uri = $uri_array[1];
    if ($db_link = mysqli_connect('localhost', 'flo', 'ihFuha7AG', 'share.it')) {
        $query = "SELECT * FROM files WHERE uri = '$uri'";
        if ($exec = mysqli_query($db_link, $query)) {
            if (mysqli_num_rows($exec) == 1) {
                $data = mysqli_fetch_assoc($exec);
                $file_location = $data['file_location'];
                $file_basename = $data['file_basename'];
                
                header("Content-Disposition: attachment; filename=$file_basename");
                header("Content-Length: " . filesize($file_location));
                header("Content-Type: application/octet-stream;");
                readfile($file_location);

            }else{
                echo 'db_err';
            }
        }else{
            echo 'db_query_err';
        }
    }else{
        echo 'db_conn_err';
    }
}
?>
