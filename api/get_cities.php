<?php 
    require '../auth_functions.php';

    checkAuth();

    if(!isset($_GET["id"]))
        exit;

    $countryId = $_GET["id"];
    $all_cities = json_decode(file_get_contents("../cities.txt"), true);
    $accepted_cities = [];
    
    foreach($all_cities as $city){
        if($city["country_id"] == $countryId)
            $accepted_cities[] = $city;
    }

    echo json_encode($accepted_cities);
?>