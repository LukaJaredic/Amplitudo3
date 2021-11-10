<?php 

    function writeToFile($content, $filename = "database.txt"){
        // file_put_contents(filename, contents);
        $handle = fopen($filename, 'w+');
        fwrite($handle, $content);
        fclose($handle);
    }

    function getUsersFromFile($filename = "database.txt"){
        $users = file_get_contents($filename);
        $users == "" ? $users = [] : $users = json_decode($users, true);

        //backwards compatability
        for($i = 0; $i < count($users); $i++){
            if(!isset($users[$i]['country_id'])){
                $users[$i]['country_id'] = 0;
                $users[$i]['city_id'] = null;
            }
        }
        return $users;
    }

?>