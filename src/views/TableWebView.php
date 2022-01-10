<?php

namespace oktocat2399\Sudoku\views;

class TableWebView extends TableView
{
    public function print()
    {
        //<div class='row'>
        //  <div class='col-md-4'>
        //      line1
        //  </div>
        //  <div class='col-md-4'>
        //      line1 column 2
        //  </div>
        //</div>
 echo "<div class='row'>";
        $model = $this->model;
        foreach ($model->cells as $key => $cell) {
            if ($cell == null) {
                $cell = ' ';
            }

            echo "<div class='col-md-1'>{$cell}</div>";
            if (($key + 1) % $model::WIDTH == 0) {
                echo "</div><div class='row'>";
            }
        }
        echo "</div>";
    }
}