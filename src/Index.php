<?php

namespace oktocat2399\Sudoku;

class Index
{
    public  $a;
    public  $b;
    public  $c;
    public  $d;
    public  $x1;
    public  $x2;

    public static function main()
    {
        $data = [
            ['a' => 2, 'b' => 1, 'c' => -9],
            ['a' => 1, 'b' => 2, 'c' => -2],
            ['a' => 1, 'b' => 3, 'c' => -4],
            ['a' => 1, 'b' => 4, 'c' => -5],
            ['a' => 1, 'b' => 1, 'c' => -6],
            ['a' => 1, 'b' => 0, 'c' => -7],
        ];
        $calculations = [];
        foreach ($data as $array) {
            $calculation = new Index();
            $calculation->a = $array['a'];
            $calculation->b = $array['b'];
            $calculation->c = $array['c'];
            echo "a = {$calculation->a}; b = {$calculation->b}; c = {$calculation->c}; ";
            $calculation->calc();
            echo PHP_EOL;

            $calculations[] = $calculation;
        }
    }

    public function calc()
    {
        $d = $this->d();
        if ($d < 0) {
            echo 'X нет';
        } else {
            $this->x1 = $this->x();
            $this->x2 = $this->x(-1);
            echo "x1 = {$this->x1}; ";
            echo "x2 = {$this->x2}; ";
        }

    }

    public function d()
    {
        return $this->b * $this->b - 4 * $this->a * $this->c;
    }

    public function x($sign = 1)
    {
        if($this->d === null)
            $this->d = $this->d();
        return (-$this->b + sqrt($this->d) * $sign) / (2 * $this->a);
    }
}