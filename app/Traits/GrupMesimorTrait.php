<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/28/2018
 * Time: 6:57 PM
 */

namespace App\Traits;


trait GrupMesimorTrait
{
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute('sekretare.grupMesimor.edit') .
            $this->getDeleteButtonAttribute('sekretare.grupMesimor.destroy', 'grupMesimorTable');
    }
}