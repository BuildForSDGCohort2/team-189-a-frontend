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

if ($ussdString == "") {
    $ussdSession = new UssdSession();
    $ussdSession->sessionId = $sessionId;
    $ussdSession->msisdn = $msisdn;
    $ussdSession->ussdCode = $serviceCode;
    $ussdSession->ussdString = $ussdString;
    $ussdSession->ussdProcessString = $ussdString;

    $rootMenu = new RootMenuAction();
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
            MenuItems::LASTNAME_REQ == $ussdSession->previousFeedbackType ||
            MenuItems::ID_NUMBER_REQ == $ussdSession->previousFeedbackType
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
