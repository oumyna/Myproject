@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Candidats</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('auth.message')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Liste des Candidats</h5>
                        </div>
                        <div class="col-md-6" style="text-align: right;">
                            @if(!empty($PermissionAdd))
                            <a class="btn btn-primary" style="margin-top: 10px;" href="{{ url('panel/user/add') }}">Ajouter</a>
                        @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <form action="{{ route('user.search') }}" method="GET" class="form-inline">
                                <input type="text" name="name" class="form-control" placeholder="Recherche par Nom" required>
                                <button type="submit" class="btn btn-secondary">Rechercher</button>
                                
                            </form>
                        </div>
                    </div>

                    <style>
                        table {
                            width: 100%; 
                        }
                        th, td {
                            white-space: nowrap; 
                            overflow: hidden; 
                            text-overflow: ellipsis; 
                        }
                        th {
                            font-size: 0.9em; 
                        }
                        td {
                            font-size: 0.8em; 
                        }
                    </style>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 50px;">#</th>
                                <th scope="col" style="width: 120px;">Nom</th>
                                <th scope="col" style="width: 150px;">Email</th>
                                <th scope="col" style="width: 80px;">Date Naiss.</th>
                                <th scope="col" style="width: 80px;">Téléphone</th>
                                <th scope="col" style="width: 150px;">Adresse</th>
                                <th scope="col" style="width: 60px;">Cat.</th>
                                <th scope="col" style="width: 80px;">Acompte</th>
                                <th scope="col" style="width: 80px;">Reliquat</th>
                                <th scope="col" style="width: 100px;">Date Inscr.</th>
                                <th scope="col" style="width: 80px;">Option</th>
                                <th scope="col" style="width: 100px;">Agence</th>
                                <th scope="col" style="width: 80px;">Rôle</th>
                                <th scope="col" style="width: 100px;">Créé le</th>
                                @if(!empty($PermissionEdit) || !empty($PermissionDelete))
                                <th scope="col" style="width: 120px;">Actions</th>
                                @endif
                             </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $value)
                               <tr>
                                <th scope="row">{{ $value->id }}</th>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->dateNaissance }}</td>
                                <td>{{ $value->numeroTelephone }}</td>
                                <td>{{ $value->adresse }}</td>
                                <td>{{ $value->categorie }}</td>
                                <td>{{ $value->acompte }}</td>
                                <td>{{ $value->reliquat }}</td>
                                <td>{{ $value->dateInscription }}</td>
                                <td>{{ $value->optionCour }}</td>
                                <td>{{ $value->nomAgence }}</td>
                                <td>{{ $value->role_name }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>
                                    @if(!empty($PermissionEdit))
                                    <a href="{{ url('panel/user/edit/' . $value->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    @endif
                                    @if(!empty($PermissionDelete))
                                    <a href="{{ url('panel/user/delete/' . $value->id) }}" class="btn btn-danger btn-sm">Supprimer</a>
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody> 
                        
                    </table>
                </div> 
            </div> 
        </div> 
    </div> 
</section>

@endsection
