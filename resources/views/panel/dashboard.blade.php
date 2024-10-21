@extends('layouts.app')
 
@section('content')
    <div class="pagetitle text-center" style="overflow: hidden; white-space: nowrap; margin: 20px 0; position: relative;">
      <h1 id="dynamic-text" style="display: inline-block; animation: marquee 10s linear infinite;">
        Bienvenue dans ESM(European School of Management) Auto Ecole
      </h1>
    </div><!-- End Page Title -->

    <div class="text-center">
      <img src="{{ asset('assets/img/imgAuto.png') }}" alt="Image Auto Ecole" style="width: 1000px; height: auto;" />
    </div>
    
    <section class="section dashboard">
    </section>
@endsection

<!-- CSS to add at the bottom or in your CSS file -->
<style>
    @keyframes marquee {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
</style>
