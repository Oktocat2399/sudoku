<?php

namespace oktocat2399\Sudoku\views;

class TableConsoleView extends TableView
{
    public function print()
    {
        $model = $this->model;
        foreach ($model->cells as $key => $cell) {
            if ($cell == null) {
                $cell = ' ';
            }

            echo " {$cell}";
            if (($key + 1) % $model::WIDTH == 0) {
                echo PHP_EOL;
            }
            if (($key + 1) % $model::SEPARATION_LIMIT == 0 && ($key + 1) % $model::WIDTH !== 0) {
                echo '  ';
            }
            if (($key + 1) % ($model::SEPARATION_LIMIT * $model::WIDTH) == 0) {
                echo PHP_EOL;
            }
        }
    }
}