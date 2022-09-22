<?php

namespace Model;

class User
{
    private $Email;
    private $Name;
    private $Gender;
    private $Status;
    private $Id;

    public function __construct(string $Email, string $Name, string $Gender, string $Status)
    {
        $this->setEmail($Email);
        $this->setName($Name);
        $this->setGender($Gender);
        $this->setStatus($Status);
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function getGender()
    {
        return $this->Gender;
    }

    public function getStatus()
    {
        return $this->Status;
    }

    public function getId()
    {
        return $this->Id;
    }

    public function setId($Id)
    {
        $this->Id = $Id;
    }


    public function setEmail($Email): void
    {
        $this->Email = $Email;
    }

    public function setName($Name): void
    {
        $this->Name = $Name;
    }

    public function setGender($Gender): void
    {
        $this->Gender = $Gender;
    }

    public function setStatus($Status): void
    {
        $this->Status = $Status;
    }
}