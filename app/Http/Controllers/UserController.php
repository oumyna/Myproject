<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Models\PermissionRoleModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function list()
    {
        $PermissionRole = PermissionRoleModel::getPermission('User',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        $data['PermissionAdd'] = PermissionRoleModel::getPermission('Add User',Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRoleModel::getPermission('Edit User',Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRoleModel::getPermission('Delete User',Auth::user()->role_id);
        $data['getRecord'] = User::getRecord();
        return view('panel.user.list',$data);
    }
    public function add()
    {
        $PermissionRole = PermissionRoleModel::getPermission('Add User',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        $data['PermissionAdd'] = PermissionRoleModel::getPermission('Add User',Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRoleModel::getPermission('Edit User',Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRoleModel::getPermission('Delete User',Auth::user()->role_id);
        $data['getRole'] = RoleModel::getRecord();
        return view('panel.user.add',$data);
    }
    public function insert(Request $request)
    {
        $PermissionRole = PermissionRoleModel::getPermission('Add User',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        
        request()->validate([
            'email'=>'required|email|unique:users',
        ]);
        $user = new User;
        $user ->name = trim($request->name);
        $user ->email = trim($request->email);
        $user ->password = Hash::make($request->password);
        $user ->dateNaissance = trim($request->dateNaissance);
        $user ->numeroTelephone = trim($request->numeroTelephone);
        $user ->adresse = trim($request->adresse);
        $user ->categorie = trim($request->categorie);
        $user ->acompte = trim($request->acompte);
        $user ->reliquat = trim($request->reliquat);
        $user ->dateInscription = trim($request->dateInscription);
        $user ->optionCour = trim($request->optionCour);
        $user ->nomAgence = trim($request->nomAgence);
        $user ->role_id = trim($request->role_id);
        $user->save();

        return redirect('panel/user')->with('success','Candidat ajouter avec succes');
        
    }
    public function edit($id)
    {
        $PermissionRole = PermissionRoleModel::getPermission('Edit User',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        $data['getRecord'] = User::getSingle($id);
        $data['getRole'] = RoleModel::getRecord();
        return view('panel.user.edit',$data);
    }
    
    public function update($id,Request $request)
    {
        
        $PermissionRole = PermissionRoleModel::getPermission('Edit User',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        $user = User::getSingle($id);
        $user ->name = trim($request->name);
         if(!empty($request->password))
         {
            $user ->password = Hash::make($request->password);
         }
        
        $user ->dateNaissance = trim($request->dateNaissance);
        $user ->numeroTelephone = trim($request->numeroTelephone);
        $user ->adresse = trim($request->adresse);
        $user ->categorie = trim($request->categorie);
        $user ->acompte = trim($request->acompte);
        $user ->reliquat = trim($request->reliquat);
        $user ->dateInscription = trim($request->dateInscription);
        $user ->optionCour = trim($request->optionCour);
        $user ->nomAgence = trim($request->nomAgence);
        $user ->role_id = trim($request->role_id);
        $user->save();

        return redirect('panel/user')->with('success','Candidat modifier avec succes');
        
    }
    public function search(Request $request)
    {
        $name = $request->input('name');
        $data['getRecord'] = User::where('name', 'LIKE', "%{$name}%")->get();
        return view('panel.user.list', $data);
    }
    public function delete($id)
    {
        $PermissionRole = PermissionRoleModel::getPermission('Delete User',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
       $user = User::getSingle($id);
       $user->delete();

       return redirect('panel/user')->with('success','Candidat supprimer avec succes');
    }
 
    
    
    
}