<?php

date_default_timezone_set('Africa/Nairobi');
define("LOG_FILE", "chama_ussd.log");

$sessionId = isset($_GET['session_id']) ? $_GET['session_id'] : '';
$msisdn = isset($_GET['MSISDN']) ? $_GET['MSISDN'] : '';
$serviceCode = isset($_GET['service_code']) ? $_GET['service_code'] : '';
$ussdString = isset($_GET['ussd_string']) ? $_GET['ussd_string'] : '';


include_once("Models.php");
include_once("./classes/MenuItems.php");
include_once("./classes/RootMenuAction.php");
include_once("./classes/UssdUtils.php");
include_once("./classes/Apis.php");

$rootMenu = new RootMenuAction();

if ($ussdString == "") {

    $ussdSession = new UssdSession();
    $ussdSession->sessionId = $sessionId;
    $ussdSession->msisdn = $msisdn;
    $ussdSession->ussdCode = $serviceCode;
    $ussdSession->ussdString = $ussdString;
    $ussdSession->ussdProcessString = $ussdString;    
    $ussdSession = $rootMenu->process($ussdSession);
    createNewUssdSession($ussdSession);
} else {
    
 
    $ussdString = cleanUssdString($ussdString);
    $ussdSessionList = getUssdSessionList($sessionId);
    if (count($ussdSessionList) > 0) {
            $ussdSession = $ussdSessionList[0];
            $ussdSession->ussdString = $ussdString;
            $ussdSession->ussdProcessString = $ussdString;
            $ussdSession->previousFeedbackType = $ussdSession->currentFeedbackType;
       
            if (
                MenuItems::FIRSTNAME_REQ == $ussdSession->previousFeedbackType ||
                MenuItems::SURNAME_REQ == $ussdSession->previousFeedbackType ||
                MenuItems::ID_NUMBER_REQ == $ussdSession->previousFeedbackType ||
                MenuItems::GENDER_REQ == $ussdSession->previousFeedbackType ||
                MenuItems::DOB_REQ == $ussdSession->previousFeedbackType ||
                MenuItems::MARITAL_STATUS_REQ == $ussdSession->previousFeedbackType ||
                MenuItems::LOCATION_REQ == $ussdSession->previousFeedbackType ||
                MenuItems::CHAMA_ID_REQ == $ussdSession->previousFeedbackType


            ) {
                $registration = new RegistrationAction();
                $ussdSession = $registration->process($ussdSession);
            } else {
                // implememnt main other modules 
            }
        } else {
            $ussdSession = new UssdSession();
            $reply = "END Connection error. Please try again.";
            $ussdSession->currentFeedbackString = $reply;
        }
      
        updateUssdSession($ussdSession);
}

echo $ussdSession->currentFeedbackString;
