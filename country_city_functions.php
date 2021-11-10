<?php
   
    function getAllCities(){
        $cities_json = file_get_contents('cities.txt');
        return json_decode($cities_json, true);
    }


    function getCityNameById($city_id){
        $cities = getAllCities();
        foreach($cities as $city){
            if($city['id'] == $city_id)
                return $city['name'];
        }
        return "Unknown";
    }

    function getCityById($city_id){
        $cities = getAllCities();
        foreach($cities as $city){
            if($city['id'] == $city_id)
                return $city;
        }
        return null;
    }

    function getCountryNameById($country_id){
        if($country_id == 0)
            return "Unknown";

        $countries = getCountriesFromFile();

        foreach($countries as $country){
            if($country['id'] == $country_id)
                return $country['name'];
        }
    }

    function getCountriesFromFile($filename = "countries.txt"){
        $file_contents = file_get_contents($filename);
        return $file_contents == "" ? [] : json_decode($file_contents, true);
    }

?>