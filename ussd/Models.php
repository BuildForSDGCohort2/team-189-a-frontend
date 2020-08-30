<?php

class UssdSession {

    var $sessionId;
    var $msisdn;
    var $ussdCode;
    var $ussdString;
    var $ussdStringPrefix;
    var $ussdProcessString;
    var $previousFeedbackType;
    var $currentFeedbackString;
    var $currentFeedbackType;
    var $startTime;
    var $userParams;
    var $test;

    const USER_ID = "USER_ID";
    const FIRSTNAME = "FIRSTNAME";
    const LASTNAME = "LASTNAME";
    const IDNUMBER = "IDNUMBER";

    const NOT_FOUND = "NOT_FOUND";

    public static function getUserParam($paramName, $userParams) {
        $params = explode("*", $userParams);
        //get latest input
        for ($i = count($params) - 1; $i > -1; $i--) {
            $keyValue = explode("=", $params[$i]);
            if ($paramName == $keyValue[0]) {
                return $keyValue[1];
            }
        }
        return self::NOT_FOUND;
    }

}

class UssdUser {

    var $id;
    var $msisdn;
    var $firstName;
    var $lastName;
    var $idNumber;
    var $dateCreated;

}

class RegisteredVehicle {

    var $id;
    var $msisdn;
    var $vehicleRegistration;
    var $rateId;
    var $rateCategory;
    var $paymentRate;
    var $item;
    var $dateCreated;

}




