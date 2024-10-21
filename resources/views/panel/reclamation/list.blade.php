@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Liste des réclamations</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('auth.message')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" style="text-align: right;">
                            @if(!empty($PermissionAdd))
                            <a class="btn btn-primary" style="margin-bottom: 10px;" href="{{ url('panel/reclamation/add') }}">Ajouter</a>
                        @endif
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Prenom et Nom</th>
                                <th scope="col">Numero Telephone</th>
                                <th scope="col">Message</th>
                                <th scope="col">Créé le</th>
                                @if(!empty($PermissionEdit) || !empty($PermissionDelete))
                                <th scope="col">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $value)
                            <tr>
                                <th scope="row">{{ $value->id }}</th>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->numeroTelephone }}</td>
                                <td>{{ $value->message }}</td>
                                
                                <td>{{ $value->created_at }}</td>
                                 
                                <td>
                                    @if(!empty($PermissionAdd))
                                    <a href="{{ url('panel/reclamation/edit/' . $value->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    @endif
                                    @if(!empty($PermissionAdd))
                                    <a href="{{ url('panel/reclamation/delete/' . $value->id) }}" class="btn btn-danger btn-sm">Supprimer</a>
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
