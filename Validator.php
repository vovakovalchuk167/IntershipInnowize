<?php

use Model\Database;
use Model\User;

class Validator
{
    public static function validate($validationParameters)
    {
        $errorMessages = [];

        foreach ($validationParameters as $key => $values) {
            foreach ($values as $value){
                if (is_array($value)) {
                    $method = 'validate'.$value[0];
                    $errorMessages = array_merge($errorMessages, self::$method($key, array_slice($value, 1)));
                    continue;
                }
                $method = 'validate' . $value;
                $errorMessages = array_merge($errorMessages, self::$method($key));
            }
        }
        if (sizeof($errorMessages)) {
            return $errorMessages;
        }
        return false;
    }

    private static function validateLength($string, $min_max): array
    {
        $errorMessages = [];
        if(strlen($string) < $min_max[0]){
            $errorMessages[] = "$string size less than $min_max[0]";
        }
        if(strlen($string) > $min_max[1]){
            $errorMessages[] = "$string size greater than $min_max[0]";
        }
        return $errorMessages;
    }

    private static function validateEmail($email, array $id): array
    {
        $errorMessages = [];
        $findUser = Database::find(User::class, 'email', $email);
        if (sizeof($id)) {
            $id = $id[0];
            if ($findUser && $findUser['id'] != $id) {
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

    private static function validateName($name): array
    {
        $errorMessages = [];
        foreach (explode(' ', $name) as $str){
            if (!preg_match("/^[a-zA-z]*$/", $str)) {
                $errorMessages[] = "Invalid name $name";
            }
        }

        return $errorMessages;
    }
}