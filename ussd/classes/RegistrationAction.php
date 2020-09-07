<?php

include_once('./Models.php');
include_once('./QueryManager.php');
include_once('MenuItems.php');
include_once('UssdUtils.php');

class RegistrationAction
{

    public function process($ussdSession)
    {
        $menuItems = new MenuItems();
        $reply = '';

        if ($ussdSession->ussdProcessString == "") {
            $ussdSession = $menuItems->setFirstNameRequest($ussdSession);
            $reply = "CON Welcome to CHAMA USSD. " . $ussdSession->currentFeedbackString;
        } else {
            $params = explode("*", $ussdSession->ussdProcessString);

            if (MenuItems::FIRSTNAME_REQ == $ussdSession->previousFeedbackType) {
                $firstName = trim($params[count($params) - 1]);
                if (isValidName($firstName)) {
                    $userParams = $ussdSession->userParams . UssdSession::FIRSTNAME . "=" . $firstName . "*";
                    $ussdSession->userParams = $userParams;
                    $ussdSession = $menuItems->setSurNameRequest($ussdSession);
                    $reply = "CON " . $ussdSession->currentFeedbackString;
                } else {
                    $ussdSession = $menuItems->setFirstNameRequest($ussdSession);
                    $reply = "CON The name you entered contains NUMBERS or INVALID characters.\n" . $ussdSession->currentFeedbackString;
                }
            } elseif (MenuItems::SURNAME_REQ == $ussdSession->previousFeedbackType) {
                $lastName = trim($params[count($params) - 1]);
                if (isValidName($lastName)) {
                    $userParams = $ussdSession->userParams . UssdSession::SURNAME . "=" . $lastName . "*";
                    $ussdSession->userParams = $userParams;
                    $ussdSession = $menuItems->setIdNumberRequest($ussdSession);
                    $reply = "CON " . $ussdSession->currentFeedbackString;
                } else {
                    $ussdSession = $menuItems->setSurNameRequest($ussdSession);
                    $reply = "CON The name you entered contains NUMBERS or INVALID characters.\n" . $ussdSession->currentFeedbackString;
                }
            } elseif (MenuItems::ID_NUMBER_REQ == $ussdSession->previousFeedbackType) {
                $idNumber = trim($params[count($params) - 1]);
                if (isValidIdNumber($idNumber)) {
                    $userParams = $ussdSession->userParams . UssdSession::IDNUMBER . "=" . $idNumber . "*";
                    $ussdSession->userParams = $userParams;
                    $ussdSession = $menuItems->setGenderRequest($ussdSession);
                    $reply = "CON " . $ussdSession->currentFeedbackString;
                } else {
                    $ussdSession = $menuItems->setIdNumberRequest($ussdSession);
                    $reply = "CON The Id you have entered is not valid.\n" . $ussdSession->currentFeedbackString;
                }
            } elseif (MenuItems::GENDER_REQ == $ussdSession->previousFeedbackType) {
                $gender = trim($params[count($params) - 1]);
                if (isValidOption($gender)) {
                    $gender = mapGender($gender);
                    $userParams = $ussdSession->userParams . UssdSession::GENDER . "=" . $gender . "*";
                    $ussdSession->userParams = $userParams;
                    $ussdSession = $menuItems->setDOBRequest($ussdSession);
                    $reply = "CON " . $ussdSession->currentFeedbackString;
                } else {
                    $ussdSession = $menuItems->setGenderRequest($ussdSession);
                    $reply = "CON The gender you have entered is not supported at the moment.\n" . $ussdSession->currentFeedbackString;
                }
            } elseif (MenuItems::DOB_REQ == $ussdSession->previousFeedbackType) {
                $dob = trim($params[count($params) - 1]);
                if (isValidDate($dob)) {
                    $userParams = $ussdSession->userParams . UssdSession::DOB . "=" . $dob . "*";
                    $ussdSession->userParams = $userParams;
                    $ussdSession = $menuItems->setMaritalStatusRequest($ussdSession);
                    $reply = "CON " . $ussdSession->currentFeedbackString;
                } else {
                    $ussdSession = $menuItems->setDOBRequest($ussdSession);
                    $reply = "CON The Date of birth you have entered is incorect or  contains INVALID characters.\n" . $ussdSession->currentFeedbackString;
                }
            } elseif (MenuItems::MARITAL_STATUS_REQ == $ussdSession->previousFeedbackType) {
                $marital_status = trim($params[count($params) - 1]);
                if (isValidOption($marital_status)) {
                    $marital_status = mapMariatalStatus($marital_status);
                    $userParams = $ussdSession->userParams . UssdSession::MARITAL_STATUS . "=" . $marital_status . "*";
                    $ussdSession->userParams = $userParams;
                    $ussdSession = $menuItems->setLocationRequest($ussdSession);
                    $reply = "CON " . $ussdSession->currentFeedbackString;
                } else {
                    $ussdSession = $menuItems->setMaritalStatusRequest($ussdSession);
                    $reply = "CON The Marital status you've entered is incorrect.\n" . $ussdSession->currentFeedbackString;
                }
            } elseif (MenuItems::LOCATION_REQ == $ussdSession->previousFeedbackType) {
                $location = trim($params[count($params) - 1]);
                if (isValidLocation($location)) {
                    $userParams = $ussdSession->userParams . UssdSession::LOCATION . "=" . $location . "*";
                    $ussdSession->userParams = $userParams;
                    $ussdSession = $menuItems->setChamaIdRequest($ussdSession);
                    $reply = "CON " . $ussdSession->currentFeedbackString;
                } else {
                    $ussdSession = $menuItems->setLocationRequest($ussdSession);
                    $reply = "CON The location you have entered is not valid.\n" . $ussdSession->currentFeedbackString;
                }
            } elseif (MenuItems::CHAMA_ID_REQ == $ussdSession->previousFeedbackType) {
                $chama_id = trim($params[count($params) - 1]);
                var_dump($params);
                if (isValidChamaId($chama_id)) {
                    $userParams = $ussdSession->userParams . UssdSession::CHAMA_ID . "=" . $chama_id . "*";
                    $ussdSession->userParams = $userParams;
                    // var_dump($userParams); die();
                    $reply = "END " . self::registerNewUser($ussdSession);
                } else {
                    $ussdSession = $menuItems->setChamaIdRequest($ussdSession);

                    $reply = "CON The ChamaId you entered is invalid.\n" . $ussdSession->currentFeedbackString;
                }
            }
        }
        // var_dump($ussdSession); die();
        $ussdSession->currentFeedbackString = $reply;
        return $ussdSession;
    }


