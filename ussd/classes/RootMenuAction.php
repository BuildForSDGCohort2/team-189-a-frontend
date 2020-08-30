<?php

include_once('./QueryManager.php');
include_once('RegistrationAction.php');
include_once ("./classes/MenuItems.php");

class RootMenuAction {
    public function process($ussdSession){
        $ussdUserList = getUssdUserList($ussdSession->msisdn);
        if(count($ussdUserList)>0){
            //implement other functionalities
        } else {
            $registration = new RegistrationAction();
            $ussdSession = $registration->process($ussdSession);
        }
        return $ussdSession;
    }
}