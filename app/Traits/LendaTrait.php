<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/28/2018
 * Time: 6:57 PM
 */

namespace App\Traits;


trait LendaTrait
{
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute('sekretare.lenda.edit') .
            $this->getDeleteButtonAttribute('sekretare.lenda.destroy','lendaTable');
    }
}