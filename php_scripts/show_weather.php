<?php



if (isset($_GET['weather'])) {

    
    $city = $_GET["city"];
    $city=strtolower($city);

    // echo $city;



    $curl = curl_init();


    curl_setopt_array($curl, [
        CURLOPT_URL => "https://weather-by-api-ninjas.p.rapidapi.com/v1/weather?city=".$city,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: weather-by-api-ninjas.p.rapidapi.com",
            "X-RapidAPI-Key: a9108feecemsh51111048649360cp125bd5jsn27f62a70f597"
        ],
    ]);

    $response = curl_exec($curl);
    
    $err = curl_error($curl);

    if(curl_errno($curl)){
        $error = "Enter valid city name";
    }
   

    curl_close($curl);

    $decoded = json_decode($response);

    // var_dump($decoded);
}


?>