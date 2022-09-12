<?php

namespace src;

class Task6
{
    public function main(int $year, int $lastYear, int $month, int $lastMonth, string $day = 'Monday'): int
    {
        if ($year > $lastYear  ($year == $lastYear && $month >= $lastMonth)  $year < 0) {
        throw new \InvalidArgumentException();
    }
        $result = 0;
        $start = strtotime($year . '-' . $month . '-' . '01');
        $end = strtotime($lastYear . '-' . $lastMonth . '-' . '01');
        while ($start <= $end) {
            if (date('l', $start) === $day) {
                $result++;
            }
            $start = strtotime('+1 month', $start);
        }
        return $result;
    }
}