    function registerNewUser($ussdSession)
    {
        $ussdUser = new UssdUser();
        $ussdUser->dob = UssdSession::getUserParam(UssdSession::DOB, $ussdSession->userParams);
        $ussdUser->firstName = UssdSession::getUserParam(UssdSession::FIRSTNAME, $ussdSession->userParams);
        $ussdUser->surname = UssdSession::getUserParam(UssdSession::SURNAME, $ussdSession->userParams);
        $ussdUser->gender = UssdSession::getUserParam(UssdSession::GENDER, $ussdSession->userParams);
        $ussdUser->idno = UssdSession::getUserParam(UssdSession::IDNUMBER, $ussdSession->userParams);
        $ussdUser->location = UssdSession::getUserParam(UssdSession::LOCATION, $ussdSession->userParams);
        $ussdUser->marital_status = UssdSession::getUserParam(UssdSession::MARITAL_STATUS, $ussdSession->userParams);
        $ussdUser->status = 'ACTIVE';
        $ussdUser->msisdn = $ussdSession->msisdn;
        $ussdUser->chama_id = UssdSession::getUserParam(UssdSession::CHAMA_ID, $ussdSession->userParams);
        // $ussdUser->date_create = date("Y-m-d");



        // $ussdSession = json_encode($ussdUser);
        // var_dump($ussdSession);
        // die();

        $apis = new Apis;
        $apis->registerUser($ussdUser);

        if (createUssdUser($ussdUser)) {
            return "You have been registered successfully!";
        } else {
            return "There was an error in your registration. Please try again.";
        }
    }
}
