@extends('layouts.app')
 
@section('content')
<div class="pagetitle">
    <h1>Modifier seance de cours</h1>
</div>
 
<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-12 col-form-label">date</label>
                            <div class="col-sm-12">
                                <input type="text" name="date" value="{{ $getRecord->date }}" required class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-12 col-form-label">Heure</label>
                            <div class="col-sm-12">
                                <input type="text" name="Heure" value="{{ $getRecord->Heure }}" required class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-12 col-form-label">Lieu</label>
                            <div class="col-sm-12">
                                <input type="text" name="lieu" value="{{ $getRecord->lieu }}" required class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-12 col-form-label">Type de Formation</label>
                            <div class="col-sm-12">
                                <input type="text" name="typeFormation" value="{{ $getRecord->typeFormation }}" required class="form-control">
                            </div>
                        </div>
                        
                        

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
