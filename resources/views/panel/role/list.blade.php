@extends('layouts.app')
 
@section('content')

<div class="pagetitle">
    <h1>Role</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('auth.message')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Liste des roles</h5>
                        </div>
                        <div class="col-md-6" style="text-align: right;">
                            @if(!empty($PermissionAdd))
                            <a class="btn btn-primary" style="margin-top: 10px;" href="{{ url('panel/role/add') }}">Ajouter</a>
                        </div>
                        @endif
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
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
                                <td>{{ $value->created_at }}</td>
                                <td>
                                    @if(!empty($PermissionEdit))
                                    <a href="{{ url('panel/role/edit/' . $value->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    @endif
                                    @if(!empty($PermissionDelete))
                                    <a href="{{ url('panel/role/delete/' . $value->id) }}" class="btn btn-danger btn-sm">Supprimer</a>
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
