<?php

namespace Controller;

use Model\Database;
use Model\User;

include_once('Model/User.php');
include_once('Model/Database.php');

class HomeController
{
    public function userList($errorMessage = ''): void
    {
        $usersDB = Database::SelectUsers();
        $users = [];
        foreach ($usersDB as $userDB) {
            $users[] = new User($userDB["email"], $userDB["name"], $userDB["gender"], $userDB["status"]);
        }
        include 'View/ListOfUsers.php';
    }

    public function findUserByEmail($Email): ?User
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

    public function submitFormEditUser(): void
    {
        $user = new User($_POST["Email"], $_POST["Name"], $_POST["Gender"], $_POST["Status"]);
        $user->setId($_GET['id']);
        Database::UpdateUser($user);
        $this->userList();
    }

    public function enterFormEditUser(): void
    {
        $user = $this->findUserByEmail($_GET['Email']);
        if ($user) {
            include 'View/EditUser.php';
        } else {
            $this->userList("Edit Error");
        }
    }

    public function delete(): void
    {
        Database::Delete($_GET['Email']);
        $this->userList();
    }

    public static function enterFormAddUser()
    {
        include 'View/AddUser.php';
    }

    public function submitFormAddUser(): void
    {
        $errorMessage = '';
        $Email = $_POST['Email'];
        $add = true;
        if ($this->findUserByEmail($Email)) {
            $add = false;
            $errorMessage = "User with $Email email already exists";
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

        $this->userList($errorMessage);
    }
}
