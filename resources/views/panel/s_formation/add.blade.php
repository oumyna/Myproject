@extends('layouts.app')
 
@section('content')
  

<div class="pagetitle">
    <h1>Ajouter une nouvelle séance de formations</h1>
  </div>
 
  <section class="section">
    <div class="row">
      <div class="col-lg-9">

        <div class="card">
          <div class="card-body">
           

            
            <form action="" method="post">
                {{ csrf_field() }}
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Date</label>
                <div class="col-sm-12">
                  <input type="date" name="date"  required class="form-control">
                </div>
              </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-12 col-form-label">Heure</label>
                    <div class="col-sm-12">
                      <input type="time" name="Heure"  required class="form-control">
                    </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Lieu</label>
                <div class="col-sm-12">
                  <input type="text" name="lieu"  required class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-12 col-form-label">Type de formation</label>
                <div class="col-sm-12">
                  <input type="text" name="typeFormation"  required class="form-control">
                </div>
              </div>

              
              

              <div class="row mb-3">
                <div class="col-sm-12" >
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