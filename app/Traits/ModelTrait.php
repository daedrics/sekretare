<?php

namespace App\Traits;


trait ModelTrait
{

    public function getEditButtonAttribute($route)
    {
        return '<a href="' . route($route, $this) . '" class="btn btn-xs btn-primary">
                    <i data-toggle="tooltip" data-placement="top" title="Edit" class="fa fa-pencil"></i>
                </a> ';
    }

    public function getDeleteButtonAttribute($route, $dataTable)
    {
        return '<a onclick="deleteFunction(\'' . route($route, $this) . '\' , \'' . $dataTable . '\')" 
                    class="btn btn-xs btn-danger">
                        <i data-toggle="tooltip" style="color: white" data-placement="top" title="Delete" class="fa fa-trash"></i>
                </a> ';
    }

    public function getShowButtonAttribute($route)
    {
        return '<a href="' . route($route, $this) . '" 
        class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" 
        data-placement="top" title="' . trans('language.view_btn') . '"></i></a> ';
    }

//    public function getRestoreButtonAttribute($route, $activeTable, $deletedTable)
//    {
//        return '<a onclick="restoreFunction(\'' . route($route, $this) . '\',\'' . $activeTable . '\',\'' . $deletedTable . '\')"
//        class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top"
//        title="' . trans('language.restore_btn') . '"></i></a> ';
//    }

}