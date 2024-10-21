@extends('layouts.app')
 
@section('content')
<div class="pagetitle">
    <h1>Modifier une réclamation</h1>
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
                            <label for="inputText" class="col-sm-12 col-form-label">Prénom et Nom</label>
                            <div class="col-sm-12">
                                <input type="text" name="name" value="{{ $getRecord->name }}" required class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-12 col-form-label">Numéro de téléphone</label>
                            <div class="col-sm-12">
                                <input type="number" name="numeroTelephone" value="{{ $getRecord->numeroTelephone }}" required class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-12 col-form-label">Message</label>
                            <div class="col-sm-12">
                                <input type="text" name="message" value="{{ $getRecord->message }}" required class="form-control">
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
