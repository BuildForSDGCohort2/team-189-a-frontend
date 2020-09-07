<?php

class UssdSession
{

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
    const SURNAME = "SURNAME";
    const IDNUMBER = "IDNUMBER";
    const LOCATION = "LOCATION";
    const GENDER = "GENDER";
    const DOB = "DOB";
    const MARITAL_STATUS = "MARITAL_STATUS";
    const CHAMA_ID = "CHAMA_ID";
    const STATUS = "STATUS";

    const NOT_FOUND = "NOT_FOUND";

    public static function getUserParam($paramName, $userParams)
    {
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

class UssdUser
{
    var $dob;
    var $firstName;
    var $surname;
    var $gender;
    var $idno;
    var $location;
    var $marital_status;
    var $status;
    var $msisdn;
    var $chama_id;
}
