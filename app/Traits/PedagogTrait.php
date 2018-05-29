<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/28/2018
 * Time: 6:57 PM
 */

namespace App\Traits;


trait PedagogTrait
{
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute('sekretare.pedagog.edit') .
            $this->getDeleteButtonAttribute('sekretare.pedagog.destroy','pedagogTable');
    }
}