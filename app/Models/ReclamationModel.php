<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReclamationModel extends Model
{
    use HasFactory;

    protected $table ='reclamation';

    static public function getSingle($id)
    {
    return ReclamationModel::find($id); 
    }
    static public function getRecord()
    {
        return ReclamationModel::get();
    }
}
