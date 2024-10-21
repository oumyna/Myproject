@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Liste des Examens</h1>
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
                            <a class="btn btn-primary" style="margin-bottom: 10px;" href="{{ url('panel/s_examen/add') }}">Ajouter</a>
                      @endif
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type d'Examen</th>
                                <th scope="col">Lieu</th>
                                <th scope="col">Date Examen</th>
                                <th scope="col">Heure Examen</th>
                                <th scope="col">Résultats</th>
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
                                <td>{{ $value->type_examen }}</td>
                                <td>{{ $value->lieu }}</td>
                                <td>{{ $value->date }}</td>
                                <td>{{ $value->heure }}</td>
                                <td>
                                    @if(is_array(json_decode($value->resultat)))
                                        @foreach(json_decode($value->resultat) as $userId)
                                            {{ $users->where('id', $userId)->first()->name ?? 'N/A' }}<br>
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $value->created_at }}</td>
                                <td>
                                    
                                    @if(!empty($PermissionEdit))
                                    <a href="{{ url('panel/s_examen/edit/' . $value->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    @endif
                                    @if(!empty($PermissionAdd))
                                    <a href="{{ url('panel/s_examen/delete/' . $value->id) }}" class="btn btn-danger btn-sm">Supprimer</a>
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
