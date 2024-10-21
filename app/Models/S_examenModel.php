<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class S_examenModel extends Model
{
    use HasFactory;

    protected $table ='s_examen';

    static public function getSingle($id)
    {
    return S_examenModel::find($id); 
    }
    static public function getRecord()
    {
        return DB::table('s_examen')
        ->select('s_examen.*', 'users.name as user_name', 'users.email as user_email', 'role.name as role_name')
        ->join('users', 'users.id', '=', 's_examen.user_id')  // Assure-toi que 'user_id' est bien la clé étrangère dans la table 's_examen'
        ->join('role', 'role.id', '=', 'users.role_id')       // Jointure avec la table des rôles
        ->orderBy('s_examen.id', 'desc')
        ->get();
    }
}
