<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/28/2018
 * Time: 6:57 PM
 */

namespace App\Traits;


trait FakultetTrait
{
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute('sekretare.fakultet.edit') .
            $this->getDeleteButtonAttribute('sekretare.fakultet.destroy');
    }
}