<?php

namespace Controller;

use Model\Database;
use Model\User;

include_once('Validator.php');
include_once('Model/User.php');
include_once('Model/Database.php');

class UserController
{
    public function index($errorMessages = []): void
    {
        $usersDB = Database::selectUsers();
        $users = [];
        foreach ($usersDB as $userDB) {
            $users[] = new User($userDB["email"], $userDB["name"], $userDB["gender"], $userDB["status"]);
        }
        include 'View/ListOfUsers.php';
    }

    public function update(): void
    {
        $errorMessages = [];
        $errorMessages = array_merge($errorMessages, \Validator::validateName($_POST['Name']));
        $errorMessages = array_merge($errorMessages, \Validator::validateEmail($_POST['Email'], $_GET['id']));
        if (!sizeof($errorMessages)) {
            $user = new User($_POST["Email"], $_POST["Name"], $_POST["Gender"], $_POST["Status"]);
            $user->setId($_GET['id']);
            Database::updateUser($user);
        }
        $this->index($errorMessages);
    }

    public function edit(): void
    {
        $user = Database::findUserByEmail($_GET['Email']);
        if ($user) {
            include 'View/EditUser.php';
        } else {
            $this->index("Edit Error");
        }
    }

    public function delete(): void
    {
        Database::delete($_GET['Email']);
        $this->index();
    }

    public static function create()
    {
        include 'View/AddUser.php';
    }

    public function store(): void
    {
        $errorMessages = [];
        $errorMessages = array_merge($errorMessages, \Validator::validateEmail($_POST['Email']));
        $errorMessages = array_merge($errorMessages, \Validator::validateName($_POST['Name']));
        if (!sizeof($errorMessages)) {
            $user = new User($_POST["Email"], $_POST["Name"], $_POST["Gender"], $_POST["Status"]);
            Database::insertUser($user);
        }

        $this->index($errorMessages);
    }
}
