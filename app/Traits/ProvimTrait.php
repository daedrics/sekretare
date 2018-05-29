<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/28/2018
 * Time: 6:57 PM
 */

namespace App\Traits;


trait ProvimTrait
{
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute('sekretare.provim.edit') .
            $this->getDeleteButtonAttribute('sekretare.provim.destroy','provimTable');
    }
}