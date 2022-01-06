<?php

namespace oktocat2399\Sudoku;

class SolvingQuadraticEquations
{
    public  $a;
    public  $b;
    public  $c;
    public  $d;
    public  $x1;
    public  $x2;

    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
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
        if($this->d == null)
            $this->d = $this->d();
        return (-$this->b + sqrt($this->d) * $sign) / (2 * $this->a);
    }
}