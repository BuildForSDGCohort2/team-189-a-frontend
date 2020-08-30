
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
