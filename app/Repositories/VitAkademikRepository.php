<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/27/2018
 * Time: 3:45 PM
 */

namespace App\Repositories;

use App\Models\Student;
use App\Models\Viti_Akademik;
use Yajra\DataTables\Facades\DataTables;

class VitAkademikRepository
{
    public function __construct(Viti_Akademik $viti_Akademik)
    {
        $this->viti_Akademik = $viti_Akademik;
    }

    public function __call($method, $args = array())
    {
        return call_user_func_array(array($this->viti_Akademik, $method), $args);
    }

    public function toArray()
    {
        $vite = $this->viti_Akademik->all()
            ->pluck('emer_V_A', 'id')
            ->toArray();
        return $vite;
    }

}