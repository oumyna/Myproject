<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    use HasFactory;

    protected $table = 'permission'; 

    static public function getRecord()
    {
        
        $getPermission = PermissionModel::groupBy('groupby')->get(['groupby']);

        $result = [];
        
        foreach ($getPermission as $group) {
           
            $getPermissionGroup = PermissionModel::where('groupby', $group->groupby)->get();
            $groupData = [
                'id' => $group->groupby,
                'name' => $getPermissionGroup->first()->name, 
                'group' => [],
            ]; 
            foreach ($getPermissionGroup as $permission) {
                $groupData['group'][] = [
                    'id' => $permission->id,
                    'name' => $permission->name,
                ];
            }

            $result[] = $groupData;
        }
          
        return $result;
    }
    static public function getPermissionGroup($groupby)
    {
        return PermissionModel::where('groupby','=',$groupby)->get();
    }
}
