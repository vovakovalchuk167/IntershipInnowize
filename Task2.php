<?php

namespace src;

class Task2
{
    public function main(string $date): int
    {
        $subBirth = mb_substr($date, 0, 6);
        if (strtotime($date) === false || !strtotime($subBirth . (intval(date('Y'))))) {
            throw new \InvalidArgumentException();
        }
        $date = date('d-m-Y', strtotime($subBirth . (intval(date('Y')))));
        if ($date === date('d-m-Y')) {
            return 0;
        }
        $birthdate = date_create($date);
        $newBirth = date_create();
        $result = intval(date_diff($birthdate, $newBirth)->format('%R%a'));
        if ($result > 0) {
            $date = date('d-m-Y', strtotime($subBirth . (intval(date('Y'))) + 1));
            $birthdate = date_create($date);
            $newBirth = date_create();
            $result = intval(date_diff($birthdate, $newBirth)->format('%R%a'));
        }

        return abs($result) + 1;
    }
}
