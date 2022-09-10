<?php

namespace src;

class Task4
{
    public function main(string $str): string
    {
        $separators = ['_', '-', ' '];
        foreach ($separators as $separator) {
            $arr = explode($separator, $str);
            $str = '';
            foreach ($arr as $item) {
                $str .= ucfirst($item);
            }
        }
        return $str;
    }
}

