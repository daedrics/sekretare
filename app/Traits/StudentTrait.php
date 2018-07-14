<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/28/2018
 * Time: 6:57 PM
 */

namespace App\Traits;


trait StudentTrait
{
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute('sekretare.student.edit') .
            $this->getDeleteButtonAttribute('sekretare.student.destroy','studentTable');
    }
}