<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class S_formationModel extends Model
{
    use HasFactory;

    protected $table ='s_formation';

    static public function getSingle($id)
    {
    return S_formationModel::find($id); 
    }
    static public function getRecord()
    {
        return S_formationModel::get();
    }
}
