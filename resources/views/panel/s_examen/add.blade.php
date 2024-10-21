@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Ajouter un Examen</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ajouter un Examen</h5>

                    <form action="{{ url('panel/s_examen/add') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row mb-3">
                            <label for="type_examen" class="col-sm-12 col-form-label">Type d'Examen</label>
                            <div class="col-sm-12">
                                <input type="text" name="type_examen" required class="form-control" placeholder="Entrez le type d'examen">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lieu" class="col-sm-12 col-form-label">Lieu</label>
                            <div class="col-sm-12">
                                <input type="text" name="lieu" required class="form-control" placeholder="Entrez le lieu">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-sm-12 col-form-label">Date de l'Examen</label>
                            <div class="col-sm-12">
                                <input type="date" name="date" required class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="heure" class="col-sm-12 col-form-label">Heure de l'Examen</label>
                            <div class="col-sm-12">
                                <input type="time" name="heure" required class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="resultat" class="col-sm-12 col-form-label">Résultats</label>
                            <div class="col-sm-12">
                                @foreach ($users as $user)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="resultat[]" value="{{ $user->id }}" id="user_{{ $user->id }}">
                                        <label class="form-check-label" for="user_{{ $user->id }}">
                                            {{ $user->name }}
                                        </label>
                                    </div>
                                @endforeach
                                <small class="text-muted">Sélectionnez plusieurs utilisateurs en cochant les cases.</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
