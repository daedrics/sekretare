<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/28/2018
 * Time: 6:57 PM
 */

namespace App\Traits;


trait DetyrimAkademikTrait
{
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute('sekretare.detyrimAkademik.edit') .
            $this->getDeleteButtonAttribute('sekretare.detyrimAkademik.destroy', 'detyrimAkademikTable');
    }
}