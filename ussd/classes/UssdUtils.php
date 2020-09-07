
<?php

function generateMenu($menuArray)
{
    $menu = "";
    for ($i = 1; $i <= count($menuArray); $i++) {
        $menu .= $i . ": " . $menuArray[($i - 1)];
        if ($i != count($menuArray)) {
            $menu .= "\n";
        }
    }
    return $menu;
}

function cleanUssdString($ussdString)
{
    if (strpos($ussdString, "*98*") !== false) {
        $ussdString = str_replace("\\*98\\*", "*", $ussdString);
    }

    if (strpos($ussdString, "*0*") !== false) {
        $ussdString = str_replace("\\*0\\*", "*", $ussdString);
    }
    return $ussdString;
}

function isValidName($name)
{
    if ($name == " ") {
        return false;
    } elseif (is_numeric($name)) {
        return false;
    } else {
        return true;
    }
}

function isRequiredMinimumSize($string, $requiredSize)
{
    if (strlen($string) >= $requiredSize) {
        return true;
    } else {
        return false;
    }
}

function isValidIdNumber($idNumber)
{
    $idNumber = str_replace(" ", "", $idNumber);
    if (strlen($idNumber) < 5) {
        return false;
    } else {
        return true;
    }
}

function isValidPIN($pin)
{
    if (strlen($pin) < 4) {
        return false;
    } else {
        return true;
    }
}

function isValidLocation($location)
{
    if (($location == "") || ($location == " ")) {
        return false;
    } elseif (is_numeric($location)) {
        return false;
    } else {
        return true;
    }
}

function isValidDate($dateOfBirth)
{
    $dateOfBirth = str_replace(" ", "", $dateOfBirth);
    $dateOfBirthArr = explode("-", $dateOfBirth);

    if (count($dateOfBirthArr) == 3) {
        $year = $dateOfBirthArr[0];
        $month = $dateOfBirthArr[1];
        $day = $dateOfBirthArr[2];


        if (!($day > 0 && $day <= 31) || !($month > 0 && $month <= 12) || $year < 1900) {
            return false;
        }
        $dobPlus18 = strtotime($year . "-" . $month . "-" . $day . " +18 year");
        $dobPlus18 = date('Y-m-d', $dobPlus18);
        if ($dobPlus18 < date('Y-m-d')) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function isValidOption($option)
{
    if (is_numeric($option)) {
        if (($option == 1) || ($option == 2)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function mapGender($gender)
{
    if ($gender == 1) {
        $gender = "male";
    } elseif ($gender == 2) {
        $gender = "female";
    } else {
        $gender = "other";
    }
    return $gender;
}

function mapMariatalStatus($maritalStatus)
{
    if ($maritalStatus == 1) {
        $maritalStatus = "single";
    } elseif ($maritalStatus == 2) {
        $maritalStatus = "married";
    } else {
        $maritalStatus = "other";
    }
    return $maritalStatus;
}

function isValidChamaId($chamaId)
{
    $chamaId = str_replace(" ", "", $chamaId);
    if ((strlen($chamaId) >= 1) && (is_numeric($chamaId))) {
        return true;
    } else {
        return false;
    }
}
