<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReclamationModel;
use App\Models\PermissionRoleModel;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends Controller
{
    public function list()
    {
        $PermissionRole = PermissionRoleModel::getPermission('Reclamation',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        $data['PermissionAdd'] = PermissionRoleModel::getPermission('Add Reclamation',Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRoleModel::getPermission('Edit Reclamation',Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRoleModel::getPermission('Delete Reclamation',Auth::user()->role_id);

        $data['getRecord'] = ReclamationModel::getRecord();
        return view('panel.reclamation.list',$data);
    }
    public function add()
    {
       
        $getReclamation =ReclamationModel::getRecord();
        $data['getReclamation']=$getReclamation;
        return view('panel.reclamation.add',$data);
    }
    public function insert(Request $request)
    {
        
        $save = new ReclamationModel;
        $save ->name = $request->name;
        $save ->numeroTelephone = $request->numeroTelephone;
        $save ->message = $request->message;
        $save->save();
        
       

        return redirect('panel/reclamation') ->with('success','Reclamation enregistrer avec succes ');
    }
    public function edit($id)
      {
        
        
    $data['getRecord'] = ReclamationModel::getSingle($id);
    return view('panel.reclamation.edit', $data);
     }

    public function update($id,Request $request)
    {
        
        $save = ReclamationModel::getSingle($id);
        $save ->name = $request->name;
        $save ->numeroTelephone = $request->numeroTelephone;
        $save ->message = $request->message;
        $save->save();
        
        
        
        return redirect('panel/reclamation') ->with('success','reclamation modifier avec succes');
    }
    public function delete($id)
    {
        
        
        $save = ReclamationModel::getSingle($id);
        $save->delete();

        return redirect('panel/reclamation') ->with('success','reclamation supprimer avec succes');
    }
}