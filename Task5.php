<?php

namespace src;

class Task5
{
    private function columnAddition(string $num1, string $num2): string
    {
        $length = $num1 > $num2 ? strlen($num1) - 1 : strlen($num2) - 1;
        $bubble = 0;
        $result = '';
        for ($i = 0; $i <= $length; $i++) {
            $a = $i <= strlen($num1) - 1 ? $num1[strlen($num1) - $i - 1] : 0;
            $b = $i <= strlen($num2) - 1 ? $num2[strlen($num2) - $i - 1] : 0;
            $sub = $a + $b + $bubble;
            $result = $sub % 10 . $result;
            $bubble = intval($sub / 10);
        }
        if ($bubble !== 0) {
            $result = $bubble . $result;
        }

        return $result;
    }
    public function main(int $n): string
    {
        if (!is_numeric($n) || $n < 0) {
            throw new \InvalidArgumentException();
        }
        $number1 = 0;
        $number2 = 1;
        while (strlen($number2) < $n) {
            $number3 = $this->columnAddition($number1, $number2);
            $number1 = $number2;
            $number2 = $number3;
        }

        return strval($number2);
    }
}
