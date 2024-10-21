@extends('layouts.app')
 
@section('content')
  

<div class="pagetitle">
    <h1>Ajouter un nouveau candidat</h1>
  </div>
 
  <section class="section">
    <div class="row">
      <div class="col-lg-9">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ajouter un nouveau candidat</h5>

            
            <form action="" method="post">
                {{ csrf_field() }}
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Prénom et Nom</label>
                <div class="col-sm-12">
                  <input type="text" name="name"  required class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Email</label>
                <div class="col-sm-12">
                  <input type="email" name="email"   required class="form-control">
                  <div style="color: red">{{ $errors->first('email') }}</div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Mot de passe</label>
                <div class="col-sm-12">
                  <input type="password" name="password"  required class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Date de Naissance</label>
                <div class="col-sm-12">
                  <input type="date" name="dateNaissance"  required class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Numéro de Téléphone</label>
                <div class="col-sm-12">
                  <input type="tel" name="numeroTelephone"  required class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Adresse</label>
                <div class="col-sm-12">
                  <input type="text" name="adresse"  required class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="categories" class="col-sm-12 col-form-label">Catégories</label>
                <div class="col-sm-12">
                    <select class="form-control" name="categorie" required>
                        <option value="Sélectionner" >Sélectionner</option>
                        <option value="A" >A</option>
                        <option value="B" >B</option>
                        <option value="C" >C</option>
                        <option value="D" >D</option>
                    </select>  
                </div>
            </div>                              
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Acompte</label>
                <div class="col-sm-12">
                  <input type="number" name="acompte"  required class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Reliquat</label>
                <div class="col-sm-12">
                  <input type="number" name="reliquat"  required class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Date Inscription</label>
                <div class="col-sm-12">
                  <input type="date" name="dateInscription"  required class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Option cours</label>
                <div class="col-sm-12">
                    <select class="form-control" name="optionCour" required>
                        <option value="Sélectionner" >Sélectionner</option>
                        <option value="Cours du Soir" >Cours du Soir</option>
                        <option value="Cours du Jour" >Cours du Jour</option>
                        <option value="Cours en ligne" >Cours en ligne</option>
                    </select>  
                </div>
            </div>   
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Nom de l'agence</label>
                <div class="col-sm-12">
                  <input type="text" name="nomAgence"  required class="form-control">
                </div>
              </div>
            
            <div class="row mb-3">
              <label for="inputText" class="col-sm-12 col-form-label">Role</label>
              <div class="col-sm-12">
                <select class="form-control" name="role_id" required >
                    <option value="" >Sélectionner</option>
                    @foreach ( $getRole as $value )
                    <option {{ (old('role_id')==$value->id)? 'selected' : ''}} value="{{ $value->id }}" >{{ $value ->name }}</option>
                    @endforeach
                </select>
              </div>
            </div>

              <div class="row mb-3">
                <div class="col-sm-12" >
                  <button type="submit" class="btn btn-primary">Soumettre</button>
                </div>
              
              

            </form>

          </div>
        </div>

      </div>

      
    </div>
  </section>

@endsection