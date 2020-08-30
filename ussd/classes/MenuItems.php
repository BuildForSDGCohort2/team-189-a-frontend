<?php

include_once('UssdUtils.php');
include_once('./QueryManager.php');

class MenuItems {
    const FIRSTNAME_REQ = "FIRSTNAME_REQ";
    const LASTNAME_REQ = "LASTNAME_REQ";
    const ID_NUMBER_REQ = "ID_NUMBER_REQ";
    const REGISTRATION_STATUS = "REGISTRATION_STATUS";
    const MAINMENU_REQ = "MAINMENU_REQ";


    var $reply;
    var $userParams;

    public function setFirstNameRequest($ussdSession) {
        $ussdSession->currentFeedbackString = "Enter your First Name to register for this service:";
        $ussdSession->currentFeedbackType = self::FIRSTNAME_REQ;
        return $ussdSession;
    }

    public function setLastNameRequest($ussdSession) {
        $ussdSession->currentFeedbackString = "Enter your Last Name:";
        $ussdSession->currentFeedbackType = self::LASTNAME_REQ;
        return $ussdSession;
    }

    public function setIdNumberRequest($ussdSession) {
        $ussdSession->currentFeedbackString = "Enter your ID/Passport number:";
        $ussdSession->currentFeedbackType = self::ID_NUMBER_REQ;
        return $ussdSession;
    }

    public function setMainMenu($ussdSession) {
        $userId = UssdSession::getUserParam(UssdSession::USER_ID, $ussdSession->userParams);
        $userParams = UssdSession::USER_ID . "=" . $userId . "*";
        $ussdSession->userParams = $userParams;
        $menuArray = array("My Account", "Chama Services");
        $ussdSession->currentFeedbackString = "Select one:\n" . generateMenu($menuArray);
        $ussdSession->currentFeedbackType = self::MAINMENU_REQ;
        return $ussdSession;
    }
}
