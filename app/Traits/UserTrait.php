<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/27/2018
 * Time: 2:42 AM
 */

namespace App\Traits;


trait UserTrait
{
    public function hasRole($role)
    {
        return $this->role == $role;
    }
}