@extends('layouts.app')
 
@section('content')
  

<div class="pagetitle">
    <h1>Modifier les informations du candidat</h1>
  </div>
 
  <section class="section">
    <div class="row">
      <div class="col-lg-9">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Modifier candidat</h5>

            
            <form action="" method="post">
                {{ csrf_field() }}
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Prénom et Nom</label>
                <div class="col-sm-12">
                  <input type="text" name="name" value="{{ $getRecord->name }}"  required class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Email</label>
                <div class="col-sm-12">
                  <input type="email" name="email"  value="{{ $getRecord->email }}" readonly class="form-control">
                 
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Mot de passe</label>
                <div class="col-sm-12">
                  <input type="text" name="password"  class="form-control">
                  (Veux-tu changer le mot de passe.Sinon laisser le comme ça )
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Date de Naissance</label>
                <div class="col-sm-12">
                  <input type="date" name="dateNaissance" value="{{ $getRecord->dateNaissance }}"  class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Numéro de Téléphone</label>
                <div class="col-sm-12">
                  <input type="tel" name="numeroTelephone" value="{{ $getRecord->numeroTelephone }}" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Adresse</label>
                <div class="col-sm-12">
                  <input type="text" name="adresse" value="{{ $getRecord->adresse }}"   class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="categories" class="col-sm-12 col-form-label">Catégories</label>
                <div class="col-sm-12">
                    <select class="form-control" value="{{ $getRecord->categorie }}" name="categorie" required>
                        <option value="Sélectionner" >Sélectionner</option>
                        <option value="A" value="{{ $getRecord->A ? 'selected' : ''}}" >A</option>
                        <option value="B"  value="{{ $getRecord->B ? 'selected' : ''}}">B</option>
                        <option value="C" value="{{ $getRecord->C ? 'selected' : ''}}">C</option>
                        <option value="D" value="{{ $getRecord->D ? 'selected' : ''}}" >D</option>
                    </select>  
                </div>
            </div>                              
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Acompte</label>
                <div class="col-sm-12">
                  <input type="number" name="acompte" value="{{ $getRecord->acompte }}" required class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Reliquat</label>
                <div class="col-sm-12">
                  <input type="number" name="reliquat" value="{{ $getRecord->reliquat }}" required class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Date Inscription</label>
                <div class="col-sm-12">
                  <input type="date" name="dateInscription" value="{{ $getRecord->dateInscription }}" required class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Option cours</label>
                <div class="col-sm-12">
                    <select class="form-control" name="optionCour" value="{{ $getRecord->optionCour }}" required>
                        <option value="Sélectionner" >Sélectionner</option>
                        <option value="Cours du Soir" {{ $getRecord->{'Cours du Soir'} ? 'selected' : ''}}>Cours du Soir</option>
                        <option value="Cours du Jour" {{ $getRecord->{'Cours du Jour'} ? 'selected' : ''}}>Cours du Jour</option>
                        <option value="Cours en ligne" {{ $getRecord->{'Cours en ligne'} ? 'selected' : ''}}>Cours en ligne</option>
                    </select>  
                </div>
            </div>   
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Nom de l'agence</label>
                <div class="col-sm-12">
                  <input type="text" name="nomAgence" value="{{ $getRecord->nomAgence }}" required class="form-control">
                </div>
              </div>
            
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Role</label>
                <div class="col-sm-12">
                    <select class="form-control" name="role_id" required>
                        <option value="">Sélectionner</option>
                        @foreach ($getRole as $value)
                            <option value="{{ $value->id }}" {{ ($getRecord->role_id == $value->id) ? 'selected' : '' }}>
                                {{ $value->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            

              <div class="row mb-3">
                <div class="col-sm-12" >
                  <button type="submit" class="btn btn-primary">Mettre a jour</button>
                </div>
              
              

            </form>

          </div>
        </div>

      </div>

      
    </div>
  </section>

@endsection