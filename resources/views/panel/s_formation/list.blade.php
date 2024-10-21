@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Liste des séances de formations</h1>
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
                            <a class="btn btn-primary" style="margin-bottom: 10px;" href="{{ url('panel/s_formation/add') }}">Ajouter</a>
                        @endif
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date du Cours</th>
                                <th scope="col">Heure</th>
                                <th scope="col">Lieu</th>
                                <th scope="col">Type de formation</th>
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
                                <td>{{ $value->date }}</td>
                                <td>{{ $value->Heure }}</td>
                                <td>{{ $value->lieu }}</td>
                                <td>{{ $value->typeFormation }}</td>
                                <td>{{ $value->created_at }}</td>
                                 
                                <td>
                                    @if(!empty($PermissionEdit))
                                    <a href="{{ url('panel/s_formation/edit/' . $value->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    @endif
                                    @if(!empty($PermissionDelete))
                                    
                                    <a href="{{ url('panel/s_formation/delete/' . $value->id) }}" class="btn btn-danger btn-sm">Supprimer</a>
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
