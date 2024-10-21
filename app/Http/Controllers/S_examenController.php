<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\S_examenModel;
use App\Models\User; 
use App\Models\PermissionRoleModel;
use Illuminate\Support\Facades\Auth;



class S_examenController extends Controller
{
    public function list()
{
    $PermissionS_examen = PermissionRoleModel::getPermission('S_examen', Auth::user()->role_id);
    if (empty($PermissionS_examen)) {
        abort(404);
    }

    $PermissionAdd = PermissionRoleModel::getPermission('Add S_examen', Auth::user()->role_id);
    $PermissionEdit = PermissionRoleModel::getPermission('Edit S_examen', Auth::user()->role_id);
    $PermissionDelete = PermissionRoleModel::getPermission('Delete S_examen', Auth::user()->role_id);

    $getRecord = S_examenModel::all();
    $users = User::all()->keyBy('id');

    // Transmettez toutes les variables nécessaires à la vue
    return view('panel.s_examen.list', compact('getRecord', 'users', 'PermissionAdd', 'PermissionEdit', 'PermissionDelete'));
}


    

    
public function add()
{
    $PermissionS_examen = PermissionRoleModel::getPermission('Add S_examen', Auth::user()->role_id);
    if (empty($PermissionS_examen)) {
        abort(404);
    }

    // Récupérer uniquement les utilisateurs qui ne sont pas admin (par exemple, role_id != 1)
    $users = User::where('role_id', '!=', 1)->get(); // Assumes that admin has role_id = 1
    return view('panel.s_examen.add', compact('users'));
}


    
public function insert(Request $request)
{
    $PermissionS_examen = PermissionRoleModel::getPermission('Add S_examen',Auth::user()->role_id);
    if(empty($PermissionS_examen))
    {
        abort(404);
    }
    $PermissionS_examen = PermissionRoleModel::getPermission('Add S_examen',Auth::user()->role_id);
        if(empty($PermissionS_examen))
        {
            abort(404);
        }
    
    $validated = $request->validate([
        'type_examen' => 'required|string|max:255',
        'lieu' => 'required|string|max:255',
        'date' => 'required|date',
        'heure' => 'required|date_format:H:i', 
        'resultat' => 'array|nullable', 
    ]);

    
    $examen = new S_examenModel();
    $examen->type_examen = $validated['type_examen']; 
    $examen->lieu = $validated['lieu'];
    $examen->date = $validated['date'];
    $examen->heure = $validated['heure'];

  
    if (isset($validated['resultat'])) {
        $examen->resultat = json_encode($validated['resultat']); 
    } else {
        $examen->resultat = null; 
    }

    $examen->save();

    return redirect('panel/s_examen')->with('success', 'Examen ajouté avec succès.');
}

public function edit($id)
{
    $PermissionS_examen = PermissionRoleModel::getPermission('Edit S_examen', Auth::user()->role_id);
    if (empty($PermissionS_examen)) {
        abort(404);
    }

    $examen = S_examenModel::getSingle($id); 
    $users = User::where('role_id', '!=', 1)->get(); // Exclure l'admin ici
    $selectedUsers = json_decode($examen->resultat, true); 

    if (!is_array($selectedUsers)) {
        $selectedUsers = [];
    }

    return view('panel.s_examen.edit', compact('examen', 'users', 'selectedUsers'));
}

    public function update($id,Request $request)
    {
        $PermissionS_examen = PermissionRoleModel::getPermission('Edit S_examen',Auth::user()->role_id);
        if(empty($PermissionS_examen))
        {
            abort(404);
        }
        $save = S_examenModel::getSingle($id);
        $save ->type_examen = $request->type_examen;
        $save ->date = $request->date;
        $save ->heure = $request->heure;
        $save ->resultat = $request->resultat;
        $save->save();
        
        
        
        return redirect('panel/s_examen') ->with('success','Role modifier avec succes');
    }

    
    public function delete($id)
    {
        $PermissionS_examen = PermissionRoleModel::getPermission('Delete S_examen',Auth::user()->role_id);
        if(empty($PermissionS_examen))
        {
            abort(404);
        }
        $examen = S_examenModel::find($id);
        $examen->delete();

        return redirect('panel/s_examen')->with('success', 'Examen supprimé avec succès.');
    }
}
