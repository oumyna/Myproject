<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\S_formationModel;
use Illuminate\Support\Facades\Auth;
use App\Models\PermissionRoleModel;

class S_formationController extends Controller
{
    public function list()
    {
        $PermissionRole = PermissionRoleModel::getPermission('S_formation',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        $data['PermissionAdd'] = PermissionRoleModel::getPermission('Add S_formation',Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRoleModel::getPermission('Edit S_formation',Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRoleModel::getPermission('Delete S_formation',Auth::user()->role_id);
        $data['getRecord'] = S_formationModel::getRecord();
        return view('panel.s_formation.list',$data);
    }
    public function add()
    {
        
        $getS_formation =S_formationModel::getRecord();
        $data['getS_formation']=$getS_formation;
        return view('panel.s_formation.add',$data);
    }
    public function insert(Request $request)
    {
        $save = new S_formationModel;
        $save ->date = $request->date;
        $save ->Heure = $request->Heure;
        $save ->lieu = $request->lieu;
        $save ->typeFormation = $request->typeFormation;
        $save->save();
        
       

        return redirect('panel/s_formation') ->with('success','Cours creer avec succes');
    }
    public function edit($id)
      {
        
    $data['getRecord'] = S_formationModel::getSingle($id);
    return view('panel.s_formation.edit', $data);
     }

    public function update($id,Request $request)
    {
        $save = S_formationModel::getSingle($id);
        $save ->date = $request->date;
        $save ->Heure = $request->Heure;
        $save ->lieu = $request->lieu;
        $save ->typeFormation = $request->typeFormation;
        $save->save();
        
        
        
        return redirect('panel/s_formation') ->with('success','Cours modifier avec succes');
    }
    public function delete($id)
    {
        
        $save = S_formationModel::getSingle($id);
        $save->delete();

        return redirect('panel/s_formation') ->with('success','Cours supprimer avec succes');
    }
}