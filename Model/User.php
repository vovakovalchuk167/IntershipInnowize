<?php

namespace Model;

class User
{
    private $email;
    private $name;
    private $gender;
    private $status;
    private $id;

    public function __construct(string $Email, string $Name, string $Gender, string $Status)
    {
        $this->setEmail($Email);
        $this->setName($Name);
        $this->setGender($Gender);
        $this->setStatus($Status);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
    }
}