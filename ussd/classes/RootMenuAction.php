<?php

include_once('./QueryManager.php');
include_once('RegistrationAction.php');
include_once("./classes/MenuItems.php");

class RootMenuAction
{
    public function process($ussdSession)
    {
       
        $ussdUserList = getUssdUserList($ussdSession->msisdn);
       
        if (count($ussdUserList) > 0) {
            // var_dump($ussdUserList);die();
        } else {
            $registration = new RegistrationAction();
            $ussdSession = $registration->process($ussdSession);
        }
        return $ussdSession;
    }
    public function route($ussdSessionList, $ussdString)
    {

        // if (count($ussdSessionList) > 0) {
        //     $ussdSession = $ussdSessionList[0];
        //     $ussdSession->ussdString = $ussdString;
        //     $ussdSession->ussdProcessString = $ussdString;
        //     $ussdSession->previousFeedbackType = $ussdSession->currentFeedbackType;

        //     if (
        //         MenuItems::FIRSTNAME_REQ == $ussdSession->previousFeedbackType ||
        //         MenuItems::SURNAME_REQ == $ussdSession->previousFeedbackType ||
        //         MenuItems::ID_NUMBER_REQ == $ussdSession->previousFeedbackType ||
        //         MenuItems::GENDER_REQ == $ussdSession->previousFeedbackType ||
        //         MenuItems::DOB_REQ == $ussdSession->previousFeedbackType ||
        //         MenuItems::MARITAL_STATUS_REQ == $ussdSession->previousFeedbackType ||
        //         MenuItems::LOCATION_REQ == $ussdSession->previousFeedbackType ||
        //         MenuItems::CHAMA_ID_REQ == $ussdSession->previousFeedbackType


        //     ) {
        //         $registration = new RegistrationAction();
        //         $ussdSession = $registration->process($ussdSession);
        //     } else {
        //         // implememnt main other modules 
        //     }
        // } else {
        //     $ussdSession = new UssdSession();
        //     $reply = "END Connection error. Please try again.";
        //     $ussdSession->currentFeedbackString = $reply;
        // }
        // return $ussdSession;
    }
}
