<?php

class Apis
{

    public function createUssdSession($ussdsession)
    {
        //create ussdsession here 
    }

    public function registerUser($ussdUser)
    {

        // Setup cURL
        $url = curl_init('http://134.209.164.68/team189/user/registration');
        curl_setopt_array($url, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_POSTFIELDS => json_encode($ussdUser)
        ));
        // Send the request
        $response = curl_exec($url);
        // Check for errors
        if ($response != 200) {
            die(curl_error($url));
        }
        // Decode the response
        $responseData = json_decode($response, TRUE);
        // Print the date from the response
        return  $responseData;
        //TODO: send back the response to the user
    }
}
