<?php
//namespace Controller;
include_once('../Model/Database.php');
include_once('../Model/User.php');

//use User;

class HomeController
{
    public static function UpdateUserList($errorMessage = ''): void
    {
        $usersDB = Database::SelectUsers();
        $users = [];
        foreach ($usersDB as $userDB) {
            $users[] = new User($userDB["email"], $userDB["name"], $userDB["gender"], $userDB["status"]);
        }
        include '../view/ListOfUsers.php';
    }

    public static function FindUserByEmail($Email): ?User
    {
        $usersDB = Database::SelectUsers();
        foreach ($usersDB as $userDB) {
            if ($userDB['email'] == $Email) {
                $user = new User($userDB["email"], $userDB["name"], $userDB["gender"], $userDB["status"]);
                $user->setId($userDB['id']);
                return $user;
            }
        }
        return null;
    }

    public static function PostFormEdit($_post, $id): void
    {
        $user = new User($_post["Email"], $_post["Name"], $_post["Gender"], $_post["Status"]);
        $user->setId($id);
        Database::UpdateUser($user);
        self::UpdateUserList();
    }

    public static function PreFormEdit($Email): void
    {
        $user = self::FindUserByEmail($Email);
        if ($user) {
            include '../view/EditUser.php';
        } else {
            self::UpdateUserList("Edit Error");
        }
    }

    public static function Delete($Email): void
    {
        Database::Delete($Email);
        self::UpdateUserList();
    }

    public static function AddUser($_post): void
    {
        $errorMessage = '';
        $add = true;
        if (self::FindUserByEmail($_post['Email'])) {
            $add = false;
        }

        $forbiddenChars = ['/', '<', '>'];
        foreach ($forbiddenChars as $char) {
            if (strripos($_POST['Name'], $char)) {
                $add = false;
                $errorMessage = "You shouldn't use symbols for SQL injection)";
                break;
            }
        }

        if ($add) {
            $user = new User($_POST["Email"], $_POST["Name"], $_POST["Gender"], $_POST["Status"]);
            Database::InsertUser($user);
        }

        self::UpdateUserList($errorMessage);
    }
}

//TODO: Rename methods to more understandble
//TODO: add seeds to DB