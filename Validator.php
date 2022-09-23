<?php

use Model\Database;

class Validator
{
    public static function validateEmail($email, $id = '0'): array
    {
        $findUser = Database::findUserByEmail($email);
        $errorMessages = [];
        if ($id) {
            if ($findUser && $findUser->getId() != $id) {
                $errorMessages[] = "User with $email email already exist";
            }
        } elseif ($findUser) {
            $errorMessages[] = "User with $email email already exist";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMessages[] = "Email $email is invalid";
        }
        return $errorMessages;
    }

    public static function validateName($name): array
    {
        $errorMessages = [];
        if (!preg_match("/^[a-zA-z]*$/", $name)) {
            $errorMessages[] = "Invalid name $name";
        }
        return $errorMessages;
    }
}