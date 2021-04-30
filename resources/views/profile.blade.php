@extends('layouts.app')

@include('layouts.nav')

@section('content')

  <div class="menz-rechnung menz-profil">
      <div class="container">
        <div class="row">
          <div class="col-md-3 menz-col"> 
              <h1 class="section-title">Account</h1>  
              <a class="menz-edit mt-3" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            

          </div> 
          <div class="col-md-6 menz-col"> 
             <div class="menz-info">
                <h5 class="profil-title">Email Id</h5>
                <p class="profile-text">{{ $user->email }}</p>
             </div>
             <div class="menz-info">
                <h5 class="profil-title">Phone No.</h5>
                <p class="profile-text">9876543210</p>
             </div>
             <div class="menz-info">
                <h5 class="profil-title">Address</h5>
                <p class="profile-text">AB Road, USA</p>
             </div>
          </div>  
          <div class="col-md-3 menz-col mt-3 mt-md-0"> 
              <a href="javascipt:void()" class="menz-edit">Edit</a>
          </div>              
        </div>
      </div>
    </div>
     

@endsection
