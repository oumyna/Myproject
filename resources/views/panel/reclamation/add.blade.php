@extends('layouts.app')
 
@section('content')
  
<div class="pagetitle">
    <h1>Ajouter une nouvelle réclamation</h1>
</div>
 
<section class="section">
    <div class="row">
      <div class="col-lg-9">

        <div class="card">
          <div class="card-body">
           
            <form action="" method="post">
                {{ csrf_field() }}
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Prénom et Nom</label>
                <div class="col-sm-12">
                  <input type="text" name="name" required class="form-control">
                </div>
              </div>
              
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Numéro de Téléphone</label>
                <div class="col-sm-12">
                  <input type="number" name="numeroTelephone" required class="form-control">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Message</label>
                <div class="col-sm-12">
                  <textarea name="message" required class="form-control" rows="5" placeholder="Entrez votre message ici"></textarea>
                </div>
              </div>
              
              <div class="row mb-3">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary">Soumettre</button>
                </div>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
</section>

@endsection
