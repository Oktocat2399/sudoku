<?php

namespace oktocat2399\Sudoku\views;

abstract class TableView
{
    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    abstract public function print();
}