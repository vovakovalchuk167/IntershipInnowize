<?php

namespace src;

class Task2
{
    public function main(string $date): int
    {
        $subBirth = mb_substr($date, 0, 6);
        if (strtotime($date) === false) {
            throw new \InvalidArgumentException('Wrong data');
        }
        $date = date('d-m-Y', strtotime($subBirth . (intval(date('Y')))));
        $birthdate = date_create($date);
        $newBirth = date_create();
        $result = intval(date_diff($birthdate, $newBirth)->format('%R%a'));
        if ($result > 0) {
            $date = date('d-m-Y', strtotime($subBirth . (intval(date('Y'))) + 1));
            $birthdate = date_create($date);
            $newBirth = date_create();
            $result = intval(date_diff($birthdate, $newBirth)->format('%R%a'));
        }

        return abs($result);
    }
}
