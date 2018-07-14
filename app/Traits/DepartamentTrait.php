<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/28/2018
 * Time: 6:57 PM
 */

namespace App\Traits;


trait DepartamentTrait
{
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute('sekretare.departament.edit') .
            $this->getDeleteButtonAttribute('sekretare.departament.destroy','departamentTable');
    }
}