<?php

namespace Model;
include_once('DatabaseConnect.php');

use mysqli;

class Database
{
    public static function CreateDatabase(): void
    {
        $link = mysqli_connect("localhost", "root", "root");
        $sql = "CREATE DATABASE IF NOT EXISTS Task13";

        if (!mysqli_query($link, $sql)) {
            echo 'Ошибка при создании базы данных: ' . mysqli_error() . "\n";
        }
        $mysqli = DatabaseConnect::getInstance()->getMysqliConnection();
        //$link = mysqli_connect("localhost", "root", "root", "Task13");

        $sql_arr = array("CREATE TABLE IF NOT EXISTS Users (
        id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
		email VARCHAR(50),
		name VARCHAR(50),
        gender VARCHAR(20),
        status VARCHAR(10))");

        foreach ($sql_arr as $sql)
            $mysqli->query($sql);
    }

    public static function insertUser(User $user): bool
    {
        $mysqli = DatabaseConnect::getInstance()->getMysqliConnection();
        //new mysqli("localhost", "root", "root", "Task13");
        $email = $mysqli->real_escape_string($user->getEmail());
        $name = $mysqli->real_escape_string($user->getName());
        $gender = $mysqli->real_escape_string($user->getGender());
        $status = $mysqli->real_escape_string($user->getStatus());
        $sql = "INSERT INTO Users (email, name, gender, status) VALUES ('$email', '$name', '$gender', '$status')";

        if (!$mysqli->query($sql)) {
            return false;
        } else {
            return true;
        }
    }

    public static function findUserByEmail($email): ?User
    {
        $usersDB = self::selectUsers();
        foreach ($usersDB as $userDB) {
            if ($userDB['email'] == $email) {
                $user = new User($userDB["email"], $userDB["name"], $userDB["gender"], $userDB["status"]);
                $user->setId($userDB['id']);
                return $user;
            }
        }
        return null;
    }

    public static function delete($Email): void
    {
        $mysqli = DatabaseConnect::getInstance()->getMysqliConnection();
        $link = mysqli_connect("localhost", "root", "root", "Task13");
        $sql = "DELETE FROM Users WHERE email='$Email'";
        $mysqli->query($sql);
        //mysqli_query($link, $sql);
    }

    public static function updateUser($user): void
    {
        $mysqli = DatabaseConnect::getInstance()->getMysqliConnection();
        //$mysqli = new mysqli("localhost", "root", "root", "Task13");
        $email = $mysqli->real_escape_string($user->getEmail());
        $name = $mysqli->real_escape_string($user->getName());
        $gender = $mysqli->real_escape_string($user->getGender());
        $status = $mysqli->real_escape_string($user->getStatus());
        $id = $mysqli->real_escape_string($user->getId());
        $sql = "UPDATE Users SET email='$email', name='$name', gender='$gender', status='$status' WHERE id='$id'";
        $mysqli->query($sql);
    }

    public static function selectUsers(): array
    {
        $mysqli = DatabaseConnect::getInstance()->getMysqliConnection();
        //$link = mysqli_connect("localhost", "root", "root", "Task13");
        $sql = "SELECT * FROM Users";
        $result = $mysqli->query($sql);//mysqli_query($link, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}