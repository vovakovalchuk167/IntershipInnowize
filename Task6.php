<?php

namespace src;

class Task6
{
    public function main(int $year, int $lastYear, int $month, int $lastMonth, string $day = 'Monday'): int
    {
        if ($year > $lastYear || ($year == $lastYear && $month >= $lastMonth)) {
            throw new \InvalidArgumentException();
        }
        $result = 0;
        for ($thisYear = $year; $thisYear <= $lastYear; $thisYear++) {
            for ($thisMonth = $month; $thisMonth <= 12 && ($thisYear != $lastYear || $thisMonth != $lastMonth); $thisMonth++) {
                $firstDayOfMonth = date('l', strtotime('01-'.$thisMonth.'-'.$thisYear));
                if ($firstDayOfMonth == $day) {
                    $result++;
                }
            }
        }

        return $result;
    }
}
