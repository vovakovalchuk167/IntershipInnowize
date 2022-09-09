<?php

namespace src;

class Task2
{
    public function main(string $birthday): int
    {
        $subBirth = mb_substr($birthday, 0, 6);
        if (strtotime($birthday) === false) {
            throw new \InvalidArgumentException('Wrong data');
        }
        $birthday = date('d-m-Y', strtotime($subBirth . (intval(date('Y')))));
        $birthdate = date_create($birthday);
        $newBirth = date_create();
        $result = intval(date_diff($birthdate, $newBirth)->format('%R%a'));
        if ($result > 0) {
            $birthday = date('d-m-Y', strtotime($subBirth . (intval(date('Y'))) + 1));
            $birthdate = date_create($birthday);
            $newBirth = date_create();
            $result = intval(date_diff($birthdate, $newBirth)->format('%R%a'));
        }
        return abs($result);
    }
}

