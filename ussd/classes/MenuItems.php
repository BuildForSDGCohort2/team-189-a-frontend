<?php

include_once('UssdUtils.php');
include_once('./QueryManager.php');

class MenuItems
{
    const FIRSTNAME_REQ = "FIRSTNAME_REQ";
    const SURNAME_REQ = "SURNAME_REQ";
    const ID_NUMBER_REQ = "ID_NUMBER_REQ";
    const REGISTRATION_STATUS = "REGISTRATION_STATUS";
    const MAINMENU_REQ = "MAINMENU_REQ";
    const LOCATION_REQ = "LOCATION_REQ";
    const MARITAL_STATUS_REQ = "MARITAL_STATUS_REQ";
    const CHAMA_ID_REQ = "CHAMA_ID_REQ";
    const DOB_REQ = "DOB_REQ";
    const GENDER_REQ = "GENDER_REQ";


    var $reply;
    var $userParams;

    public function setFirstNameRequest($ussdSession)
    {
        $ussdSession->currentFeedbackString = "Enter your First Name to register for this service:";
        $ussdSession->currentFeedbackType = self::FIRSTNAME_REQ;
        return $ussdSession;
    }

    public function setSurNameRequest($ussdSession)
    {
        $ussdSession->currentFeedbackString = "Enter your Last Name:";
        $ussdSession->currentFeedbackType = self::SURNAME_REQ;
        return $ussdSession;
    }

    public function setIdNumberRequest($ussdSession)
    {
        $ussdSession->currentFeedbackString = "Enter your ID/Passport number:";
        $ussdSession->currentFeedbackType = self::ID_NUMBER_REQ;
        return $ussdSession;
    }
    public function setLocationRequest($ussdSession)
    {
        $ussdSession->currentFeedbackString = "Enter your location e.g Nairobi:";
        $ussdSession->currentFeedbackType = self::LOCATION_REQ;
        return $ussdSession;
    }
    public function setMaritalStatusRequest($ussdSession)
    {
        $menuArray = array("Single", "Maried");
        $ussdSession->currentFeedbackString = "Select your Mariatal status:\n" . generateMenu($menuArray);
        $ussdSession->currentFeedbackType = self::MARITAL_STATUS_REQ;
        return $ussdSession;
    }
    public function setChamaIdRequest($ussdSession)
    {
        $ussdSession->currentFeedbackString = "Enter your Chama ID e.g 10:";
        $ussdSession->currentFeedbackType = self::CHAMA_ID_REQ;
        return $ussdSession;
    }
    public function setDOBRequest($ussdSession)
    {
        $ussdSession->currentFeedbackString = "Enter your DOB in the format yyyy-mm-dd e.g. 1995-02-05:";
        $ussdSession->currentFeedbackType = self::DOB_REQ;
        return $ussdSession;
    }
    public function setGenderRequest($ussdSession)
    {
        $menuArray = array("Male", "Female");
        $ussdSession->currentFeedbackString = "Select your gender:\n" . generateMenu($menuArray);
        $ussdSession->currentFeedbackType = self::GENDER_REQ;
        return $ussdSession;
    }
    public function setMainMenu($ussdSession)
    {
        $menuArray = array("My Account", "Chama Services");
        $ussdSession->currentFeedbackString = "Select one:\n" . generateMenu($menuArray);
        $ussdSession->currentFeedbackType = self::MAINMENU_REQ;
        return $ussdSession;
    }
}
