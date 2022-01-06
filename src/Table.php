<?php

namespace oktocat2399\Sudoku;

class Table
{
    public const HEIGHT = 9;
    public const WIDTH = 9;
    public const SEPARATION_LIMIT = 3;
    public array $cells = [
        7,null,3,2,4,5,6,9,8,
        9,6,8,1,7,3,2,5,4,
        2,4,5,6,8,9,3,7,1,
        3,5,9,7,6,4,1,8,2,
        1,2,4,5,9,8,7,3,6,
        6,8,7,3,1,2,5,4,9,
        8,7,1,4,3,6,9,2,5,
        4,3,2,9,5,1,8,6,7,
        5,9,6,8,2,7,4,1,3

    ];

    public array $groups = [
        [0, 1, 2, 3, 4, 5, 6, 7, 8,],
        [9, 10, 11, 12, 13, 14, 15, 16, 17,],
        [18, 19, 20, 21, 22, 23, 24, 25, 26,],
        [27, 28, 29, 30, 31, 32, 33, 34, 35,],
        [36, 37, 38, 39, 40, 41, 42, 43, 44,],
        [45, 46, 47, 48, 49, 50, 51, 52, 53,],
        [54, 55, 56, 57, 58, 59, 60, 61, 62,],
        [63, 64, 65, 66, 67, 68, 69, 70, 71,],
        [72, 73, 74, 75, 76, 77, 78, 79, 80,],

        [0,9,18,27,36,45,54,63,72,],
        [1,10,19,28,37,46,55,64,73,],
        [2,11,20,29,38,47,56,65,74,],
        [3,12,21,30,39,48,57,66,75,],
        [4,13,22,31,40,49,58,67,76,],
        [5,14,23,32,41,50,59,68,77,],
        [6,15,24,33,42,51,60,69,78,],
        [7,16,25,34,43,52,61,70,79,],
        [8,17,26,35,44,53,62,71,80,],

        [0,1,2,9,10,11,18,19,20,],
        [3,4,5,12,13,14,21,22,23,],
        [6,7,8,15,16,17,24,25,26,],
        [27,28,29,36,37,38,45,46,47,],
        [30,31,32,39,40,41,48,49,50,],
        [33,34,35,42,43,44,51,52,53,],
        [54,55,56,63,64,65,72,73,74,],
        [57,58,59,66,67,68,75,76,77,],
        [60,61,62,69,70,71,78,79,80,],

    ];

    public string $save_file_name = 'game.save';

    public function save()
    {
        $json_string = json_encode($this->cells);
        file_put_contents($this->save_file_name, $json_string);
    }

    public function load()
    {
        $json_string = file_get_contents($this->save_file_name);
        $this->cells = json_decode($json_string);
    }

    public function print()
    {
        foreach ($this->cells as $key => $cell) {
            if ($cell == null){
                $cell = ' ';
            }

            echo " {$cell}";
            if (($key+1) % self::WIDTH == 0)  {
                echo PHP_EOL;
            }
            if (($key+1) % self::SEPARATION_LIMIT == 0 && ($key+1) % self::WIDTH !== 0){
                echo '  ';
            }
            if (($key+1) % (self::SEPARATION_LIMIT * self::WIDTH) == 0){
                echo PHP_EOL;
            }
        }
    }

    public function getIndex($x, $y)
    {
        return  ($x - 1) + ($y - 1) * self::WIDTH ;
    }

    public function getCoordinates($index)
    {
        $x = ($index) % self::WIDTH + 1;
        $y = ($index - $x + 1) / self::WIDTH + 1;
        return ['x' => $x, 'y' => $y];
    }

    public function setValue($x, $y, $value)
    {
        if ($value == 0) {
            $value = null;
        }
        $i = $this->getIndex($x, $y);
        $this->cells[$i] = $value;
    }

    public function checkDuplication($group = []): bool
    {
        //$group = [0, 1, 2, 3, 4, 5, 6, 7, 8,],
        foreach ($group as $key => $index) {
            $value = $this->cells[$index];
            foreach ($group as $key2 => $index2) {
                if ($value == $this->cells[$index2] && $index != $index2 && $value != null && $key < $key2) {
                    $pos1 = $this->getCoordinates($index);
                    $pos2 = $this->getCoordinates($index2);
                    echo "Значение в ячейке (х = {$pos1['x']}, y = {$pos1['y']} ) совпадает с значением в ячейке (х = {$pos2['x']}, y = {$pos2['y']})" . PHP_EOL;
                    return false;
                }
            }
        }
        return true;
    }

    public function checkAll(){
        $hesErrors = false;
        foreach ($this->groups as $group){
            if ($this->checkDuplication($group) == false) {
                $hesErrors = true;
            }
        }
        if ($hesErrors == false ){
            foreach ($this->cells as $cell){
                if ($cell == null ){
                    return;
                }
            }
            echo 'Поздравляю, Вы победили' . PHP_EOL;
        }
    }
}