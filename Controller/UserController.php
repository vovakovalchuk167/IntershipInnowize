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
        $usersDB = Database::select(User::class);
        $users = [];

        foreach ($usersDB as $userDB) {
            $users[] = new User($userDB["email"], $userDB["name"], $userDB["gender"], $userDB["status"]);
        }

        include 'View/ListOfUsers.php';
    }

    public function update($Request): void
    {
        $post = $Request->getPOST();
        $get = $Request->getGET();

        $errorMessages = \Validator::validate([
            $post['Name'] => ['Name', ['Length', 4, 20]],
            $post['Email'] => [['Email', $get['id']]]
        ]);

        if (!$errorMessages) {
            $user = new User($post["Email"], $post["Name"], $post["Gender"], $post["Status"]);
            $user->setId($get['id']);
            Database::update($user);
        }

        $this->index($errorMessages);
    }

    public function edit($Request): void
    {
        $userArray = Database::find(User::class, 'email', $Request->getGET()['Email']);
        $user = new User($userArray["email"], $userArray["name"], $userArray["gender"], $userArray["status"]);
        $user->setId($userArray['id']);
        Database::update($user);
        include 'View/EditUser.php';
    }

    public function delete($Request): void
    {
        Database::delete(User::class, 'email', $Request->getGET()['Email']);
        $this->index();
    }

    public static function create()
    {
        include 'View/AddUser.php';
    }

    public function store($Request): void
    {
        $post = $Request->getPOST();

        $errorMessages = \Validator::validate([
            $post['Name'] => ['Name', ['Length', 4, 20]],
            $post['Email'] => [['Email']]
        ]);

        if (!$errorMessages) {
            $user = new User($post["Email"], $post["Name"], $post["Gender"], $post["Status"]);
            Database::store($user);
        }

        $this->index($errorMessages);
    }
}
