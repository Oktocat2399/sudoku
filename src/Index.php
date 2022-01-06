<?php

namespace oktocat2399\Sudoku;

class Index
{
    public static function main()
    {
        $x = null;
        $y = null;
        $value = null;

        $argv = $_SERVER['argv'];
        if (isset($argv[1]) && isset($argv[2]) && isset($argv[3])) {
            $x = (int)$argv[1];
            $y = (int)$argv[2];
            $value = (int)$argv[3];
        }

        $table = new Table();
        //$table->load();
        if ($value !== null) {
            $table->setValue($x, $y, $value);
        }
        $table->print();
        $table->checkAll();
        $table->save();
        /*$data = [
            ['a' => 2, 'b' => 1, 'c' => -9],
            ['a' => 1, 'b' => 2, 'c' => -2],
            ['a' => 1, 'b' => 3, 'c' => -4],
            ['a' => 1, 'b' => 4, 'c' => -5],
            ['a' => 1, 'b' => 1, 'c' => -6],
            ['a' => 1, 'b' => 0, 'c' => -7],
        ];
        $calculations = [1,2,3];
        $calculations = [
            [1,2,3],
            [1,2,3],
            [1,2,3],
        ];
        foreach ($data as $array) {
            $calculation = new SolvingQuadraticEquations($array['a'], $array['b'], $array['c']);
            echo "a = {$calculation->a}; b = {$calculation->b}; c = {$calculation->c}; ";
            $calculation->calc();
            echo PHP_EOL;

            $calculations[] = $calculation;
        }*/
    }
}