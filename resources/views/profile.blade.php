@extends('layouts.app')

@section('content')

@include('layouts.nav')
    <div class="menz-rechnung menz-profil">
      <div class="container">
        <div class="row">
          <div class="col-md-3 menz-col"> 
              <h1 class="section-title">Account</h1> 
          </div> 
          <div class="col-md-6 menz-col"> 
              <div class="menz-info">
                <h5 class="profil-title">Kundennummer</h5>
                <p class="profile-text">{{ $user->Kundennummer }}</p>
              </div>
              <div class="menz-info">
                 <h5 class="profil-title">Name</h5>
                 <p class="profile-text">{{ $user->name }}</p>
              </div>
             <div class="menz-info">
                <h5 class="profil-title">Email Id</h5>
                 <p class="profile-text">{{ $user->email }}</p>
             </div>
             <div class="menz-info">
                <h5 class="profil-title">Passwort</h5>
                <p class="profile-text">#######</p>
             </div>
          </div>  
          <div class="col-md-3 menz-col mt-3 mt-md-0"> 
           <a class="menz-edit mt-3" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Abmelden') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>              
        </div>
      </div>
    </div>
     
@endsection
